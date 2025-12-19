# OTP Troubleshooting Guide

## ✅ FIXED: SSL Certificate Error

### Issue
"Failed to send OTP. Please try again."

### Root Cause
SSL certificate verification issue in local development environment (macOS with Valet).

### Solution Applied
Updated `app/Services/Fast2SMSService.php` to disable SSL verification in local development:

```php
// In local development, disable SSL verification
if (config('app.env') === 'local') {
    $httpClient = $httpClient->withOptions([
        'verify' => false,
    ]);
}
```

**Note**: SSL verification is only disabled in local development (`APP_ENV=local`). Production environments will still use full SSL verification.

---

## 🧪 Test Again

Now try sending OTP again:

1. Navigate to `/join` or `/applications`
2. Enter mobile number
3. Click "Verify Mobile Number"
4. Click "Send OTP"
5. Should now work! ✅

---

## 🔍 Other Common Issues

### Issue: "Fast2SMS API key is not configured"

**Solution:**
Check your `.env` file has:
```env
FAST2SMS_API_KEY=your_key_here
```

Then restart Laravel:
```bash
php artisan config:clear
php artisan cache:clear
```

### Issue: "Invalid phone number format"

**Solution:**
- Phone must be 10 digits
- Must start with 6, 7, 8, or 9
- Example: `9876543210`

### Issue: "Please wait 1 minute before requesting another OTP"

**Solution:**
- This is rate limiting working correctly
- Wait 1 minute before trying again
- Or clear database: `php artisan tinker` then `\App\Models\Otp::truncate()`

### Issue: "Invalid or expired OTP code"

**Possible causes:**
1. Entered wrong OTP
2. OTP expired (5 minutes passed)
3. OTP already used

**Solution:**
- Click "Resend OTP"
- Enter new OTP within 5 minutes

### Issue: Still not receiving SMS

**Check:**

1. **Fast2SMS Credits:**
   - Login to: https://www.fast2sms.com/dashboard
   - Check if you have credits

2. **API Key Valid:**
   ```bash
   php artisan tinker
   >>> config('services.fast2sms.api_key')
   ```
   Should show your API key

3. **Check Logs:**
   ```bash
   tail -50 storage/logs/laravel.log
   ```
   Look for "Fast2SMS" entries

4. **Test API Directly:**
   Use the test script created earlier

---

## 📊 Verify OTP in Database

```bash
php artisan tinker
```

```php
// Check latest OTP
\App\Models\Otp::latest()->first()

// Check all OTPs
\App\Models\Otp::all()

// Count OTPs
\App\Models\Otp::count()

// Check for specific phone
\App\Models\Otp::where('phone_number', '9876543210')->get()
```

---

## 🔧 Reset Everything

If nothing works, reset:

```bash
# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Truncate OTP table
php artisan tinker
>>> \App\Models\Otp::truncate()
>>> exit

# Restart server
# If using Valet: valet restart
# If using artisan serve: Ctrl+C and restart
```

---

## ✅ Success Indicators

OTP is working when you see:

1. ✅ No SSL errors in browser console
2. ✅ "OTP sent successfully to your mobile number" message in modal
3. ✅ SMS received on phone
4. ✅ OTP verifies correctly
5. ✅ Button turns green: "Mobile Verified"
6. ✅ Entry in `otps` database table

---

## 🚨 Production Deployment

When deploying to production:

1. **Ensure `APP_ENV=production` in .env**
   - SSL verification will be enabled automatically
   - Never use `APP_ENV=local` in production!

2. **Test SSL works:**
   ```bash
   curl -I https://www.fast2sms.com
   ```
   Should return 200 OK

3. **Monitor logs:**
   ```bash
   tail -f storage/logs/laravel.log | grep "Fast2SMS"
   ```

---

## 📞 Fast2SMS Support

If API issues persist:

- **Documentation**: https://docs.fast2sms.com/
- **Dashboard**: https://www.fast2sms.com/dashboard
- **Support**: Check their support section

---

**Last Updated**: December 17, 2025
**Status**: SSL Certificate Issue Fixed ✅
