<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subdistrict = [
            [
                'id' => 1,
                'province_id' => 1,
                'city_id' => 1,
                'name' => 'Coblong',
            ],
            [
                'id' => 2,
                'province_id' => 1,
                'city_id' => 1,
                'name' => 'Lengkong',
            ],
            [
                'id' => 3,
                'province_id' => 1,
                'city_id' => 2,
                'name' => 'Bekasi Selatan',
            ],
            [
                'id' => 4,
                'province_id' => 1,
                'city_id' => 2,
                'name' => 'Bekasi Utara',
            ],
            [
                'id' => 5,
                'province_id' => 2,
                'city_id' => 3,
                'name' => 'Kebayoran Baru',
            ],
            [
                'id' => 6,
                'province_id' => 2,
                'city_id' => 3,
                'name' => 'Tebet',
            ],
            [
                'id' => 7,
                'province_id' => 2,
                'city_id' => 4,
                'name' => 'Koja',
            ],
            [
                'id' => 8,
                'province_id' => 2,
                'city_id' => 4,
                'name' => 'Kelapa Gading',
            ],
        ];

        \App\Models\SubDistrict::truncate();

        foreach ($subdistrict as $sub) {
            \App\Models\SubDistrict::create($sub);
        }
    }
}
