# Fix YouTube Error 153 - Video Player Configuration Error

## Problem
YouTube videos are showing Error 153 "Video player configuration error" on the production server.

## Root Causes
YouTube Error 153 typically occurs due to:
1. Missing required iframe parameters (`enablejsapi`, `origin`, etc.)
2. Incorrect embed URL format
3. Domain/origin mismatch
4. Missing security attributes in iframe

## Solution Implemented

### 1. Created `HasYouTubeVideo` Trait

**File:** `app/Models/Traits/HasYouTubeVideo.php`

This trait provides standardized methods for:
- Extracting YouTube video IDs from various URL formats
- Generating properly configured embed URLs with all required parameters
- Getting thumbnail URLs
- Validating YouTube URLs

**Key Features:**
- Automatically includes required parameters to prevent Error 153
- Handles all YouTube URL formats (watch, embed, short links)
- Sets proper origin and referrer for domain validation

### 2. Updated Media Model

**File:** `app/Models/Media.php`

Added:
- `HasYouTubeVideo` trait
- `video_embed_url` accessor - Returns properly configured embed URL
- `video_id` accessor - Returns extracted video ID
- `video_thumbnail_url` accessor - Returns thumbnail URL

### 3. Required Parameters Added

All YouTube embeds now include these parameters:

```php
[
    'rel' => '0',              // Don't show related videos
    'modestbranding' => '1',   // Hide YouTube logo
    'enablejsapi' => '1',      // Enable JavaScript API (CRITICAL!)
    'origin' => config('app.url'), // Set origin domain
    'widget_referrer' => config('app.url'), // Set referrer
]
```

## Usage

### In Blade Views

**Before (Causing Error 153):**
```blade
<iframe src="https://www.youtube.com/embed/{{ $videoId }}"></iframe>
```

**After (Fixed):**
```blade
{{-- Method 1: Use accessor --}}
@if($mediaItem->video_embed_url)
    <iframe src="{{ $mediaItem->video_embed_url }}" ...></iframe>
@endif

{{-- Method 2: Use component --}}
<x-youtube-embed 
    :videoUrl="$mediaItem->video_link" 
    :title="$mediaItem->title_en"
/>
```

### In PHP Code

```php
// Get properly configured embed URL
$embedUrl = $media->video_embed_url;

// Or use the method directly
$embedUrl = $media->getYouTubeEmbedUrl($videoLink, [
    'autoplay' => '1', // Optional: add autoplay
]);
```

## Updated Views

### 1. `resources/views/pages/media.blade.php`
- ✅ Updated to use `video_embed_url` accessor
- ✅ Added proper iframe attributes

### 2. Created `resources/views/components/youtube-embed.blade.php`
- Reusable component for YouTube embeds
- Handles all edge cases
- Includes error fallback

## Standard Iframe Attributes

All YouTube iframes should include:

```html
<iframe
    src="{{ $embedUrl }}"
    class="w-full"
    style="aspect-ratio: 16/9; min-height: 400px;"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
    title="Video Title"
    loading="lazy"
></iframe>
```

## Testing

### Test Embed URL Generation

```bash
php artisan tinker

# Test with a Media model
$media = App\Models\Media::whereNotNull('video_link')->first();
echo $media->video_embed_url;

# Should output something like:
# https://www.youtube.com/embed/VIDEO_ID?rel=0&modestbranding=1&enablejsapi=1&origin=...
```

### Test in Browser

1. Visit a page with YouTube videos
2. Open browser DevTools (F12)
3. Check Console for errors
4. Verify videos load without Error 153

## Remaining Views to Update

These views still need to be updated to use the new accessors:

1. ✅ `resources/views/pages/media.blade.php` - Updated
2. ⏳ `resources/views/pages/videos.blade.php` - Needs update
3. ⏳ `resources/views/pages/home.blade.php` - Needs update
4. ⏳ `resources/views/pages/home-new-old.blade.php` - Needs update
5. ⏳ `resources/views/pages/home-old.blade.php` - Needs update

## Common Issues & Solutions

### Issue: Still Getting Error 153

**Solution:**
1. Clear browser cache
2. Verify `APP_URL` in `.env` matches your domain
3. Check that video is not private/restricted
4. Verify embed URL includes all parameters

### Issue: Video Not Loading

**Solution:**
1. Check video ID is valid (11 characters)
2. Verify video is publicly accessible
3. Check if video has domain restrictions
4. Verify origin matches your domain

### Issue: Invalid Video URL

**Solution:**
1. Ensure video link is in correct format
2. Check database for valid YouTube URLs
3. Validate URLs before saving to database

## Production Checklist

- [ ] Update all views to use new accessors/component
- [ ] Verify `APP_URL` in `.env` is correct
- [ ] Test videos on production server
- [ ] Check browser console for errors
- [ ] Verify videos load without Error 153

## Files Modified

- ✅ `app/Models/Traits/HasYouTubeVideo.php` - New trait
- ✅ `app/Models/Media.php` - Added trait and accessors
- ✅ `resources/views/pages/media.blade.php` - Updated to use accessor
- ✅ `resources/views/components/youtube-embed.blade.php` - New component

## Status

✅ **Core solution implemented** - Error 153 should be resolved with proper embed URLs!

Next step: Update remaining views to use the new standardized methods.

