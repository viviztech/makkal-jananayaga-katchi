<?php

namespace App\Services;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GoogleTextToSpeechService
{
    protected $client;
    protected $cacheEnabled;
    protected $cacheDuration;

    public function __construct()
    {
        $this->cacheEnabled = config('services.google_tts.cache_enabled', true);
        $this->cacheDuration = config('services.google_tts.cache_duration', 86400); // 24 hours

        // Initialize Google Cloud TTS client only if credentials are configured
        if (config('services.google_tts.credentials_path')) {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . config('services.google_tts.credentials_path'));
            $this->client = new TextToSpeechClient();
        }
    }

    /**
     * Check if Google Cloud TTS is enabled and configured
     */
    public function isEnabled(): bool
    {
        return config('services.google_tts.enabled', false)
            && !empty(config('services.google_tts.credentials_path'))
            && $this->client !== null;
    }

    /**
     * Generate speech from text using Google Cloud TTS
     *
     * @param string $text The text to convert to speech
     * @param string $language Language code (ta for Tamil, en for English)
     * @param string $voiceName Optional specific voice name
     * @return array ['success' => bool, 'audio_url' => string|null, 'error' => string|null]
     */
    public function synthesizeSpeech(string $text, string $language = 'en', ?string $voiceName = null): array
    {
        if (!$this->isEnabled()) {
            return [
                'success' => false,
                'audio_url' => null,
                'error' => 'Google Cloud TTS is not enabled or configured'
            ];
        }

        try {
            // Generate cache key
            $cacheKey = $this->generateCacheKey($text, $language, $voiceName);

            // Check if audio is cached
            if ($this->cacheEnabled && $audioUrl = $this->getCachedAudio($cacheKey)) {
                return [
                    'success' => true,
                    'audio_url' => $audioUrl,
                    'cached' => true
                ];
            }

            // Prepare synthesis input
            $input = new SynthesisInput();
            $input->setText($text);

            // Select voice
            $voice = new VoiceSelectionParams();
            $voice->setLanguageCode($this->getLanguageCode($language));

            if ($voiceName) {
                $voice->setName($voiceName);
            } else {
                $voice->setName($this->getDefaultVoiceName($language));
            }

            // Configure audio output
            $audioConfig = new AudioConfig();
            $audioConfig->setAudioEncoding(AudioEncoding::MP3);
            $audioConfig->setSpeakingRate(1.0);
            $audioConfig->setPitch(0.0);

            // Perform text-to-speech request
            $response = $this->client->synthesizeSpeech($input, $voice, $audioConfig);
            $audioContent = $response->getAudioContent();

            // Save audio file
            $audioUrl = $this->saveAudioFile($audioContent, $cacheKey);

            // Cache the audio URL
            if ($this->cacheEnabled) {
                $this->cacheAudioUrl($cacheKey, $audioUrl);
            }

            Log::info('Google TTS: Successfully generated speech', [
                'language' => $language,
                'text_length' => strlen($text),
                'voice' => $voiceName ?? $this->getDefaultVoiceName($language)
            ]);

            return [
                'success' => true,
                'audio_url' => $audioUrl,
                'cached' => false
            ];

        } catch (\Exception $e) {
            Log::error('Google TTS Error: ' . $e->getMessage(), [
                'language' => $language,
                'text_length' => strlen($text)
            ]);

            return [
                'success' => false,
                'audio_url' => null,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get list of available voices for a language
     */
    public function getAvailableVoices(string $language = 'ta'): array
    {
        if (!$this->isEnabled()) {
            return [];
        }

        try {
            $languageCode = $this->getLanguageCode($language);
            $response = $this->client->listVoices($languageCode);
            $voices = [];

            foreach ($response->getVoices() as $voice) {
                $voices[] = [
                    'name' => $voice->getName(),
                    'gender' => $voice->getSsmlGender() === SsmlVoiceGender::MALE ? 'Male' : 'Female',
                    'language_codes' => iterator_to_array($voice->getLanguageCodes())
                ];
            }

            return $voices;

        } catch (\Exception $e) {
            Log::error('Google TTS: Failed to list voices - ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Generate unique cache key for audio
     */
    protected function generateCacheKey(string $text, string $language, ?string $voiceName): string
    {
        $key = md5($text . '_' . $language . '_' . ($voiceName ?? 'default'));
        return 'tts_' . $key;
    }

    /**
     * Get cached audio URL
     */
    protected function getCachedAudio(string $cacheKey): ?string
    {
        $audioUrl = Cache::get($cacheKey);

        if ($audioUrl && Storage::disk('public')->exists('tts/' . basename($audioUrl))) {
            return $audioUrl;
        }

        return null;
    }

    /**
     * Cache audio URL
     */
    protected function cacheAudioUrl(string $cacheKey, string $audioUrl): void
    {
        Cache::put($cacheKey, $audioUrl, $this->cacheDuration);
    }

    /**
     * Save audio file to storage
     */
    protected function saveAudioFile(string $audioContent, string $cacheKey): string
    {
        $filename = $cacheKey . '.mp3';
        $path = 'tts/' . $filename;

        Storage::disk('public')->put($path, $audioContent);

        return Storage::disk('public')->url($path);
    }

    /**
     * Get full language code for Google TTS
     */
    protected function getLanguageCode(string $language): string
    {
        $languageCodes = [
            'ta' => 'ta-IN',  // Tamil (India)
            'en' => 'en-IN',  // English (India)
        ];

        return $languageCodes[$language] ?? 'en-IN';
    }

    /**
     * Get default voice name for language
     */
    protected function getDefaultVoiceName(string $language): string
    {
        $defaultVoices = [
            'ta' => 'ta-IN-Wavenet-A',  // Tamil Female WaveNet voice
            'en' => 'en-IN-Wavenet-D',  // English Indian Female WaveNet voice
        ];

        return $defaultVoices[$language] ?? 'en-IN-Wavenet-D';
    }

    /**
     * Clear cached audio files older than specified days
     */
    public function clearOldCache(int $days = 7): int
    {
        try {
            $files = Storage::disk('public')->files('tts');
            $count = 0;
            $threshold = now()->subDays($days)->timestamp;

            foreach ($files as $file) {
                if (Storage::disk('public')->lastModified($file) < $threshold) {
                    Storage::disk('public')->delete($file);
                    $count++;
                }
            }

            Log::info("Google TTS: Cleared {$count} old cached audio files");
            return $count;

        } catch (\Exception $e) {
            Log::error('Google TTS: Failed to clear old cache - ' . $e->getMessage());
            return 0;
        }
    }

    /**
     * Get estimated cost for text
     */
    public function getEstimatedCost(string $text): array
    {
        $characters = mb_strlen($text);

        // Google Cloud TTS pricing (as of 2025)
        // WaveNet voices: $16 per 1 million characters
        // Standard voices: $4 per 1 million characters

        $wavenetCost = ($characters / 1000000) * 16;
        $standardCost = ($characters / 1000000) * 4;

        return [
            'characters' => $characters,
            'wavenet_cost' => number_format($wavenetCost, 4),
            'standard_cost' => number_format($standardCost, 4),
        ];
    }

    public function __destruct()
    {
        if ($this->client) {
            $this->client->close();
        }
    }
}
