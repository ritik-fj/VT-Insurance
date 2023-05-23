<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'role' => 'admin',
            'fname' => 'Admin',
            'lname' => 'Admin',
            'dob' => '1999-01-22',
            'address' => 'Suva',
            'phone' => '7746673',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'role' => 'customer',
            'fname' => 'Bruce',
            'lname' => 'Lee',
            'dob' => '1970-06-27',
            'address' => 'Suva',
            'phone' => '9343751',
            'email' => 'lee@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'role' => 'customer',
            'fname' => 'James',
            'lname' => 'Bond',
            'dob' => '1990-03-07',
            'address' => 'Ba',
            'phone' => '7343821',
            'email' => 'bond@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'role' => 'customer',
            'fname' => 'Elon',
            'lname' => 'Musk',
            'dob' => '1988-10-17',
            'address' => 'Labasa',
            'phone' => '9992223',
            'email' => 'musk@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
