<?php

namespace Database\Seeders;

use App\Models\Provinces;
use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinces::truncate();
        Provinces::create([
            'name' => 'Jawa Barat',
        ]);
        Provinces::create([
            'name' => 'DKI Jakarta',
        ]);
    }
}
