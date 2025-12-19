<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $targetTable = 'states';

        $states = [
            [
                'name_en' => 'Tamil Nadu',
                'name_ta' => 'தமிழ்நாடு',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Add other Indian states here if needed
            /*
            [
                'name_en' => 'Andhra Pradesh',
                'name_ta' => 'ஆந்திர பிரதேசம்', // Or appropriate Tamil name
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name_en' => 'Kerala',
                'name_ta' => 'கேரளா', // Or appropriate Tamil name
                'created_at' => $now,
                'updated_at' => $now,
            ],
            */
        ];

        // Clear the table before seeding (optional, depends on your workflow)
        DB::table($targetTable)->delete();

        // Insert the data
        DB::table($targetTable)->insert($states);

        $this->command->info("Seeded " . count($states) . " records into the '{$targetTable}' table.");
    }
}