# 🚀 Quick PDF Fix - Production Server

## ⚡ Fastest Solution (3 Steps)

### 1️⃣ Run Setup Script on Server

```bash
# Upload setup-pdf-production.sh to your server
# Then run:
chmod +x setup-pdf-production.sh
sudo ./setup-pdf-production.sh
```

This installs everything automatically! ✅

---

### 2️⃣ Add These Two Lines to Your PDF Code

In `app/Http/Controllers/ApplicationPdfController.php` and `app/Http/Controllers/MemberIdCardController.php`:

```php
$pdf = Pdf::view('pdf.application', $data)
    ->noSandbox()      // ← ADD THIS
    ->timeout(120)     // ← AND THIS
    ->showBackground();
```

**Full example**:
```php
public function downloadPdf($id)
{
    $application = Application::findOrFail($id);

    $pdf = Pdf::view('pdf.application', ['application' => $application])
        ->noSandbox()      // Required for production servers
        ->timeout(120)     // Increase timeout to 2 minutes
        ->showBackground()
        ->format('a4')
        ->margins(10, 10, 10, 10);

    return $pdf->download("application-{$id}.pdf");
}
```

---

### 3️⃣ Verify & Test

```bash
# SSH into your server
cd /path/to/your/project

# Clear cache
php artisan config:clear
php artisan cache:clear

# Check if Chromium is installed
chromium-browser --version
```

Then test in browser: `https://your-domain.com/applications/{id}/pdf`

---

## 🔥 If Still Not Working

### Quick Diagnostic Commands

Run these on your production server:

```bash
# 1. Check Chromium
which chromium-browser
chromium-browser --version

# 2. Check Node
which node
node --version

# 3. Check storage permissions
ls -la storage/

# 4. Check Laravel logs
tail -50 storage/logs/laravel.log
```

---

## 💊 Common Quick Fixes

### Fix 1: Missing Chromium
```bash
sudo apt-get update
sudo apt-get install -y chromium-browser
```

### Fix 2: Permission Denied
```bash
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
```

### Fix 3: Tamil Fonts Not Showing
```bash
sudo apt-get install -y fonts-tamil fonts-lohit-taml
```

### Fix 4: Timeout Error
Increase timeout in your code:
```php
->timeout(180)  // 3 minutes
```

---

## 📋 Essential .env Settings

Add these to your production `.env`:

```env
CHROMIUM_PATH=/usr/bin/chromium-browser
NODE_PATH=/usr/bin/node
NPM_PATH=/usr/bin/npm
```

Find correct paths:
```bash
which chromium-browser  # Use this output for CHROMIUM_PATH
which node              # Use this output for NODE_PATH
which npm               # Use this output for NPM_PATH
```

---

## 🎯 Updated Controller Code

**ApplicationPdfController.php**:
```php
<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;

class ApplicationPdfController extends Controller
{
    public function download($id)
    {
        try {
            $application = Application::findOrFail($id);

            $pdf = Pdf::view('pdf.application', [
                'application' => $application,
            ])
            ->noSandbox()          // Essential for production
            ->timeout(120)         // 2 minute timeout
            ->showBackground()
            ->format('a4')
            ->margins(10, 10, 10, 10);

            return $pdf->download("application-{$application->id}.pdf");

        } catch (\Exception $e) {
            Log::error('PDF Generation Failed', [
                'error' => $e->getMessage(),
                'application_id' => $id,
            ]);

            return back()->with('error', 'Failed to generate PDF. Please contact support.');
        }
    }
}
```

**MemberIdCardController.php**:
```php
public function download($id, $type = 'full')
{
    try {
        $member = Member::findOrFail($id);

        $view = match($type) {
            'front' => 'pdf.member-id-card-front',
            'back' => 'pdf.member-id-card-back',
            default => 'pdf.member-id-card-full',
        };

        $pdf = Pdf::view($view, ['member' => $member])
            ->noSandbox()          // Essential for production
            ->timeout(120)         // 2 minute timeout
            ->showBackground()
            ->format('a4');

        return $pdf->download("member-card-{$member->id}.pdf");

    } catch (\Exception $e) {
        Log::error('Member Card PDF Failed', [
            'error' => $e->getMessage(),
            'member_id' => $id,
        ]);

        return back()->with('error', 'Failed to generate member card.');
    }
}
```

---

## 🧪 Test PDF Generation

Create a test route (temporary):

**routes/web.php**:
```php
Route::get('/test-pdf', function () {
    return \Spatie\LaravelPdf\Facades\Pdf::view('pdf.test')
        ->noSandbox()
        ->timeout(120)
        ->inline('test.pdf');
});
```

**resources/views/pdf/test.blade.php**:
```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDF Test</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #2563eb; }
    </style>
</head>
<body>
    <h1>✅ PDF Generation Working!</h1>
    <p>Server: {{ gethostname() }}</p>
    <p>Date: {{ now() }}</p>
    <p>Tamil Test: தமிழ்</p>
</body>
</html>
```

Visit: `https://your-domain.com/test-pdf`

---

## 📞 Still Having Issues?

### Check These:

1. **Logs**: `tail -100 storage/logs/laravel.log | grep -i pdf`
2. **Permissions**: `ls -la storage/`
3. **Chromium**: `chromium-browser --headless --dump-dom https://google.com`
4. **Memory**: Increase PHP memory in `php.ini`: `memory_limit = 512M`

### Get Help:

- Check: [PDF_PRODUCTION_FIX.md](PDF_PRODUCTION_FIX.md) - Detailed guide
- Logs location: `storage/logs/laravel.log`
- System logs: `/var/log/syslog` or `/var/log/messages`

---

**Quick Summary**:
1. ✅ Run `setup-pdf-production.sh`
2. ✅ Add `->noSandbox()->timeout(120)` to PDF code
3. ✅ Test with `/test-pdf` route

**Most common fix**: Just add `->noSandbox()` to your PDF generation! 🎯
