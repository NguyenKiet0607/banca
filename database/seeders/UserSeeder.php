<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create user
        \App\Models\User::create([
            'username' => 'test_tool',
            'name' => 'User Test Tool',
            'coin' => 0,
            'phone' => '0123456789',
            'password' => bcrypt('123456'),
            'status' => true,
        ]);
    }
}
