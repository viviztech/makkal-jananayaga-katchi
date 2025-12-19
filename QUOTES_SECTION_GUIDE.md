# Quotes Section - Implementation Guide

## Overview
The "Amaippai Thiralvom" section on the home page is now dynamic and pulls quotes from the Media table in the database.

## Database Structure

### Category
- A new category "Quotes" has been added to the `categories` table
- **Category ID**: 12
- **Tamil Name**: மேற்கோள்கள்
- **English Name**: Quotes

### Media Table Fields Used
For each quote entry in the Media table with `category_id = 12`:

| Field | Purpose | Example |
|-------|---------|---------|
| `title_ta` | Quote text in Tamil | முதன்மை முரண்களை அடையாளம் காண்போம்! |
| `title_en` | Quote text in English | Let's identify the primary contradictions! |
| `content_ta` | Author/attribution in Tamil | எழுச்சித்தமிழர் தோழர். திருமாவளவன் |
| `content_en` | Author/attribution in English | Ezhuchithamizhar Thol. Thirumavalavan |
| `event_date` | Date of the quote | 2023-03-15 |
| `category_id` | Must be set to 12 (Quotes) | 12 |

## How to Add Quotes

### Option 1: Using Filament Admin Panel
1. Log in to the admin panel
2. Navigate to Media section
3. Create a new Media entry
4. Select "Quotes" (மேற்கோள்கள்) as the Category
5. Fill in:
   - **Title (Tamil)**: The quote text in Tamil
   - **Title (English)**: The quote text in English
   - **Content (Tamil)**: The author/source in Tamil
   - **Content (English)**: The author/source in English
   - **Event Date**: The date of the quote
6. Save the entry

### Option 2: Using Database Directly
```sql
INSERT INTO media (category_id, title_ta, title_en, content_ta, content_en, event_date, created_at, updated_at)
VALUES (
    12,
    'முதன்மை முரண்களை அடையாளம் காண்போம்!',
    'Let us identify the primary contradictions!',
    'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
    'Ezhuchithamizhar Thol. Thirumavalavan',
    '2023-03-15',
    NOW(),
    NOW()
);
```

## Features Implemented

### 1. Dynamic Display
- The section displays the **latest 5 quotes** from the database
- First quote is shown in the main quote area (left side)
- Next 4 quotes are shown as cards below
- Supports both Tamil and English (switches based on current locale)

### 2. Click Functionality
When a user clicks on any quote card:
- The clicked quote smoothly replaces the main quote at the top
- The page scrolls to show the quote section
- Visual feedback with smooth animations
- Hover effects on quote cards

### 3. Fallback
- If no quotes are found in the database, the section displays the original static content from the translation files

## Code Changes Made

### 1. Database Seeder
**File**: `database/seeders/QuotesCategorySeeder.php`
- Creates the "Quotes" category

### 2. Controller
**File**: `app/Http/Controllers/PageController.php` (Lines 139-145)
```php
// Fetch Quotes (category_id 12) - last 5 quotes
$quotes = Media::select($selectFields)
    ->with('category:id,name_ta,name_en')
    ->orderBy('event_date', 'desc')
    ->where('category_id', 12)
    ->take(5)
    ->get();
```

### 3. View Template
**File**: `resources/views/pages/home.blade.php` (Lines 1457-1529)
- Replaced static content with dynamic Blade template
- Added data attributes for JavaScript interaction
- Implemented fallback for when no quotes exist

### 4. JavaScript
**File**: `resources/views/pages/home.blade.php` (Lines 2890-2949)
- Click event handlers for quote cards
- Smooth animations and transitions
- Scroll functionality
- Visual feedback effects

## Testing

### To test the implementation:

1. **Add test quotes**:
```bash
php artisan tinker
```

Then in tinker:
```php
use App\Models\Media;
use App\Models\Category;

$quotesCategory = Category::where('name_en', 'Quotes')->first();

// Add sample quotes
Media::create([
    'category_id' => $quotesCategory->id,
    'title_ta' => 'அமைப்பைத் திறள்வோம்! அங்கீகாரம் பெறுவோம்! அதிகாரம் வெல்வோம்!',
    'title_en' => 'We will organize! We will gain recognition! We will win power!',
    'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
    'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
    'event_date' => '2023-03-15',
]);

Media::create([
    'category_id' => $quotesCategory->id,
    'title_ta' => 'விடுதலை கிடைக்காது, போராடி பிடிக்க வேண்டும்!',
    'title_en' => 'Liberation is not given, it must be fought for and won!',
    'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
    'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
    'event_date' => '2023-03-14',
]);
```

2. **Clear cache**:
```bash
php artisan cache:clear
php artisan view:clear
```

3. **Visit the home page** and verify:
   - Quotes display correctly in both Tamil and English
   - Clicking on a quote card updates the main quote
   - Smooth animations work properly
   - Page scrolls to the quote section when clicked

## Maintenance

### To update the number of quotes displayed:
Edit `app/Http/Controllers/PageController.php` line 144:
```php
->take(5)  // Change this number to display more/fewer quotes
```

### To change the quote card display limit:
Edit `resources/views/pages/home.blade.php` line 1488:
```php
@foreach($quotes->take(4) as $index => $quote)  // Change to show more/fewer cards
```

## Notes
- The section will automatically show content based on the current language (Tamil/English)
- Quotes are sorted by `event_date` in descending order (newest first)
- The cache is set for 5 minutes, so new quotes may take up to 5 minutes to appear
- To force immediate display of new quotes, clear the cache

## Cache Management
The home page data is cached for 5 minutes. To clear:
```bash
php artisan cache:clear
```

Or in code (PageController line 43):
```php
cache()->remember($cacheKey, 300, function () {  // 300 seconds = 5 minutes
```
