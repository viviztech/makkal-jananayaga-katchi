<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Otp;
use Carbon\Carbon;

class Fast2SMSService
{
    protected $apiKey;
    protected $baseUrl = 'https://www.fast2sms.com/dev/bulkV2';

    public function __construct()
    {
        $this->apiKey = config('services.fast2sms.api_key');
    }

    /**
     * Generate a 6-digit OTP code
     */
    protected function generateOTP(): string
    {
        return str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Send OTP to phone number via Fast2SMS
     */
    public function sendOTP(string $phoneNumber, string $ipAddress = null): array
    {
        // Clean phone number
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Validate Indian mobile number
        if (!preg_match('/^[6-9][0-9]{9}$/', $phoneNumber)) {
            return [
                'success' => false,
                'message' => 'Invalid phone number format.'
            ];
        }

        // Check for recent OTP requests (rate limiting - 1 OTP per minute per number)
        $recentOTP = Otp::where('phone_number', $phoneNumber)
            ->where('created_at', '>=', now()->subMinute())
            ->exists();

        if ($recentOTP) {
            return [
                'success' => false,
                'message' => 'Please wait 1 minute before requesting another OTP.'
            ];
        }

        // Generate OTP
        $otpCode = $this->generateOTP();

        // Send OTP via Fast2SMS
        try {
            // Disable SSL verification in local development
            $httpClient = Http::withHeaders([
                'authorization' => $this->apiKey,
            ]);

            // In local development, disable SSL verification
            if (config('app.env') === 'local') {
                $httpClient = $httpClient->withOptions([
                    'verify' => false,
                ]);
            }

            $response = $httpClient->post($this->baseUrl, [
                'route' => 'q',
                'message' => "Your OTP verification code is: {$otpCode}. Valid for 5 minutes. Do not share this code with anyone.",
                'language' => 'english',
                'flash' => 0,
                'numbers' => $phoneNumber,
            ]);

            $responseData = $response->json();

            // Check if SMS was sent successfully
            if ($response->successful() && isset($responseData['return']) && $responseData['return'] === true) {
                // Store OTP in database
                Otp::create([
                    'phone_number' => $phoneNumber,
                    'otp_code' => $otpCode,
                    'expires_at' => now()->addMinutes(5),
                    'verified' => false,
                    'ip_address' => $ipAddress,
                ]);

                Log::info('OTP sent successfully', [
                    'phone_number' => $phoneNumber,
                    'ip_address' => $ipAddress,
                ]);

                return [
                    'success' => true,
                    'message' => 'OTP sent successfully to your mobile number.'
                ];
            } else {
                // Get specific error message from Fast2SMS response
                $errorMessage = 'Failed to send OTP.';

                if (isset($responseData['message'])) {
                    $errorMessage = $responseData['message'];
                } elseif (!$this->apiKey) {
                    $errorMessage = 'Fast2SMS API key is not configured.';
                } elseif (isset($responseData['return']) && $responseData['return'] === false) {
                    $errorMessage = 'Fast2SMS returned an error. Please check your API key and credits.';
                }

                Log::error('Fast2SMS API error', [
                    'status' => $response->status(),
                    'response' => $responseData,
                    'phone_number' => $phoneNumber,
                    'api_key_set' => !empty($this->apiKey),
                ]);

                return [
                    'success' => false,
                    'message' => $errorMessage
                ];
            }
        } catch (\Exception $e) {
            Log::error('Fast2SMS exception', [
                'error' => $e->getMessage(),
                'phone_number' => $phoneNumber,
            ]);

            return [
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.'
            ];
        }
    }

    /**
     * Verify OTP code
     */
    public function verifyOTP(string $phoneNumber, string $otpCode): array
    {
        // Clean inputs
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        $otpCode = preg_replace('/[^0-9]/', '', $otpCode);

        // Find the most recent unverified OTP for this phone number
        $otp = Otp::where('phone_number', $phoneNumber)
            ->where('otp_code', $otpCode)
            ->where('verified', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otp) {
            return [
                'success' => false,
                'message' => 'Invalid or expired OTP code.'
            ];
        }

        // Mark OTP as verified
        $otp->update(['verified' => true]);

        Log::info('OTP verified successfully', [
            'phone_number' => $phoneNumber,
        ]);

        return [
            'success' => true,
            'message' => 'Phone number verified successfully.'
        ];
    }

    /**
     * Check if phone number is verified
     */
    public function isPhoneVerified(string $phoneNumber): bool
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        return Otp::where('phone_number', $phoneNumber)
            ->where('verified', true)
            ->where('created_at', '>=', now()->subHours(24)) // Valid for 24 hours
            ->exists();
    }

    /**
     * Clean up expired OTPs (can be called via scheduled task)
     */
    public function cleanupExpiredOTPs(): int
    {
        return Otp::where('expires_at', '<', now()->subHours(24))
            ->delete();
    }
}
