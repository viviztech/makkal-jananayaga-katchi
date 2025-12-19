# OTP Verification Implementation Guide

This document explains the Fast2SMS OTP verification system implemented for mobile number verification in the VCK application.

## 🎯 Overview

The OTP (One-Time Password) verification system validates mobile numbers using Fast2SMS Quick SMS service before form submission. This adds an extra layer of security and ensures users provide valid, accessible mobile numbers.

## 📋 Features

- ✅ Send 6-digit OTP to Indian mobile numbers via Fast2SMS
- ✅ OTP expires after 5 minutes
- ✅ Rate limiting: Max 5 OTP requests per IP per hour
- ✅ Rate limiting: 1 OTP per phone number per minute
- ✅ Auto-verification when 6 digits entered
- ✅ Resend OTP functionality
- ✅ Beautiful modal UI with countdown timer
- ✅ Comprehensive error handling and logging
- ✅ Phone number validation (Indian format)

## 🏗️ Architecture

### Components

1. **Database**: `otps` table stores OTP codes with expiration
2. **Service**: `Fast2SMSService` handles API communication
3. **Controller**: `PageController` provides API endpoints
4. **Routes**: OTP send/verify endpoints with rate limiting
5. **Frontend**: Modal UI with JavaScript handler
6. **Model**: `Otp` model for database operations

## 📁 Files Created/Modified

### New Files

1. **Migration**: `database/migrations/2025_12_17_145211_create_otps_table.php`
   - Creates `otps` table with phone number, code, expiration tracking

2. **Service**: `app/Services/Fast2SMSService.php`
   - Handles Fast2SMS API integration
   - Methods: `sendOTP()`, `verifyOTP()`, `isPhoneVerified()`, `cleanupExpiredOTPs()`

3. **Model**: `app/Models/Otp.php`
   - Eloquent model for OTP records

4. **Component**: `resources/views/components/otp-modal.blade.php`
   - Bootstrap modal for OTP verification UI

5. **JavaScript**: `public/js/otp-verification.js`
   - Frontend OTP handling logic
   - Class: `OTPVerification`

### Modified Files

1. **Controller**: `app/Http/Controllers/PageController.php`
   - Added `sendOTP()` and `verifyOTP()` methods
   - Added Fast2SMSService import

2. **Routes**: `routes/web.php`
   - Added `/otp/send` and `/otp/verify` routes
   - Applied `throttle:5,60` middleware for rate limiting

3. **Config**: `config/services.php`
   - Added Fast2SMS configuration

## 🔧 Setup Instructions

### 1. Environment Configuration

Add your Fast2SMS API key to `.env`:

```env
FAST2SMS_API_KEY=your_fast2sms_api_key_here
```

**Get your API key**: https://www.fast2sms.com/dashboard/dev-api

### 2. Database Migration

The migration has been run. Database table schema:

```sql
CREATE TABLE otps (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(15) NOT NULL,
    otp_code VARCHAR(6) NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    verified BOOLEAN DEFAULT FALSE,
    ip_address VARCHAR(45) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    INDEX (phone_number)
);
```

### 3. Frontend Integration

#### For Join Form (`resources/views/pages/join.blade.php`)

Add before closing `</body>` tag:

```blade
<!-- Include OTP Modal -->
@include('components.otp-modal')

<!-- Include OTP JavaScript -->
<script src="{{ asset('js/otp-verification.js') }}"></script>

<script>
$(document).ready(function() {
    // Add "Verify Mobile" button after phone input
    $('#phone_no').after(`
        <button type="button" class="btn btn-info btn-sm mt-2" id="verifyPhoneBtn">
            <i class="fas fa-shield-alt mr-1"></i>Verify Mobile Number
        </button>
        <input type="hidden" id="phoneVerified" name="phone_verified" value="0">
    `);

    // Handle verify button click
    $('#verifyPhoneBtn').on('click', function() {
        const phoneNumber = $('#phone_no').val().trim();

        if (!phoneNumber) {
            alert('Please enter your mobile number first.');
            return;
        }

        // Validate phone format
        if (!/^[6-9][0-9]{9}$/.test(phoneNumber)) {
            alert('Please enter a valid 10-digit Indian mobile number.');
            return;
        }

        // Open OTP modal
        otpVerification.openModal(phoneNumber);
    });

    // Update form submission to check OTP verification
    $('form').on('submit', function(e) {
        if ($('#phoneVerified').val() !== '1') {
            e.preventDefault();
            alert('Please verify your mobile number before submitting.');
            return false;
        }
    });

    // Listen for successful verification
    $('#otpModal').on('hidden.bs.modal', function() {
        if (otpVerification.getVerificationStatus()) {
            $('#phoneVerified').val('1');
            $('#verifyPhoneBtn')
                .removeClass('btn-info')
                .addClass('btn-success')
                .html('<i class="fas fa-check-circle mr-1"></i>Mobile Verified')
                .prop('disabled', true);
        }
    });
});
</script>
```

