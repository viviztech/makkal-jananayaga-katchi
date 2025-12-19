# YouTube Error 153 - Production Server Configuration Guide

## Problem
YouTube Error 153 "Video player configuration error" appears on production server even though code is correct.

## Root Cause
The `origin` and `widget_referrer` parameters in YouTube embed URLs must **exactly match** your production domain. If `APP_URL` in `.env` doesn't match the actual domain, YouTube will reject the embed.

## Critical Production Configuration

### 1. Set APP_URL in .env File

**On your production server, edit `.env` file:**

```bash
# SSH into your production server
nano .env
```

**Set APP_URL to match your EXACT production domain:**

```env
APP_URL=https://yourdomain.com
```

**Important:**
- ✅ Must include `https://` protocol
- ✅ Must match the exact domain (no trailing slash)
- ✅ Must match what users see in browser address bar
- ❌ Don't use `http://` (YouTube requires HTTPS)
- ❌ Don't include `www.` if your site doesn't use it (or include it if it does)

**Examples:**
```env
# Correct
APP_URL=https://makkaljananayagakatchi.com
APP_URL=https://www.makkaljananayagakatchi.com

# Wrong
APP_URL=http://makkaljananayagakatchi.com  # Missing HTTPS
APP_URL=https://makkaljananayagakatchi.com/  # Trailing slash
APP_URL=makkaljananayagakatchi.com  # Missing protocol
```

### 2. Clear Configuration Cache

After updating `.env`, clear Laravel's configuration cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

### 3. Verify Configuration

Test that the configuration is correct:

```bash
php artisan tinker
```

```php
// Check current APP_URL
config('app.url');

// Test embed URL generation
$media = App\Models\Media::whereNotNull('video_link')->first();
echo $media->video_embed_url;
```

The embed URL should include:
- `origin=https://yourdomain.com` (must match your actual domain)
- `widget_referrer=https://yourdomain.com` (must match your actual domain)
- `enablejsapi=1` (critical parameter)

### 4. Check HTTPS Configuration

YouTube requires HTTPS for embeds. Verify:

1. **SSL Certificate is valid:**
   ```bash
   curl -I https://yourdomain.com
   ```

2. **Laravel detects HTTPS:**
   ```bash
   php artisan tinker
   ```
   ```php
   request()->secure(); // Should return true
   request()->getSchemeAndHttpHost(); // Should return https://yourdomain.com
   ```

3. **Force HTTPS in production:**
   
   Edit `app/Providers/AppServiceProvider.php`:
   ```php
   public function boot()
   {
       if (config('app.env') === 'production') {
           \URL::forceScheme('https');
       }
   }
   ```

### 5. Check Server Headers

Ensure your server sends correct headers:

```bash
curl -I https://yourdomain.com
```

Should see:
```
HTTP/2 200
...
X-Forwarded-Proto: https  # If using reverse proxy
```

### 6. Verify Origin Parameter

The origin parameter in embed URLs must match:
- The domain in browser address bar
- The domain in `APP_URL`
- The domain YouTube sees in the request

**Check in browser console:**
1. Open page with YouTube video
2. Open DevTools (F12) → Network tab
3. Find the YouTube iframe request
4. Check the `origin` parameter in the URL

## Common Production Issues

### Issue 1: APP_URL Not Set Correctly

**Symptoms:**
- Error 153 on production
- Videos work on localhost but not production

**Solution:**
```bash
# Check current APP_URL
php artisan tinker
config('app.url')

# Update .env
APP_URL=https://yourdomain.com

# Clear cache
php artisan config:clear
php artisan config:cache
```

### Issue 2: Domain Mismatch

**Symptoms:**
- `www.` vs non-www mismatch
- HTTP vs HTTPS mismatch

**Solution:**
- Ensure `APP_URL` exactly matches what users see
- If site redirects www to non-www (or vice versa), set `APP_URL` to the final destination

### Issue 3: Reverse Proxy / Load Balancer

**Symptoms:**
- Laravel thinks it's HTTP when it's actually HTTPS

**Solution:**

Edit `app/Providers/AppServiceProvider.php`:
```php
public function boot()
{
    // Trust proxy headers
    if (config('app.env') === 'production') {
        \Illuminate\Support\Facades\URL::forceScheme('https');
        
        // If behind reverse proxy
        request()->server->set('HTTPS', 'on');
    }
}
```

### Issue 4: Cached Configuration

**Symptoms:**
- Changes to `.env` don't take effect

**Solution:**
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache
```

## Testing Checklist

- [ ] `APP_URL` in `.env` matches production domain exactly
- [ ] `APP_URL` includes `https://` protocol
- [ ] Configuration cache cleared after `.env` changes
- [ ] SSL certificate is valid
- [ ] Site loads with HTTPS
- [ ] `config('app.url')` returns correct URL
- [ ] Embed URLs include correct `origin` parameter
- [ ] Videos load without Error 153

## Quick Fix Script

Run this on production server to verify and fix:

```bash
#!/bin/bash

echo "Checking YouTube configuration..."

# Check APP_URL
echo "APP_URL in .env:"
grep APP_URL .env

# Check config
echo -e "\nAPP_URL in config:"
php artisan tinker --execute="echo config('app.url');"

# Clear caches
echo -e "\nClearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Rebuild config
echo -e "\nRebuilding config cache..."
php artisan config:cache

echo -e "\nDone! Test a video page now."
```

## Verification

After configuration, test:

1. **In Browser:**
   - Visit page with YouTube video
   - Open DevTools → Console
   - Should see NO Error 153

2. **In Terminal:**
   ```bash
   php artisan tinker
   ```
   ```php
   $media = App\Models\Media::whereNotNull('video_link')->first();
   $url = $media->video_embed_url;
   echo $url;
   // Should show: https://www.youtube.com/embed/VIDEO_ID?rel=0&modestbranding=1&enablejsapi=1&origin=https://yourdomain.com&widget_referrer=https://yourdomain.com
   ```

3. **Check Origin Parameter:**
   - The `origin` and `widget_referrer` must match your actual domain
   - If they don't match, YouTube will show Error 153

## Still Having Issues?

If Error 153 persists after following this guide:

1. **Check video privacy settings:**
   - Video must allow embedding
   - Video must be public or unlisted (not private)

2. **Check browser console:**
   - Look for specific error messages
   - Check network tab for failed requests

3. **Test with a known working video:**
   - Use a public YouTube video ID
   - Verify the issue is domain-related, not video-related

4. **Contact hosting provider:**
   - Verify HTTPS is properly configured
   - Check if any security headers are blocking YouTube

## Summary

**The most common cause of Error 153 on production is:**
- `APP_URL` not matching the actual domain
- Missing or incorrect HTTPS configuration
- Cached configuration with old values

**Fix:**
1. Set `APP_URL=https://yourdomain.com` in `.env`
2. Clear all caches
3. Verify origin parameter matches your domain

