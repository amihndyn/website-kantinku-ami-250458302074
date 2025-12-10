<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'nim' => '1234567890',
            'name' => 'Ami Handayani',
            'email' => 'ami@gmail.com',
            'password' => Hash::make('pw123'),
            'phone_number' => '081234567890',
            'role' => 'admin',
            'is_verify' => true,
        ]);

        // Buyer user  
        User::create([
            'nim' => '0987654321',
            'name' => 'Pond Naravit',
            'email' => 'pond@gmail.com',
            'password' => Hash::make('pw123'),
            'phone_number' => '081234567891',
            'role' => 'buyer',
            'is_verify' => true,
        ]);

        // Buyer user 2
        User::create([
            'nim' => '1122334455', 
            'name' => 'Phuwintang',
            'email' => 'phu@gmail.com',
            'password' => Hash::make('pw123'),
            'phone_number' => '081234567892',
            'role' => 'buyer',
            'is_verify' => true,
        ]);
    }
}