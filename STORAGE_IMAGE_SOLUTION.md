# Permanent Image Storage & Viewing Solution

This document outlines the permanent solution implemented for image storage and public viewing in the application.

## Overview

The solution provides a consistent, reusable system for handling image URLs across all models and views. It ensures:
- Full URL generation with proper domain
- Consistent image access across the application
- Easy maintenance and updates
- Proper fallback handling

## Architecture

### 1. HasImageUrl Trait (`app/Models/Traits/HasImageUrl.php`)

A reusable trait that provides two main methods:
- `getStorageUrl()` - Generates full URLs using Laravel's Storage facade
- `getStorageAssetUrl()` - Alternative method using asset() helper

**Key Features:**
- Automatically handles path normalization
- Validates file existence
- Ensures full URL generation
- Provides fallback support

### 2. Model Updates

Models using images now include:
- **Media Model**: `featured_image_url` accessor, `getPhotoUrl()` helper method
- **Bearer Model**: `photo_url` accessor
- **Book Model**: `cover_image_url` accessor

### 3. View Updates

All view files now use model accessors instead of direct Storage calls:
```blade
<!-- Before -->
<img src="{{ Storage::url($item->featured_image) }}">

<!-- After -->
<img src="{{ $item->featured_image_url }}">
```

## Usage

### In Blade Templates

Simply use the accessor:
```blade
<img src="{{ $media->featured_image_url }}" alt="Image">
```

For array of photos (more_photos):
```blade
@foreach($mediaItem->more_photos as $photo)
    @php
        $photoUrl = $mediaItem->getPhotoUrl($photo);
    @endphp
    <img src="{{ $photoUrl }}" alt="Photo">
@endforeach
```

### In PHP Code

```php
// Direct accessor usage
$imageUrl = $media->featured_image_url;

// Or use the helper method
$imageUrl = $media->getPhotoUrl($photoPath);
```

## Server Configuration

### 1. Storage Symlink

Ensure the storage symlink is created:
```bash
php artisan storage:link
```

This creates a symbolic link: `public/storage` → `storage/app/public`

### 2. File Permissions

On production servers, set proper permissions:

```bash
# Set directory permissions
chmod -R 755 storage/app/public
chmod -R 755 public/storage

# Set file permissions
find storage/app/public -type f -exec chmod 644 {} \;
find public/storage -type l -exec chmod 777 {} \;

# Set ownership (adjust user as needed)
chown -R www-data:www-data storage/app/public
chown -R www-data:www-data public/storage
```

### 3. Environment Configuration

Ensure `APP_URL` in `.env` is set correctly:
```env
APP_URL=https://makkaljananayagakatchi.com
```

## Optional: Secure Image Serving Controller

For additional security, an optional `ImageController` is available that serves images through a Laravel route instead of direct file access.

To enable it, uncomment the route in `routes/web.php`:
```php
Route::get('/storage/{path}', [ImageController::class, 'serve'])
    ->where('path', '.*')
    ->name('images.serve');
```

Then update the trait to use this route instead of direct URLs.

## Troubleshooting

### 403 Forbidden Error

1. Check storage symlink exists:
   ```bash
   ls -la public/storage
   ```

2. Verify file permissions:
   ```bash
   ls -la storage/app/public/
   ```

3. Check web server has access to files

4. Ensure `APP_URL` is set correctly in `.env`

### Images Not Loading

1. Verify file exists:
   ```bash
   php artisan tinker
   Storage::disk('public')->exists('path/to/image.jpg')
   ```

2. Check URL generation:
   ```bash
   php artisan tinker
   $media = App\Models\Media::first();
   $media->featured_image_url;
   ```

## Files Modified

### Models
- `app/Models/Media.php`
- `app/Models/Bearer.php`
- `app/Models/Book.php`

### Traits
- `app/Models/Traits/HasImageUrl.php` (new)

### Views Updated
- `resources/views/pages/press-releases.blade.php`
- `resources/views/pages/media.blade.php`
- `resources/views/pages/gallery.blade.php`
- `resources/views/pages/latest-news.blade.php`
- `resources/views/pages/events.blade.php`
- `resources/views/pages/interviews.blade.php`
- `resources/views/pages/home.blade.php`
- `resources/views/pages/book-order.blade.php`
- `resources/views/pages/leadership.blade.php`
- `resources/views/pages/office-bearers.blade.php`

### Optional Files
- `app/Http/Controllers/ImageController.php` (new, optional)

## Benefits

1. **Consistency**: All images use the same URL generation logic
2. **Maintainability**: Changes to image handling only need to be made in one place
3. **Reliability**: Proper URL generation with fallbacks
4. **Type Safety**: Accessors provide consistent return types
5. **Extensibility**: Easy to add new image-related models

## Future Enhancements

- Image caching support
- CDN integration
- Image optimization/resizing
- Watermarking support
- Multiple storage disk support

