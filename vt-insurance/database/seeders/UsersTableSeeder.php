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
            //Insurer
            [
            'role' => 'admin',
            'fname' => 'admin',
            'lname' => 'admin',
            'dob' => '1999-01-22',
            'address' => 'Suva',
            'phone' => '7746673',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            ],

            //Customer
         //   [
        //    'role' => 'customer',
        //    'fname' => 'test',
        //    'lname' => 'test',
        //    'dob' => '2000-01-25',
        //    'address' => 'Suva',
        //    'phone' => '1111111',
        //    'email' => 'test@test.com',
        //    'password' => Hash::make('12345678'),
        //    ],
        ]);
    }
}
