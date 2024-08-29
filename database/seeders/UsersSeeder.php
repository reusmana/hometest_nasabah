<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $cs = User::create([
            'name' => 'customer service',
            'email' => 'cs_sudirman@gmail.com',
            'password' => Hash::make('12345678'),
            'cabang_id' => 1,
            'email_verified_at' => now(),
        ]);
        $supervisor = User::create([
            'name' => 'supervisor',
            'email' => 'supervisor_sudirman@gmail.com',
            'password' => Hash::make('12345678'),
            'cabang_id' => 1,
            'email_verified_at' => now(),
        ]);

        $cs->assignRole('customer service');
        $supervisor->assignRole('supervisor');

        $cs_cikini = User::create([
            'name' => 'customer service',
            'email' => 'cs_cikini@gmail.com',
            'password' => Hash::make('12345678'),
            'cabang_id' => 2,
            'email_verified_at' => now(),
        ]);
        $supervisor_cikini = User::create([
            'name' => 'supervisor',
            'email' => 'supervisor_cikini@gmail.com',
            'password' => Hash::make('12345678'),
            'cabang_id' => 2,
            'email_verified_at' => now(),
        ]);

        $cs_cikini->assignRole('customer service');
        $supervisor_cikini->assignRole('supervisor');
    }
}
