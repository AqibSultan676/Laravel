<?php

namespace Database\Seeders; // Ensure the correct namespace is used

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'username' => 'Admin',
            'email' => 'iamslayer786@gmail.com',
            'password' => Hash::make('1234'), // Hardcoded password
        ]);
    }
}
