<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'role' => 'admin',
            'fname' => 'admin',
            'lname' => 'admin',
            'dob' => '1999-01-22',
            'address' => 'Suva',
            'phone' => '7746673',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
