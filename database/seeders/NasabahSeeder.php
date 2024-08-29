<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Nasabah::truncate();
        \App\Models\DetailAddress::truncate();

        // $faker = Faker\Factory::create();

        for ($i = 1; $i <= 20; ++$i) {
            $detailAddress = \App\Models\DetailAddress::create([
                'province_id' => 2,
                'city_id' => 3,
                'sub_district_id' => 6,
                'vilage_id' => 17,
                'name' => 'jl kampung baru rt 01/ rw 01',
            ]);

            $store = \App\Models\Nasabah::create([
                'nama' => $i % 2 === 0 ? 'sudirman '.$i : 'cikini '.$i,
                'tempat_lahir' => 'jakarta',
                'tanggal_lahir' => date('1998-11-16'),
                'jenis_kelamin' => 'laki-laki',
                'pekerjaan_id' => 2,
                'alamat_id' => $detailAddress->id,
                'nominal_setor' => 10000000,
                'cabang_id' => $i % 2 === 0 ? 1 : 2,
            ]);
        }
    }
}
