<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'mohameed' ,
            'email' => 'mohamed@example',
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'marah' ,
            'email' => 'marah@example',
            'password' => Hash::make('marahpasswrd'),
        ]);
    }
}
