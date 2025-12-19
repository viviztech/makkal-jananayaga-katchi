# Storage Permissions Guide

## Overview
All images in `storage/app/public` must have correct file permissions for public web access.

## Required Permissions

### Directories
- **Permission:** `755` (rwxr-xr-x)
- **Description:** Owner can read, write, execute; Group and Others can read and execute
- **Why:** Web server needs to read and traverse directories

### Files
- **Permission:** `644` (rw-r--r--)
- **Description:** Owner can read and write; Group and Others can only read
- **Why:** Web server needs to read files, but shouldn't be able to modify them

## Fixing Permissions

### Option 1: Artisan Command (Recommended)
```bash
# Check current permissions
php artisan storage:fix-permissions --check

# Fix all permissions
php artisan storage:fix-permissions
```

### Option 2: Shell Script
```bash
# Make script executable (first time only)
chmod +x fix-storage-permissions.sh

# Run the script
./fix-storage-permissions.sh
```

### Option 3: Manual Commands
```bash
# Fix directory permissions
find storage/app/public -type d -exec chmod 755 {} \;

# Fix file permissions
find storage/app/public -type f -exec chmod 644 {} \;

# Fix storage symlink
chmod 755 public/storage
```

## Production Server Setup

On production servers, you may also need to set ownership:

```bash
# For Apache/Nginx (common web server users)
sudo chown -R www-data:www-data storage/app/public
sudo chown -R www-data:www-data public/storage

# For PHP-FPM (if different user)
sudo chown -R php-fpm:php-fpm storage/app/public
sudo chown -R php-fpm:php-fpm public/storage

# Then fix permissions
find storage/app/public -type d -exec chmod 755 {} \;
find storage/app/public -type f -exec chmod 644 {} \;
chmod 755 public/storage
```

## Verification

### Check Permissions
```bash
# Check directory permissions
ls -ld storage/app/public/*/

# Check file permissions
ls -l storage/app/public/media/featured/

# Detailed check
php artisan storage:fix-permissions --check
```

### Expected Output
```
✅ All permissions are correct!
  Directories: X (all 755)
  Files: Y (all 644)
  ✅ Storage symlink exists
```

## Common Issues

### Issue: 403 Forbidden
**Cause:** Incorrect file or directory permissions
**Fix:**
```bash
php artisan storage:fix-permissions
```

### Issue: 500 Server Error
**Cause:** Web server can't access files
**Fix:**
```bash
# Check ownership
ls -la storage/app/public

# Fix ownership (adjust user as needed)
sudo chown -R www-data:www-data storage/app/public
php artisan storage:fix-permissions
```

### Issue: Images Not Loading
**Cause:** Storage symlink missing or broken
**Fix:**
```bash
# Remove old symlink if exists
rm public/storage

# Create new symlink
php artisan storage:link

# Verify
ls -la public/storage
```

## Automatic Fix on Deployment

### Add to Deployment Script
```bash
# In your deployment script
php artisan storage:link
php artisan storage:fix-permissions
```

### Add to Composer Scripts (optional)
In `composer.json`:
```json
{
    "scripts": {
        "post-install-cmd": [
            "@php artisan storage:link",
            "@php artisan storage:fix-permissions"
        ]
    }
}
```

## Permission Reference

| Type | Octal | Symbolic | Description |
|------|-------|----------|-------------|
| Directory | 755 | rwxr-xr-x | Readable, writable, executable by owner; readable, executable by others |
| File | 644 | rw-r--r-- | Readable, writable by owner; readable by others |
| Symlink | 755 | rwxr-xr-x | Same as directory |

## Security Notes

- Files should NEVER be executable (755) unless necessary
- Directories must be executable (755) for web server to traverse
- Never use 777 permissions (security risk)
- Always set proper ownership on production servers

