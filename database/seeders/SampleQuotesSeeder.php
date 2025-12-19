<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Support\Str;

class SampleQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the Quotes category
        $quotesCategory = Category::where('name_en', 'Quotes')->first();

        if (!$quotesCategory) {
            $this->command->error('Quotes category not found. Please run QuotesCategorySeeder first.');
            return;
        }

        $quotes = [
            [
                'title_ta' => 'அமைப்பைத் திறள்வோம்! அங்கீகாரம் பெறுவோம்! அதிகாரம் வெல்வோம்!',
                'title_en' => 'We will organize! We will gain recognition! We will win power!',
                'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
                'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
                'event_date' => '2023-03-15',
            ],
            [
                'title_ta' => 'விடுதலை கிடைக்காது, போராடி பிடிக்க வேண்டும்!',
                'title_en' => 'Liberation is not given, it must be fought for and won!',
                'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
                'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
                'event_date' => '2023-03-14',
            ],
            [
                'title_ta' => 'முதன்மை முரண்களை அடையாளம் காண்போம்! அவை மூலமாய்த் தோழமை சக்திகளை அறிவோம்!',
                'title_en' => 'Let us identify the primary contradictions! Let us know the friendly forces through them!',
                'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
                'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
                'event_date' => '2023-03-12',
            ],
            [
                'title_ta' => 'முதன்மை அடிப்படை முரண்களை அறிவோம்! அவை மூலமாய்த் சனநாயக சக்திகளைத் தெரிவோம்!',
                'title_en' => 'Let us understand the basic contradictions! Let us identify democratic forces through them!',
                'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
                'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
                'event_date' => '2023-03-11',
            ],
            [
                'title_ta' => 'சாதி ஒழிப்பே மக்கள் விடுதலை!',
                'title_en' => 'Annihilation of caste is people\'s liberation!',
                'content_ta' => 'எழுச்சித்தமிழர் தோழர். திருமாவளவன்',
                'content_en' => 'Ezhuchithamizhar Thol. Thirumavalavan',
                'event_date' => '2023-03-10',
            ],
        ];

        foreach ($quotes as $quoteData) {
            // Check if quote already exists
            $exists = Media::where('category_id', $quotesCategory->id)
                ->where('title_en', $quoteData['title_en'])
                ->exists();

            if (!$exists) {
                // Generate unique slug from title_en
                $baseSlug = Str::slug($quoteData['title_en']);
                $slug = $baseSlug;
                $counter = 1;

                // Ensure slug is unique
                while (Media::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                Media::create([
                    'category_id' => $quotesCategory->id,
                    'title_ta' => $quoteData['title_ta'],
                    'title_en' => $quoteData['title_en'],
                    'slug' => $slug,
                    'content_ta' => $quoteData['content_ta'],
                    'content_en' => $quoteData['content_en'],
                    'event_date' => $quoteData['event_date'],
                ]);
                $this->command->info('Created quote: ' . substr($quoteData['title_en'], 0, 50) . '...');
            } else {
                $this->command->info('Quote already exists: ' . substr($quoteData['title_en'], 0, 50) . '...');
            }
        }

        $this->command->info('Sample quotes seeding completed!');
    }
}
