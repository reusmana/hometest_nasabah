<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cabang::truncate();

        \App\Models\Cabang::create([
            'name' => 'KCP Sudirman',
            'address' => 'Wisma Nugra Santana Lt. 1, Jl. Jenderal Sudirman Kav 7-8, Jakarta Pusat',
        ]);
        \App\Models\Cabang::create([
            'name' => 'KCP Cikini',
            'address' => 'Jl. Cikini Raya No. 31, Cikini, Menteng, Jakarta Pusat',
        ]);
    }
}
