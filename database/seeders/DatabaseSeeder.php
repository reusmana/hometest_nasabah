<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            CabangSeeder::class,
            OccuptionSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class,
            SubDistrictSeeder::class,
            VilageSeeder::class,
            UsersSeeder::class,
            NasabahSeeder::class,
        ]);
    }
}
