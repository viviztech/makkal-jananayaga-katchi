#!/bin/bash

# Spatie Laravel PDF - Production Server Setup Script
# This script installs all dependencies needed for PDF generation

set -e  # Exit on error

echo "=========================================="
echo "Spatie Laravel PDF - Production Setup"
echo "=========================================="
echo ""

# Detect OS
if [ -f /etc/os-release ]; then
    . /etc/os-release
    OS=$ID
else
    echo "Cannot detect OS. Please install manually."
    exit 1
fi

echo "Detected OS: $OS"
echo ""

# Update package list
echo "📦 Updating package list..."
if [ "$OS" = "ubuntu" ] || [ "$OS" = "debian" ]; then
    sudo apt-get update -qq
elif [ "$OS" = "centos" ] || [ "$OS" = "rhel" ] || [ "$OS" = "almalinux" ]; then
    sudo yum update -y -q
fi

echo "✅ Package list updated"
echo ""

# Install Chromium and dependencies
echo "🌐 Installing Chromium and dependencies..."
if [ "$OS" = "ubuntu" ] || [ "$OS" = "debian" ]; then
    sudo apt-get install -y -qq \
        chromium-browser \
        libx11-xcb1 \
        libxcomposite1 \
        libxcursor1 \
        libxdamage1 \
        libxi6 \
        libxtst6 \
        libnss3 \
        libcups2 \
        libxss1 \
        libxrandr2 \
        libasound2 \
        libpangocairo-1.0-0 \
        libatk1.0-0 \
        libatk-bridge2.0-0 \
        libgtk-3-0 \
        libgbm1 \
        libxshmfence1 \
        fonts-liberation \
        fonts-tamil \
        fonts-lohit-taml \
        xdg-utils \
        wget \
        ca-certificates

    CHROMIUM_PATH="/usr/bin/chromium-browser"

elif [ "$OS" = "centos" ] || [ "$OS" = "rhel" ] || [ "$OS" = "almalinux" ]; then
    sudo yum install -y -q \
        chromium \
        chromium-headless \
        liberation-fonts

    CHROMIUM_PATH="/usr/bin/chromium"
fi

echo "✅ Chromium installed"
echo ""

# Verify Chromium installation
echo "🔍 Verifying Chromium installation..."
if [ -f "$CHROMIUM_PATH" ]; then
    echo "✅ Chromium found at: $CHROMIUM_PATH"
    $CHROMIUM_PATH --version
else
    echo "⚠️  Chromium not found at expected path. Searching..."
    CHROMIUM_PATH=$(which chromium-browser || which chromium || which google-chrome || echo "")
    if [ -n "$CHROMIUM_PATH" ]; then
        echo "✅ Chromium found at: $CHROMIUM_PATH"
    else
        echo "❌ Chromium not found! Please install manually."
        exit 1
    fi
fi
echo ""

# Install Node.js
echo "📦 Checking Node.js installation..."
if command -v node &> /dev/null; then
    NODE_VERSION=$(node -v)
    echo "✅ Node.js already installed: $NODE_VERSION"
    NODE_PATH=$(which node)
else
    echo "📥 Installing Node.js..."
    if [ "$OS" = "ubuntu" ] || [ "$OS" = "debian" ]; then
        curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
        sudo apt-get install -y nodejs
    elif [ "$OS" = "centos" ] || [ "$OS" = "rhel" ] || [ "$OS" = "almalinux" ]; then
        curl -fsSL https://rpm.nodesource.com/setup_20.x | sudo bash -
        sudo yum install -y nodejs
    fi
    echo "✅ Node.js installed"
    NODE_PATH=$(which node)
fi

NPM_PATH=$(which npm)
echo "Node path: $NODE_PATH"
echo "NPM path: $NPM_PATH"
echo ""

# Get project directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
PROJECT_DIR="$SCRIPT_DIR"

