<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostingstageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the current time to use for timestamps
        $now = Carbon::now();

        // Clear the table first to avoid duplicate entries on re-seed
        DB::table('postingstages')->delete();

        DB::table('postingstages')->insert([
            [
                'id' => 1,
                'name_ta' => 'மாநில பொறுப்பு',
                'name_en' => 'State Responsibility',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'name_ta' => 'மாவட்ட நிர்வாகம்',
                'name_en' => 'District Administration',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'name_ta' => 'துணைநிலை அமைப்பு',
                'name_en' => 'Subsidiary Body',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'name_ta' => 'ஒன்றியம்',
                'name_en' => 'Union', // 'Block'
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'name_ta' => 'பேரூர்', // 'Perur' (Town) - Moved
                'name_en' => 'Town',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'name_ta' => 'நகரம்',
                'name_en' => 'City',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'name_ta' => 'மாநகராட்சி',
                'name_en' => 'Corporation',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'name_ta' => 'பகுதி',
                'name_en' => 'Area',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'name_ta' => 'வட்டம்',
                'name_en' => 'Circle',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}