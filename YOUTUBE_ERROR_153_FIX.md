# YouTube Error 153 - Production Fix

## Problem
YouTube Error 153 "Video player configuration error" appearing on production with embed URLs like:
```
https://www.youtube.com/embed/LU33WW200zk?rel=0&modestbranding=1&enablejsapi=1&origin=https%3A%2F%2Fmakkaljananayagakatchi.com&widget_referrer=https%3A%2F%2Fmakkaljananayagakatchi.com
```

## Root Cause
The `origin` and `widget_referrer` parameters must exactly match the production domain. Issues can occur when:
1. Origin includes port numbers (even standard ports like 443)
2. Origin includes paths or trailing slashes
3. Origin doesn't match the exact domain YouTube sees in the request
4. Domain mismatch between www and non-www versions

## Fixes Applied

### 1. Improved PHP Origin Detection (`app/Models/Traits/HasYouTubeVideo.php`)
- **New method:** `getOriginForYouTube()` that:
  - Prioritizes current request origin (most reliable in production)
  - Falls back to `APP_URL` from config
  - Removes port numbers from origin
  - Ensures clean format: `https://domain.com` (no path, no port)
  - Validates URL format before returning

### 2. Improved JavaScript Origin Detection
- **Updated files:**
  - `resources/js/youtube-helper.js` - Added `getYouTubeOrigin()` function
  - `resources/views/pages/home.blade.php` - Updated modal video loading
  - `resources/views/pages/videos.blade.php` - Updated modal video loading
  - `resources/views/pages/home-new-old.blade.php` - Updated modal video loading
  - `resources/views/pages/home-old.blade.php` - Updated modal video loading

- **Improvements:**
  - Removes standard ports (80 for HTTP, 443 for HTTPS)
  - Uses clean hostname only
  - Handles URL parsing errors gracefully

### 3. Updated PHP-Based Embeds (`resources/views/welcome.blade.php`)
- Updated playlist and live stream embed URLs
- Uses `request()->getSchemeAndHttpHost()` for accurate origin
- Removes ports and paths from origin

## Files Modified

1. ✅ `app/Models/Traits/HasYouTubeVideo.php` - Improved origin detection
2. ✅ `resources/js/youtube-helper.js` - Added origin cleaning function
3. ✅ `resources/views/pages/home.blade.php` - Updated JavaScript origin handling
4. ✅ `resources/views/pages/videos.blade.php` - Updated JavaScript origin handling
5. ✅ `resources/views/pages/home-new-old.blade.php` - Updated JavaScript origin handling
6. ✅ `resources/views/pages/home-old.blade.php` - Updated JavaScript origin handling
7. ✅ `resources/views/welcome.blade.php` - Updated PHP origin handling

## Production Deployment Checklist

### 1. Verify APP_URL Configuration
```bash
# On production server, check .env file
grep APP_URL .env

# Should be:
APP_URL=https://makkaljananayagakatchi.com
# OR
APP_URL=https://www.makkaljananayagakatchi.com
```

**Important:**
- ✅ Must include `https://` protocol
- ✅ Must match exact domain (with or without www, depending on your setup)
- ✅ No trailing slash
- ✅ No port number

### 2. Clear Configuration Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache
```

### 3. Verify Origin Detection
```bash
php artisan tinker
```

```php
// Test origin detection
$media = new \App\Models\Media();
$testUrl = 'https://www.youtube.com/watch?v=LU33WW200zk';
$embedUrl = $media->getYouTubeEmbedUrl($testUrl);
echo $embedUrl;
// Should show origin matching your domain exactly
```

### 4. Test in Browser
1. Visit a page with YouTube videos
2. Open DevTools (F12) → Console
3. Check for Error 153 - should be gone
4. Inspect iframe src attribute - verify origin parameter matches your domain

## How It Works Now

### PHP (Server-Side)
1. Checks current request origin first (most reliable)
2. Falls back to `APP_URL` config
3. Cleans origin: removes port, path, trailing slashes
4. Returns format: `https://domain.com`

### JavaScript (Client-Side)
1. Uses `window.location.origin`
2. Removes standard ports (80/443)
3. Uses clean hostname only
4. Encodes properly for URL

## Expected Result

After deployment, YouTube embed URLs should look like:
```
https://www.youtube.com/embed/LU33WW200zk?rel=0&modestbranding=1&enablejsapi=1&origin=https%3A%2F%2Fmakkaljananayagakatchi.com&widget_referrer=https%3A%2F%2Fmakkaljananayagakatchi.com
```

The origin parameter should:
- ✅ Match your exact production domain
- ✅ Use HTTPS protocol
- ✅ Not include port numbers
- ✅ Not include paths or trailing slashes
- ✅ Be properly URL-encoded

## Troubleshooting

If Error 153 persists:

1. **Check domain match:**
   - Verify `APP_URL` exactly matches what users see in browser
   - Check for www vs non-www mismatch
   - Ensure HTTPS is used

2. **Check video settings:**
   - Video must allow embedding
   - Video must be public or unlisted (not private)
   - Video must not have domain restrictions

3. **Check browser console:**
   - Look for specific error messages
   - Check network tab for failed requests
   - Verify iframe src attribute has correct origin

4. **Verify HTTPS:**
   ```bash
   curl -I https://viduthalaichiruthaigalkatchi.com
   # Should return 200 OK with valid SSL
   ```

## Summary

The fix ensures that:
- ✅ Origin detection prioritizes current request (most accurate)
- ✅ Port numbers are removed from origin
- ✅ Clean origin format: `https://domain.com`
- ✅ All JavaScript and PHP embed URL generation uses improved origin detection
- ✅ Works even if `APP_URL` is not set correctly (uses request origin as fallback)

The code is now more robust and should work correctly in production!

