<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create superadmin
        \App\Models\Admin::create([
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'coin' => 0,
            'role' => 1,
            'status' => true,
            'password' => bcrypt('123456'),
        ]);
    }
}