#### For Application Form (`resources/views/pages/applications.blade.php`)

Similar integration, but use `#mobile_number` instead of `#phone_no`.

## 🔐 Security Features

### 1. Rate Limiting

**OTP Requests**:
- Max 5 requests per IP per hour (`throttle:5,60`)
- Max 1 request per phone number per minute (in service)

**Purpose**: Prevents spam and abuse

### 2. OTP Expiration

- OTP expires after 5 minutes
- Expired OTPs cannot be verified
- User can request new OTP after expiration

### 3. Phone Number Validation

```php
// Validates Indian mobile format
'regex:/^[6-9][0-9]{9}$/'
```

- Must start with 6, 7, 8, or 9
- Exactly 10 digits
- Sanitized before processing

### 4. Input Sanitization

```php
// Remove all non-numeric characters
$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
$otpCode = preg_replace('/[^0-9]/', '', $otpCode);
```

### 5. Logging

All OTP operations are logged:
- OTP sent successfully
- OTP verification attempts
- Fast2SMS API errors

**Log Location**: `storage/logs/laravel.log`

## 📊 Database Schema

### `otps` Table

| Column | Type | Description |
|--------|------|-------------|
| `id` | BIGINT | Primary key |
| `phone_number` | VARCHAR(15) | Phone number (indexed) |
| `otp_code` | VARCHAR(6) | 6-digit OTP code |
| `expires_at` | TIMESTAMP | Expiration time (5 min from creation) |
| `verified` | BOOLEAN | Whether OTP was verified |
| `ip_address` | VARCHAR(45) | IP address of requester |
| `created_at` | TIMESTAMP | Creation timestamp |
| `updated_at` | TIMESTAMP | Update timestamp |

## 🎨 Frontend UI Features

### Modal States

1. **Send OTP State**
   - Display phone number
   - "Send OTP" button

2. **Verify OTP State**
   - 6-digit OTP input field
   - Countdown timer (5:00)
   - "Verify OTP" button
   - "Resend OTP" button (enabled after 1 minute)

3. **Success State**
   - Success icon and message
   - Auto-closes after 2 seconds

### User Experience

- Auto-verification when 6 digits entered
- Real-time countdown timer
- Loading states on buttons
- Alert messages for errors
- Responsive design
- Keyboard support

## 🔄 API Endpoints

### Send OTP

**Endpoint**: `POST /otp/send`

**Rate Limit**: 5 requests per IP per hour

**Request**:
```json
{
    "phone_number": "9876543210"
}
```

**Success Response** (200):
```json
{
    "success": true,
    "message": "OTP sent successfully to your mobile number."
}
```

**Error Response** (422):
```json
{
    "success": false,
    "message": "Please wait 1 minute before requesting another OTP."
}
```

### Verify OTP

**Endpoint**: `POST /otp/verify`

**Request**:
```json
{
    "phone_number": "9876543210",
    "otp_code": "123456"
}
```

**Success Response** (200):
```json
{
    "success": true,
    "message": "Phone number verified successfully."
}
```

**Error Response** (422):
```json
{
    "success": false,
    "message": "Invalid or expired OTP code."
}
```

## 💻 Fast2SMSService Methods

### `sendOTP(string $phoneNumber, string $ipAddress = null): array`

Sends OTP to phone number via Fast2SMS.

**Returns**:
```php
[
    'success' => true|false,
    'message' => 'Success or error message'
]
```

**Features**:
- Generates random 6-digit OTP
- Validates phone format
- Checks rate limiting (1 per minute)
- Sends SMS via Fast2SMS API
- Stores OTP in database with 5-minute expiration
- Logs all operations

### `verifyOTP(string $phoneNumber, string $otpCode): array`

Verifies OTP code for phone number.

**Returns**:
```php
[
    'success' => true|false,
    'message' => 'Success or error message'
]
```

**Features**:
- Validates inputs
- Finds most recent unverified OTP
- Checks expiration
- Marks OTP as verified
- Logs verification

### `isPhoneVerified(string $phoneNumber): bool`

Checks if phone number has been verified in last 24 hours.

**Returns**: `true` if verified, `false` otherwise

