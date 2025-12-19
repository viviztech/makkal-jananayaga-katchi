#!/bin/bash

# Filament Production Fix Script
# Run this script to fix common Filament login issues in production

echo "🔧 Fixing Filament Admin Panel for Production..."
echo ""

# Clear all caches
echo "1️⃣ Clearing all caches..."
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear
echo "✅ Caches cleared"
echo ""

# Run migrations (ensure sessions table exists)
echo "2️⃣ Running migrations..."
php artisan migrate --force
echo "✅ Migrations completed"
echo ""

# Publish Filament assets
echo "3️⃣ Publishing Filament assets..."
php artisan filament:assets
echo "✅ Assets published"
echo ""

# Create storage symlink
echo "4️⃣ Creating storage symlink..."
php artisan storage:link
echo "✅ Storage link created"
echo ""

# Set proper permissions
echo "5️⃣ Setting permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || echo "⚠️  Could not change ownership (may need sudo)"
echo "✅ Permissions set"
echo ""

# Optimize for production
echo "6️⃣ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
echo "✅ Optimization completed"
echo ""

echo "✨ Done! Filament should now work in production."
echo ""
echo "📋 Next steps:"
echo "   1. Verify .env file has correct settings (see FILAMENT_PRODUCTION_CONFIG.md)"
echo "   2. Visit: https://yourdomain.com/admin/login"
echo "   3. Check logs if issues persist: storage/logs/laravel.log"
echo ""

