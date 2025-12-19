<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CorporationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $targetTable = 'corporations'; // Table name is cities

        // --- District Name to ID Mapping ---
        $districtMap = DB::table('districts')->pluck('id', 'name_en')->all();

        // Failsafe in case districts table is empty
        if (empty($districtMap)) {
            $this->command->error('Districts table is empty. Please run DistrictSeeder first.');
            return;
        }

        $corporations = [
            // Chennai (1)
            ['name_en' => 'Chennai', 'name_ta' => 'சென்னை', 'district' => 'Chennai'],

            // Coimbatore (1)
            ['name_en' => 'Coimbatore', 'name_ta' => 'கோயம்புத்தூர்', 'district' => 'Coimbatore'],

            // Cuddalore (1) - Recently upgraded
            ['name_en' => 'Cuddalore', 'name_ta' => 'கடலூர்', 'district' => 'Cuddalore'],

            // Dindigul (1)
            ['name_en' => 'Dindigul', 'name_ta' => 'திண்டுக்கல்', 'district' => 'Dindigul'],

            // Erode (1)
            ['name_en' => 'Erode', 'name_ta' => 'ஈரோடு', 'district' => 'Erode'],

            // Kancheepuram (1) - Recently upgraded
            ['name_en' => 'Kancheepuram', 'name_ta' => 'காஞ்சிபுரம்', 'district' => 'Kancheepuram'],

            // Karur (1) - Recently upgraded
            ['name_en' => 'Karur', 'name_ta' => 'கரூர்', 'district' => 'Karur'],

            // Krishnagiri (1)
            ['name_en' => 'Hosur', 'name_ta' => 'ஓசூர்', 'district' => 'Krishnagiri'],

            // Madurai (1)
            ['name_en' => 'Madurai', 'name_ta' => 'மதுரை', 'district' => 'Madurai'],

            // Kanyakumari (1)
            ['name_en' => 'Nagercoil', 'name_ta' => 'நாகர்கோவில்', 'district' => 'Kanyakumari'],

            // Salem (1)
            ['name_en' => 'Salem', 'name_ta' => 'சேலம்', 'district' => 'Salem'],

            // Sivakasi (Virudhunagar) (1) - Recently upgraded
            ['name_en' => 'Sivakasi', 'name_ta' => 'சிவகாசி', 'district' => 'Virudhunagar'],

            // Thanjavur (2)
            ['name_en' => 'Kumbakonam', 'name_ta' => 'கும்பகோணம்', 'district' => 'Thanjavur'], // Recently upgraded
            ['name_en' => 'Thanjavur', 'name_ta' => 'தஞ்சாவூர்', 'district' => 'Thanjavur'],

            // Thoothukudi (1)
            ['name_en' => 'Thoothukudi', 'name_ta' => 'தூத்துக்குடி', 'district' => 'Thoothukudi'],

            // Tiruchirappalli (1)
            ['name_en' => 'Tiruchirappalli', 'name_ta' => 'திருச்சிராப்பள்ளி', 'district' => 'Tiruchirappalli'],

            // Tirunelveli (1)
            ['name_en' => 'Tirunelveli', 'name_ta' => 'திருநெல்வேலி', 'district' => 'Tirunelveli'],

            // Tiruppur (1)
            ['name_en' => 'Tiruppur', 'name_ta' => 'திருப்பூர்', 'district' => 'Tiruppur'],

            // Tiruvallur (1) - Avadi Corp is within Tiruvallur Revenue District
            ['name_en' => 'Avadi', 'name_ta' => 'ஆவடி', 'district' => 'Tiruvallur'],

            // Vellore (1)
            ['name_en' => 'Vellore', 'name_ta' => 'வேலூர்', 'district' => 'Vellore'],

            // Chengalpattu (1) - Tambaram Corp covers areas in Chengalpattu district
            ['name_en' => 'Tambaram', 'name_ta' => 'தாம்பரம்', 'district' => 'Chengalpattu'], // Recently upgraded

        ];

        // --- Prepare data for insertion ---
        $dataToInsert = [];
        $insertedCount = 0;
        foreach ($corporations as $corporation) {
            // Find the district_id from the map
            $districtId = $districtMap[$corporation['district']] ?? null;

            if ($districtId) {
                // Optional: Check if the city already exists to prevent duplicates
                $exists = DB::table($targetTable)
                            ->where('name_en', $corporation['name_en'])
                            ->where('district_id', $districtId)
                            ->exists();

                if (!$exists) {
                    $dataToInsert[] = [
                        'district_id' => $districtId,
                        'name_en'     => $corporation['name_en'],
                        'name_ta'     => $corporation['name_ta'],
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                    $insertedCount++;
                } else {
                     $this->command->info("Skipping existing corporation: " . $corporation['name_en']);
                }
            } else {
                $this->command->warn("Could not find district ID for district: " . $corporation['district'] . " (Corporation: " . $corporation['name_en'] . ")");
            }
        }

        // Insert new data in chunks
        if (!empty($dataToInsert)) {
            foreach (array_chunk($dataToInsert, 100) as $chunk) {
                DB::table($targetTable)->insert($chunk);
            }
            $this->command->info("Seeded {$insertedCount} new corporation records into the '{$targetTable}' table.");
        } else {
             $this->command->info("No new corporations to seed into the '{$targetTable}' table.");
        }
    }
}