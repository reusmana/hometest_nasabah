<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VilageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $village = [
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 1,
                'name' => 'Dago',
            ],
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 1,
                'name' => 'Lebak Siliwangi',
            ],
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 1,
                'name' => 'Sadang Serang',
            ],
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 2,
                'name' => 'Malabar',
            ],
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 2,
                'name' => 'Burangrang',
            ],
            [
                'province_id' => 1,
                'city_id' => 1,
                'sub_district_id' => 2,
                'name' => 'Cijagra',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 3,
                'name' => 'Jaka Setia',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 3,
                'name' => 'Pekayon Jaya',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 3,
                'name' => 'Jaka Sampurna',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 4,
                'name' => 'Harapan Baru',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 4,
                'name' => 'Marga Mulya',
            ],
            [
                'province_id' => 1,
                'city_id' => 2,
                'sub_district_id' => 4,
                'name' => 'Kaliabang Tengah',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 5,
                'name' => 'Gandaria Utara',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 5,
                'name' => 'Kramat Pela',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 5,
                'name' => 'Pulo',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 6,
                'name' => 'Tebet Barat',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 6,
                'name' => 'Tebet Timur',
            ],
            [
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 6,
                'name' => 'Kebon Baru',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 7,
                'name' => 'Rawa Badak Utara',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 7,
                'name' => 'Rawa Badak Selatan',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 7,
                'name' => 'Koja',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 8,
                'name' => 'Kelapa Gading Barat',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 8,
                'name' => 'Kelapa Gading Timur',
            ],
            [
                'province_id' => 2,
                'city_id' => 4,
                'sub_district_id' => 8,
                'name' => 'Pegangsaan Dua',
            ],
        ];

        \App\Models\Vilage::truncate();

        foreach ($village as $vil) {
            \App\Models\Vilage::create($vil);
        }
    }
}
