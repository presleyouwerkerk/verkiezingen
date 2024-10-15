<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ministry',
            'email' => 'ministry@example.com',
            'role' => 'ministry',
            'password' => bcrypt('securepassword'),
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'role' => 'test',
            'password' => bcrypt('securepassword'),
        ]);
    }
}