### `cleanupExpiredOTPs(): int`

Deletes OTPs older than 24 hours.

**Returns**: Number of deleted records

**Usage**: Can be added to Laravel scheduled tasks in `app/Console/Kernel.php`:

```php
$schedule->call(function () {
    $service = new Fast2SMSService();
    $service->cleanupExpiredOTPs();
})->daily();
```

## 🧪 Testing

### Manual Testing

1. **Test OTP Send**:
   - Enter valid phone number
   - Click "Verify Mobile"
   - Check SMS received
   - Verify OTP stored in database

2. **Test OTP Verification**:
   - Enter correct OTP
   - Should show success message
   - Button should change to "Mobile Verified"

3. **Test Expiration**:
   - Wait 5 minutes after receiving OTP
   - Try to verify expired OTP
   - Should show expiration error

4. **Test Rate Limiting**:
   - Request OTP 6 times quickly
   - 6th request should be rejected with 429 error

### Database Queries

```sql
-- Check recent OTPs
SELECT * FROM otps ORDER BY created_at DESC LIMIT 10;

-- Check verified OTPs
SELECT * FROM otps WHERE verified = 1;

-- Check expired OTPs
SELECT * FROM otps WHERE expires_at < NOW();

-- Count OTPs by phone
SELECT phone_number, COUNT(*) as count
FROM otps
GROUP BY phone_number
ORDER BY count DESC;
```

## 🐛 Troubleshooting

### Issue: OTP not received

**Possible causes**:
1. Invalid Fast2SMS API key
2. Insufficient Fast2SMS credits
3. Phone number format incorrect
4. Network issues

**Solution**:
- Check `storage/logs/laravel.log` for Fast2SMS API errors
- Verify API key in `.env`
- Check Fast2SMS dashboard for credits
- Test with different phone number

### Issue: "Failed to send OTP"

**Check**:
1. Fast2SMS API key configured correctly
2. Phone number is valid Indian mobile
3. Fast2SMS service is operational
4. Check Laravel logs for detailed error

### Issue: Rate limit exceeded

**Solution**:
- Wait for rate limit to reset (1 hour for IP, 1 minute for phone)
- Contact admin to adjust rate limits if needed

### Issue: OTP expired

**Solution**:
- User should click "Resend OTP"
- OTP expires after 5 minutes for security

## 📈 Best Practices

1. **Always verify OTP before form submission**
2. **Show clear error messages to users**
3. **Log all OTP operations for security audit**
4. **Regularly cleanup expired OTPs**
5. **Monitor Fast2SMS usage and credits**
6. **Keep API keys secure (never commit to Git)**
7. **Test thoroughly before production deployment**

## 🔒 Security Considerations

1. **Never log OTP codes in plain text**
2. **Use HTTPS in production**
3. **Implement IP rate limiting**
4. **Set reasonable expiration times**
5. **Validate all inputs**
6. **Sanitize phone numbers**
7. **Use CSRF protection**
8. **Monitor for abuse patterns**

## 📝 Maintenance Tasks

### Regular Tasks

- Monitor Fast2SMS credits
- Review OTP logs for anomalies
- Clean up old OTP records
- Update rate limits as needed
- Test OTP functionality monthly

### Scheduled Cleanup

Add to `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule)
{
    // Clean up expired OTPs daily at 2 AM
    $schedule->call(function () {
        $service = new \App\Services\Fast2SMSService();
        $deleted = $service->cleanupExpiredOTPs();
        \Log::info("Cleaned up {$deleted} expired OTPs");
    })->dailyAt('02:00');
}
```

## 🎯 Integration Checklist

- [x] Fast2SMS API key added to `.env`
- [x] Migration run to create `otps` table
- [x] Service class created and tested
- [x] Routes added with rate limiting
- [x] Controller methods implemented
- [x] OTP modal component created
- [x] JavaScript handler created
- [ ] Frontend integration in join.blade.php
- [ ] Frontend integration in applications.blade.php
- [ ] Form submission validation updated
- [ ] Testing completed
- [ ] Documentation reviewed

## 📚 References

- **Fast2SMS Documentation**: https://docs.fast2sms.com/
- **Fast2SMS Dashboard**: https://www.fast2sms.com/dashboard
- **Laravel Rate Limiting**: https://laravel.com/docs/routing#rate-limiting
- **Laravel HTTP Client**: https://laravel.com/docs/http-client

---

**Last Updated**: December 17, 2025
**Version**: 1.0
**Status**: Implementation Complete - Ready for Frontend Integration
