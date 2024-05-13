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
        \App\Models\Admin::truncate();

        $data = [
            [
                'email' => 'superadmin@gmail.com',
                'username' => 'superadmin',
                'coin' => 0,
                'role' => 1,
                'status' => true,
                'password' => bcrypt('123456'),
            ],
            [
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'coin' => 0,
                'role' => 2,
                'status' => true,
                'password' => bcrypt('123456'),
            ],
            [
                'email' => 'develop@gmail.com',
                'username' => 'develop',
                'coin' => 0,
                'role' => 3,
                'status' => true,
                'password' => bcrypt('123456'),
            ]
        ];
        \App\Models\Admin::insert($data);
        
    }
}
