# Spatie Laravel PDF - Production Server Fix

## 🔴 Common Issue
Spatie Laravel PDF works locally but fails in production server.

---

## ✅ Complete Solution Checklist

### 1. Install Required System Dependencies

Spatie Laravel PDF uses **Chromium/Chrome** behind the scenes via Puppeteer. You need to install these on your production server:

#### For Ubuntu/Debian Server:
```bash
# Update package list
sudo apt-get update

# Install Chromium and dependencies
sudo apt-get install -y \
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
    libxshmfence1

# For some servers, you might need these too:
sudo apt-get install -y \
    fonts-liberation \
    xdg-utils \
    wget \
    ca-certificates
```

#### For CentOS/RHEL/AlmaLinux:
```bash
sudo yum install -y \
    chromium \
    chromium-headless \
    libX11 \
    libXcomposite \
    libXdamage \
    libXext \
    libXi \
    libXtst \
    cups-libs \
    libXScrnSaver \
    libXrandr \
    alsa-lib \
    pango \
    atk \
    at-spi2-atk \
    gtk3 \
    liberation-fonts
```

---

### 2. Install Node.js and Puppeteer

```bash
# Install Node.js if not installed (Ubuntu/Debian)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt-get install -y nodejs

# Navigate to your Laravel project
cd /path/to/your/laravel/project

# Install Puppeteer
npm install puppeteer

# Or if you prefer using npx
npm install -g puppeteer
```

---

### 3. Configure Chromium Path

Create/update config file for Laravel PDF:

**File**: `config/pdf.php`

```php
<?php

return [
    'default' => 'browsershot',

    'drivers' => [
        'browsershot' => [
            'chromium_path' => env('CHROMIUM_PATH', '/usr/bin/chromium-browser'),
            // For some systems it might be:
            // 'chromium_path' => '/usr/bin/chromium',
            // 'chromium_path' => '/usr/bin/google-chrome',

            'node_path' => env('NODE_PATH', '/usr/bin/node'),
            'npm_path' => env('NPM_PATH', '/usr/bin/npm'),
        ],
    ],
];
```

---

### 4. Update .env File (Production)

Add these to your production `.env`:

```env
# PDF Configuration
CHROMIUM_PATH=/usr/bin/chromium-browser
NODE_PATH=/usr/bin/node
NPM_PATH=/usr/bin/npm

# If using Google Chrome instead:
# CHROMIUM_PATH=/usr/bin/google-chrome
```

---

### 5. Set Proper Permissions

```bash
# Make sure storage directories are writable
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/

# If using a different user (like nginx):
# sudo chown -R nginx:nginx storage/

# Make sure temp directory is writable
sudo chmod -R 777 /tmp
```

---

### 6. Test Chromium Installation

Run this command on your production server:

```bash
# Test if Chromium is installed and working
chromium-browser --version
# OR
chromium --version
# OR
google-chrome --version

# Test headless mode
chromium-browser --headless --disable-gpu --dump-dom https://www.google.com
```

If this works, Chromium is installed correctly.

---

### 7. Update Your PDF Generation Code

Make your PDF generation more robust with error handling:

**Example**: `app/Http/Controllers/ApplicationPdfController.php`

```php
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;

public function downloadPdf($id)
{
    try {
        $application = Application::findOrFail($id);

        $pdf = Pdf::view('pdf.application', [
            'application' => $application,
        ])
        ->format('a4')
        ->margins(10, 10, 10, 10)
        ->timeout(120) // Increase timeout for slow servers
        ->noSandbox() // Important for some servers
        ->showBackground();

        return $pdf->download("application-{$id}.pdf");

    } catch (\Exception $e) {
        Log::error('PDF Generation Failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'application_id' => $id,
        ]);

        return back()->with('error', 'Failed to generate PDF. Please try again or contact support.');
    }
}
```

---

### 8. Add NoSandbox Option

For production servers, you often need to disable sandbox mode:

```php
$pdf = Pdf::view('pdf.application', $data)
    ->noSandbox()  // Add this
    ->showBackground();
```

---

### 9. Increase Timeouts

```php
$pdf = Pdf::view('pdf.application', $data)
    ->timeout(120) // 2 minutes timeout
    ->noSandbox()
    ->showBackground();
```

---

### 10. Check Storage Permissions

```bash
# On your production server
ls -la storage/
ls -la storage/framework/
ls -la storage/logs/

# All should be owned by web server user (www-data, nginx, etc.)
# and have 775 permissions
```

---

## 🔍 Troubleshooting Steps

### Step 1: Check Chromium Path

```bash
# Find where Chromium is installed
which chromium-browser
which chromium
which google-chrome

# Use the output in your .env CHROMIUM_PATH
```

### Step 2: Check Node Path

```bash
# Find Node.js location
which node
which npm

# Use in .env NODE_PATH and NPM_PATH
```

### Step 3: Test PDF Generation Manually

Create a test route:

