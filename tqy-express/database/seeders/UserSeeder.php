<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        // Admin
        Users::updateOrCreate(
            ['username' => 'admin'],
            [
                'password'     => Hash::make('password123'),
                'full_name'    => 'Admin User',
                'role'         => 'admin',
                'phone'        => '081234567890',
                'email'        => 'admin@example.com',
                'date_created' => now(),
            ]
        );

        // Courier
        Users::updateOrCreate(
            ['username' => 'kurir1'],
            [
                'password'     => Hash::make('password123'),
                'full_name'    => 'Kurir Satu',
                'role'         => 'kurir',
                'phone'        => '081111111111',
                'email'        => 'kurir1@example.com',
                'date_created' => now(),
            ]
        );

        // Staff
        Users::updateOrCreate(
            ['username' => 'staff1'],
            [
                'password'     => Hash::make('password123'),
                'full_name'    => 'Staff Satu',
                'role'         => 'staff',
                'phone'        => '082222222222',
                'email'        => 'staff1@example.com',
                'date_created' => now(),
            ]
        );

        // (Optional) bulk fakes
        // \App\Models\Users::factory()->count(5)->create();
    }
}

