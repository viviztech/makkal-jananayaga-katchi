# Fixing 500 Server Error

## Quick Fix Steps

### 1. Clear All Caches
Run these commands on your VPS server:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
```

### 2. Fix Autoloading Issue
The new trait might not be autoloaded. Run:

```bash
composer dump-autoload -o
```

### 3. Check Error Logs
View the actual error:

```bash
# Laravel log
tail -f storage/logs/laravel.log

# Or PHP error log
tail -f /var/log/php-fpm/error.log
# or
tail -f /var/log/nginx/error.log
```

### 4. Verify Trait File Exists
Make sure the trait file exists:

```bash
ls -la app/Models/Traits/HasImageUrl.php
```

### 5. Fix Permissions
```bash
chmod -R 755 app/Models
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## Common Causes

1. **Autoloading Issue**: The trait file isn't being autoloaded
2. **Missing Placeholder Image**: The `images/placeholder.jpg` might not exist
3. **PHP Version**: Ensure PHP 8.3+ is running
4. **File Permissions**: Web server can't read model files

## Temporary Workaround

If the error persists, you can temporarily remove the `$appends` array from models:

In `app/Models/Media.php`, comment out:
```php
// protected $appends = [
//     'featured_image_url',
// ];
```

And use in views: `{{ $media->featured_image_url ?? '' }}`

## Verify Fix

After applying fixes, test:
```bash
php artisan tinker
$media = App\Models\Media::first();
echo $media->featured_image_url;
```

If this works, the model is fine. If not, check the error message.