**routes/web.php**:
```php
Route::get('/test-pdf', function () {
    try {
        $pdf = \Spatie\LaravelPdf\Facades\Pdf::view('pdf.test')
            ->noSandbox()
            ->timeout(120);

        return $pdf->download('test.pdf');
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
});
```

**resources/views/pdf/test.blade.php**:
```html
<!DOCTYPE html>
<html>
<head>
    <title>PDF Test</title>
</head>
<body>
    <h1>PDF Generation Test</h1>
    <p>If you see this, PDF generation is working!</p>
    <p>Date: {{ now() }}</p>
</body>
</html>
```

Visit: `https://your-domain.com/test-pdf`

### Step 4: Check Laravel Logs

```bash
# On production server
tail -100 storage/logs/laravel.log

# Look for PDF-related errors
grep -i "pdf\|chromium\|browsershot" storage/logs/laravel.log
```

### Step 5: Check System Logs

```bash
# Check system logs for Chromium errors
sudo tail -100 /var/log/syslog | grep -i chromium

# Check PHP-FPM logs
sudo tail -100 /var/log/php8.x-fpm.log
```

---

## 🚨 Common Errors & Solutions

### Error 1: "Chromium revision is not downloaded"

**Solution**:
```bash
cd /path/to/your/project
npm install puppeteer
# This will download Chromium automatically
```

### Error 2: "Could not find Chromium"

**Solution**:
```bash
# Install Chromium
sudo apt-get install -y chromium-browser

# Find the path
which chromium-browser

# Add to .env
CHROMIUM_PATH=/usr/bin/chromium-browser
```

### Error 3: "Failed to launch chrome"

**Solution**:
Add `noSandbox()` to your PDF generation:
```php
$pdf = Pdf::view('pdf.application', $data)
    ->noSandbox()  // Add this
    ->showBackground();
```

### Error 4: "Permission denied"

**Solution**:
```bash
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
sudo chmod 777 /tmp
```

### Error 5: "Timeout while waiting for page to load"

**Solution**:
```php
$pdf = Pdf::view('pdf.application', $data)
    ->timeout(180) // Increase to 3 minutes
    ->noSandbox()
    ->showBackground();
```

### Error 6: Missing fonts (Tamil text not showing)

**Solution**:
```bash
# Install Tamil fonts
sudo apt-get install -y fonts-lohit-taml fonts-tamil

# Or install all fonts
sudo apt-get install -y fonts-liberation fonts-indic
```

---

## 🎯 Production Deployment Checklist

- [ ] Chromium/Chrome installed on server
- [ ] Node.js installed on server
- [ ] Puppeteer installed (`npm install puppeteer`)
- [ ] System dependencies installed
- [ ] CHROMIUM_PATH set in .env
- [ ] NODE_PATH set in .env
- [ ] Storage permissions set (775)
- [ ] Tamil fonts installed (if using Tamil)
- [ ] noSandbox() added to PDF generation
- [ ] Timeout increased (120+ seconds)
- [ ] Error logging implemented
- [ ] Test PDF route working

---

## 📋 Quick Server Setup Script

Create this file on your production server:

**setup-pdf.sh**:
```bash
#!/bin/bash

echo "Installing Chromium and dependencies..."
sudo apt-get update
sudo apt-get install -y chromium-browser \
    libx11-xcb1 libxcomposite1 libxcursor1 libxdamage1 \
    libxi6 libxtst6 libnss3 libcups2 libxss1 libxrandr2 \
    libasound2 libpangocairo-1.0-0 libatk1.0-0 libatk-bridge2.0-0 \
    libgtk-3-0 libgbm1 fonts-liberation fonts-tamil

echo "Installing Node.js..."
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt-get install -y nodejs

echo "Installing Puppeteer..."
cd /var/www/your-project-path
npm install puppeteer

echo "Setting permissions..."
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/

echo "Finding Chromium path..."
which chromium-browser

echo "Setup complete! Add the Chromium path to your .env file."
```

Run it:
```bash
chmod +x setup-pdf.sh
sudo ./setup-pdf.sh
```

---

## 🔧 Alternative: Use dompdf Instead

If Spatie/Browsershot continues to have issues, consider using dompdf as an alternative:

**Install**:
```bash
composer require barryvdh/laravel-dompdf
```

**Usage**:
```php
use Barryvdh\DomPDF\Facade\Pdf;

$pdf = Pdf::loadView('pdf.application', $data);
return $pdf->download('application.pdf');
```

**Note**: dompdf has better server compatibility but less CSS support.

---

## 📞 Still Having Issues?

Check these:

1. **Server logs**: `tail -f storage/logs/laravel.log`
2. **PHP version**: Ensure PHP 8.1+ is installed
3. **Memory limit**: Increase in php.ini: `memory_limit = 512M`
4. **Max execution time**: Increase: `max_execution_time = 300`
5. **Firewall**: Ensure server can access external resources if needed

---

**Last Updated**: December 18, 2025
**For**: Spatie Laravel PDF v1.8+
**Server**: Ubuntu/Debian Production Servers
