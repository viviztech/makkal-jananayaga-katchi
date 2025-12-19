# Filament Admin Panel - Production Configuration Guide

## Common Production Issues & Solutions

### 1. Login Page Not Working - Most Common Causes

#### Issue: Session/Cookie Configuration
**Problem**: Cookies not being set correctly in production (HTTPS vs HTTP)

**Solution**: Update your `.env` file with these settings:

```env
# Application URL (MUST match your actual domain)
APP_URL=https://yourdomain.com
APP_ENV=production
APP_DEBUG=false

# Session Configuration (CRITICAL for Filament)
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
SESSION_HTTP_ONLY=true
SESSION_DOMAIN=yourdomain.com

# Cookie Configuration
COOKIE_DOMAIN=yourdomain.com
```

#### Issue: Database Session Table Missing
**Problem**: If using `SESSION_DRIVER=database`, the sessions table must exist

**Solution**: Run this command:
```bash
php artisan session:table
php artisan migrate
```

#### Issue: Route Caching Conflicts
**Problem**: Cached routes may conflict with Filament's dynamic routes

**Solution**: Clear and rebuild routes:
```bash
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

#### Issue: Asset URL Problems
**Problem**: Filament assets not loading correctly

**Solution**: Ensure `ASSET_URL` is set:
```env
ASSET_URL=https://yourdomain.com
```

### 2. Environment Variables Checklist

Add these to your production `.env` file:

```env
# Application
APP_NAME="VCK"
APP_ENV=production
APP_KEY=base64:your-generated-key-here
APP_DEBUG=false
APP_URL=https://yourdomain.com
ASSET_URL=https://yourdomain.com

# Session (CRITICAL for Filament)
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
SESSION_HTTP_ONLY=true
SESSION_DOMAIN=yourdomain.com

# Cookie
COOKIE_DOMAIN=yourdomain.com

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Cache (Recommended for production)
CACHE_DRIVER=file
QUEUE_CONNECTION=database
```

### 3. Post-Deployment Commands

Run these commands after deployment:

```bash
# Clear all caches
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

# Rebuild caches (optional, for performance)
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure sessions table exists
php artisan migrate

# Create storage symlink
php artisan storage:link

# Optimize
php artisan optimize
```

### 4. Verify Filament Routes

Check if Filament routes are registered:

```bash
php artisan route:list | grep admin
```

You should see routes like:
- `/admin/login`
- `/admin`
- `/admin/logout`

### 5. Check User Model

Ensure your User model is properly configured:

```php
// app/Models/User.php
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    public function canAccessPanel(Panel $panel): bool
    {
        // Add your access logic here
        return true; // or check user role/email
    }
}
```

### 6. Common Error Messages & Fixes

#### "419 Page Expired" or CSRF Token Mismatch
```bash
# Clear session and cache
php artisan config:clear
php artisan cache:clear
php artisan session:clear
```

#### "Route [admin.login] not defined"
```bash
# Clear route cache
php artisan route:clear
php artisan config:clear
```

#### "Class 'Filament\Panel' not found"
```bash
# Reinstall Filament assets
php artisan filament:install --panels
```

#### Assets Not Loading (404 errors)
```bash
# Publish Filament assets
php artisan filament:assets
php artisan storage:link
```

### 7. Production Server Configuration

#### Apache (.htaccess)
Ensure your `public/.htaccess` is correct and mod_rewrite is enabled.

#### Nginx
Add to your Nginx config:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location /admin {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### 8. Testing the Login

1. Visit: `https://yourdomain.com/admin/login`
2. Check browser console for errors
3. Check server logs: `storage/logs/laravel.log`
4. Verify database connection
5. Check session table exists and is writable

### 9. Debug Mode (Temporary)

If still having issues, temporarily enable debug:

```env
APP_DEBUG=true
```

Check the error page for specific issues, then disable again.

### 10. Quick Fix Script

Run this complete fix script:

```bash
#!/bin/bash
# Filament Production Fix Script

echo "Clearing all caches..."
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

echo "Running migrations..."
php artisan migrate --force

echo "Publishing Filament assets..."
php artisan filament:assets

echo "Creating storage link..."
php artisan storage:link

echo "Optimizing..."
php artisan optimize

echo "Done! Try accessing /admin/login now"
```

## Still Not Working?

1. **Check Laravel Logs**: `storage/logs/laravel.log`
2. **Check Browser Console**: F12 → Console tab
3. **Check Network Tab**: F12 → Network tab, look for failed requests
4. **Verify Database**: Ensure database connection works
5. **Check Permissions**: `storage/` and `bootstrap/cache/` should be writable (755)

