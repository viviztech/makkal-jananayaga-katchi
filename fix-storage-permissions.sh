#!/bin/bash

# Fix Storage Permissions Script
# This script ensures all files and directories in storage/app/public have correct permissions for public access

echo "🔧 Fixing storage permissions for public access..."

# Storage paths
STORAGE_PATH="storage/app/public"
PUBLIC_STORAGE="public/storage"

# Check if storage directory exists
if [ ! -d "$STORAGE_PATH" ]; then
    echo "❌ Error: $STORAGE_PATH does not exist!"
    exit 1
fi

# Fix directory permissions (755 - readable and executable by all, writable by owner)
echo "📁 Fixing directory permissions (755)..."
find "$STORAGE_PATH" -type d -exec chmod 755 {} \;
echo "✅ Directory permissions fixed"

# Fix file permissions (644 - readable by all, writable by owner)
echo "📄 Fixing file permissions (644)..."
find "$STORAGE_PATH" -type f -exec chmod 644 {} \;
echo "✅ File permissions fixed"

# Check storage symlink
if [ -L "$PUBLIC_STORAGE" ]; then
    echo "✅ Storage symlink exists: $PUBLIC_STORAGE"
    chmod 755 "$PUBLIC_STORAGE"
else
    echo "⚠️  Storage symlink not found. Creating..."
    php artisan storage:link
fi

# Summary
echo ""
echo "📊 Permission Summary:"
echo "  Directories: $(find "$STORAGE_PATH" -type d | wc -l | tr -d ' ') (755)"
echo "  Files: $(find "$STORAGE_PATH" -type f | wc -l | tr -d ' ') (644)"
echo ""
echo "✅ Storage permissions fixed successfully!"
echo ""
echo "💡 On production servers, you may also need to set ownership:"
echo "   sudo chown -R www-data:www-data $STORAGE_PATH"
echo "   sudo chown -R www-data:www-data $PUBLIC_STORAGE"

