<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
        ]);

        $this->call([
            StateSeeder::class,     
            DistrictSeeder::class,
            AssemblySeeder::class,
            BlockSeeder::class,
            PerurSeeder::class,
            CitySeeder::class,
            CorporationSeeder::class,
            PostingstageSeeder::class, // From previous request
            SubbodySeeder::class,      // From previous request
            PostingSeeder::class,      // Add this new seeder
        ]);
    }
}
