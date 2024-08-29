<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'id' => 1,
                'province_id' => 1,
                'name' => 'Bandung',
            ],
            [
                'id' => 2,
                'province_id' => 1,
                'name' => 'Bekasi',
            ],
            [
                'id' => 3,
                'province_id' => 2,
                'name' => 'Jakarta Selatan',
            ],
            [
                'id' => 4,
                'province_id' => 2,
                'name' => 'Jakarta Utara',
            ],
        ];

        Cities::truncate();

        foreach ($cities as $city) {
            Cities::create($city);
        }
    }
}
