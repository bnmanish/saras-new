<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'user_name' => 'admin',
            'password' => Hash::make('password'),
            'mobile' => '8116648011',
            'role' => 'admin',
            'email_verified' => '1',
            'mobile_verified' => '1',
            'status' => '1',
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'user_name' => 'testuser',
            'password' => Hash::make('password'),
            'mobile' => '9708669045',
            'role' => 'user',
            'email_verified' => '1',
            'mobile_verified' => '1',
            'status' => '1',
        ]);
    }
}
