<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => ('ridho'),
            'level' => ('admin'),
            'email' => ('admin123@gmail.com'),
            'password' => bcrypt('admin123'),
            'img' => (''),

        ]);
    }
}