echo "📂 Project directory: $PROJECT_DIR"
echo ""

# Install Puppeteer
echo "🎭 Installing Puppeteer..."
cd "$PROJECT_DIR"

if [ -f "package.json" ]; then
    npm install puppeteer
else
    echo "Creating package.json and installing Puppeteer..."
    npm init -y
    npm install puppeteer
fi

echo "✅ Puppeteer installed"
echo ""

# Set permissions
echo "🔐 Setting storage permissions..."
if [ -d "storage" ]; then
    # Detect web server user
    if id "www-data" &>/dev/null; then
        WEB_USER="www-data"
    elif id "nginx" &>/dev/null; then
        WEB_USER="nginx"
    elif id "apache" &>/dev/null; then
        WEB_USER="apache"
    else
        WEB_USER=$(whoami)
        echo "⚠️  Could not detect web server user, using current user: $WEB_USER"
    fi

    echo "Setting ownership to: $WEB_USER"
    sudo chown -R $WEB_USER:$WEB_USER storage/
    sudo chmod -R 775 storage/
    echo "✅ Storage permissions set"
else
    echo "⚠️  Storage directory not found"
fi
echo ""

# Create/update .env entries
echo "📝 Updating environment configuration..."

ENV_FILE="$PROJECT_DIR/.env"

if [ -f "$ENV_FILE" ]; then
    # Backup .env
    cp "$ENV_FILE" "$ENV_FILE.backup.$(date +%Y%m%d_%H%M%S)"
    echo "✅ .env backed up"

    # Check if entries exist, if not add them
    if ! grep -q "CHROMIUM_PATH=" "$ENV_FILE"; then
        echo "" >> "$ENV_FILE"
        echo "# PDF Configuration" >> "$ENV_FILE"
        echo "CHROMIUM_PATH=$CHROMIUM_PATH" >> "$ENV_FILE"
        echo "NODE_PATH=$NODE_PATH" >> "$ENV_FILE"
        echo "NPM_PATH=$NPM_PATH" >> "$ENV_FILE"
        echo "✅ Added PDF configuration to .env"
    else
        echo "ℹ️  PDF configuration already exists in .env"
        echo "   Chromium path: $CHROMIUM_PATH"
        echo "   Node path: $NODE_PATH"
        echo "   NPM path: $NPM_PATH"
    fi
else
    echo "⚠️  .env file not found at: $ENV_FILE"
fi
echo ""

# Clear Laravel caches
echo "🗑️  Clearing Laravel caches..."
if [ -f "artisan" ]; then
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    echo "✅ Caches cleared"
else
    echo "⚠️  artisan file not found, skipping cache clear"
fi
echo ""

# Test Chromium
echo "🧪 Testing Chromium..."
if $CHROMIUM_PATH --version; then
    echo "✅ Chromium is working"
else
    echo "❌ Chromium test failed"
fi
echo ""

# Summary
echo "=========================================="
echo "✅ Setup Complete!"
echo "=========================================="
echo ""
echo "Configuration:"
echo "  Chromium: $CHROMIUM_PATH"
echo "  Node.js: $NODE_PATH"
echo "  NPM: $NPM_PATH"
echo ""
echo "Next Steps:"
echo "1. Verify .env has correct paths:"
echo "   CHROMIUM_PATH=$CHROMIUM_PATH"
echo "   NODE_PATH=$NODE_PATH"
echo "   NPM_PATH=$NPM_PATH"
echo ""
echo "2. Update your PDF generation code to use:"
echo "   ->noSandbox()"
echo "   ->timeout(120)"
echo ""
echo "3. Test PDF generation:"
echo "   Visit: https://your-domain.com/test-pdf"
echo ""
echo "4. Check logs if issues occur:"
echo "   tail -f storage/logs/laravel.log"
echo ""
echo "📚 For detailed troubleshooting, see: PDF_PRODUCTION_FIX.md"
echo ""
