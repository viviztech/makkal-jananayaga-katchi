<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class QuotesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if "Quotes" category already exists
        $quotesCategory = Category::where('name_en', 'Quotes')->first();

        if (!$quotesCategory) {
            Category::create([
                'name_ta' => 'மேற்கோள்கள்',
                'name_en' => 'Quotes',
            ]);

            $this->command->info('Quotes category created successfully!');
        } else {
            $this->command->info('Quotes category already exists.');
        }
    }
}
