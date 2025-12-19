# Storage Setup & Configuration Guide

## Overview
All uploaded images are stored in `storage/app/public` and made accessible via the `public/storage` symbolic link.

## Storage Structure

### Current Folder Organization

```
storage/app/public/
├── media/
│   ├── featured/          # Featured images for press releases, news, events
│   └── gallery/           # Additional photos for media items
├── books/
│   └── covers/            # Book cover images
├── bearers/               # Office bearer photos
├── member_photos/         # Member photos
└── applications/
    ├── photos/            # Application photos
    └── documents/         # Application documents
```

## Filament File Upload Configurations

### 1. Media (Press Releases, News, Events)
**Location:** `app/Filament/Resources/Media/Schemas/MediaForm.php`
- **Featured Image:** `storage/app/public/media/featured/`
- **More Photos:** `storage/app/public/media/gallery/`
- **Disk:** `public`
- **Visibility:** `public`

### 2. Books
**Location:** `app/Filament/Resources/Books/Schemas/BookForm.php`
- **Cover Image:** `storage/app/public/books/covers/`
- **Disk:** `public`
- **Visibility:** `public`

### 3. Bearers (Office Bearers)
**Location:** `app/Filament/Resources/Bearers/Schemas/BearerForm.php`
- **Photo:** `storage/app/public/bearers/`
- **Disk:** `public`
- **Visibility:** `public`

### 4. Members
**Location:** `app/Filament/Resources/Members/Schemas/MemberForm.php`
- **Photo:** `storage/app/public/member_photos/`
- **Disk:** `public`
- **Visibility:** `public`

### 5. Applications
**Location:** `app/Filament/Resources/Applications/Schemas/ApplicationForm.php`
- **Photo:** `storage/app/public/applications/photos/`
- **Document:** `storage/app/public/applications/documents/`
- **Disk:** `public`
- **Visibility:** `public`

## Public Access URLs

All images are accessible via:
```
https://yourdomain.com/storage/{path}
```

Examples:
- Media featured image: `https://yourdomain.com/storage/media/featured/filename.jpg`
- Book cover: `https://yourdomain.com/storage/books/covers/filename.jpg`
- Bearer photo: `https://yourdomain.com/storage/bearers/filename.jpg`

## Setup Commands

### Initial Setup
```bash
# Create storage symlink (if not exists)
php artisan storage:link

# Set proper permissions
chmod -R 755 storage/app/public
chmod -R 755 public/storage

# For production servers, set ownership
chown -R www-data:www-data storage/app/public
chown -R www-data:www-data public/storage
```

### Verify Storage Link
```bash
# Check if symlink exists
ls -la public/storage

# Should show: public/storage -> ../storage/app/public
```

## Model Accessors

All models use the `HasImageUrl` trait which provides:
- `featured_image_url` accessor (Media model)
- `photo_url` accessor (Bearer, Member models)
- `cover_image_url` accessor (Book model)

These automatically generate full URLs using `asset('storage/...')`.

## Troubleshooting

### Images Not Loading (403/404)
1. Verify storage symlink exists:
   ```bash
   php artisan storage:link
   ```

2. Check file permissions:
   ```bash
   ls -la storage/app/public/
   chmod -R 755 storage/app/public
   ```

3. Verify APP_URL in `.env`:
   ```env
   APP_URL=https://makkaljananayagakatchi.com
   ```

### Check Storage Configuration
```bash
# View storage configuration
php artisan tinker
config('filesystems.disks.public')
```

### Test Image Access
```bash
# In tinker
php artisan tinker
$media = App\Models\Media::first();
echo $media->featured_image_url;
```

## Migration from Old Structure

If you have existing images in the root of `storage/app/public/`, you may want to:
1. Move them to appropriate folders
2. Update database records if paths changed
3. Run `php artisan storage:link` to ensure symlink exists

## Production Deployment Checklist

- [ ] Run `php artisan storage:link`
- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Verify APP_URL in `.env` matches production domain
- [ ] Test image access on production
- [ ] Ensure web server has read access to storage files
- [ ] Check `.htaccess` allows access to storage directory (if using Apache)

