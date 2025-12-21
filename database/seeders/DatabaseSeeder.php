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

        $this->call([
            AdminUserSeeder::class,
            StateSeeder::class,
            DistrictSeeder::class,
            AssemblySeeder::class,
            BlockSeeder::class,
            PerurSeeder::class,
            CitySeeder::class,
            CorporationSeeder::class,
            PostingstageSeeder::class,
            PostingSeeder::class,
        ]);
    }
}
