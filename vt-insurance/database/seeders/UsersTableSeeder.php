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

            [
                'role' => 'customer',
                'fname' => 'Bruce',
                'lname' => 'Lee',
                'dob' => '1970-06-27',
                'address' => 'Suva',
                'phone' => '9343751',
                'email' => 'lee@gmail.com',
                'password' => Hash::make('12345678'),
            ],

        ]);
    }
}
