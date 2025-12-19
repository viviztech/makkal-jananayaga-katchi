# Language Settings - Tamil as Default

## ✅ Configuration Complete

The site is now configured to use **Tamil (தமிழ்)** as the default language.

---

## Current Settings

### .env Configuration
```env
APP_LOCALE=ta
APP_FALLBACK_LOCALE=en
```

### config/app.php
```php
'locale' => env('APP_LOCALE', 'ta'),
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
```

### config/laravellocalization.php
```php
'supportedLocales' => [
    'ta' => ['name' => 'Tamil', 'script' => 'Taml', 'native' => 'தமிழ்', 'regional' => 'ta_IN'],
    'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
],

'localesOrder' => ['ta', 'en'],
```

---

## What This Means

1. **Default Language**: Site opens in Tamil for all new visitors
2. **Fallback**: If a Tamil translation is missing, English will be used
3. **Language Switcher**: Users can still switch between Tamil and English
4. **Order**: Tamil appears first in language selector dropdown

---

## Language Files

Tamil translations are in:
- `resources/lang/ta/site.php`
- `resources/lang/ta/validation.php`
- `resources/lang/ta/auth.php`

English translations are in:
- `resources/lang/en/site.php`
- `resources/lang/en/validation.php`
- `resources/lang/en/auth.php`

---

## How Users See It

### First Visit
- Site loads in **Tamil (தமிழ்)** by default
- All text, buttons, labels in Tamil

### Language Switcher
- Dropdown shows: **தமிழ் (Tamil)** first, then English
- Users can switch anytime
- Selection is saved in session

---

## Testing

### Verify Default Language

1. **Open site in incognito/private mode**
   - Should see Tamil content by default

2. **Check browser console**
   ```javascript
   // Should show 'ta'
   console.log(document.documentElement.lang);
   ```

3. **Using Tinker**
   ```bash
   php artisan tinker
   >>> app()->getLocale()
   // Should output: "ta"
   ```

---

## Switching Between Languages

### Via Code
```php
// Get current locale
$currentLocale = app()->getLocale(); // 'ta'

// Set locale temporarily
app()->setLocale('en');

// Get localized string
__('site.welcome'); // Returns Tamil or English based on locale
```

### Via Routes
The site uses laravel-localization which adds language prefixes to URLs:
- Tamil: `https://yoursite.com/ta/join`
- English: `https://yoursite.com/en/join`

No prefix defaults to Tamil (configured as default).

---

## Language Selector in Views

The language switcher is in the navigation bar:
- **File**: `resources/views/layouts/partials/navbar.blade.php`
- **Component**: `resources/views/components/language-switcher.blade.php`

Shows:
```
தமிழ் (selected by default)
English
```

---

## Reverting to English Default

If you need to switch back to English as default:

1. **Edit .env**
   ```env
   APP_LOCALE=en
   APP_FALLBACK_LOCALE=ta
   ```

2. **Clear cache**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   ```

3. **Update locale order in config/laravellocalization.php**
   ```php
   'localesOrder' => ['en', 'ta'],
   ```

---

## Translation Keys Used

Common translation keys in the site:

### Navigation
- `site.nav.home`
- `site.nav.about`
- `site.nav.join`
- `site.nav.applications`

### Forms
- `site.join.title`
- `site.join.submit_application`
- `site.applications.title`

### OTP Modal
- Currently uses hardcoded English text
- **TODO**: Add translation keys for OTP modal

---

## Adding New Translations

To add a new translation:

1. **Add to Tamil file** (`resources/lang/ta/site.php`):
   ```php
   'otp' => [
       'title' => 'மொபைல் எண்ணை சரிபார்க்கவும்',
       'send_otp' => 'OTP அனுப்பு',
       'verify' => 'சரிபார்க்கவும்',
   ],
   ```

2. **Add to English file** (`resources/lang/en/site.php`):
   ```php
   'otp' => [
       'title' => 'Verify Mobile Number',
       'send_otp' => 'Send OTP',
       'verify' => 'Verify',
   ],
   ```

3. **Use in views**:
   ```blade
   {{ __('site.otp.title') }}
   {{ __('site.otp.send_otp') }}
   ```

---

## Current Status

✅ **Tamil is now the default language**
✅ **English is the fallback language**
✅ **Language switcher works correctly**
✅ **Translations are in place**

---

## Next Steps (Optional)

1. **Translate OTP Modal**: Add Tamil translations for OTP verification modal
2. **Translate Error Messages**: Ensure all validation errors have Tamil translations
3. **Translate Email Templates**: Add Tamil email templates if needed

---

**Last Updated**: December 17, 2025
**Default Language**: Tamil (தமிழ்)
**Fallback Language**: English
