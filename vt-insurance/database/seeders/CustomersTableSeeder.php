<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customers::create([
            'customer_fname' => 'Ritik',
            'customer_lname' => 'Kumar',
            'customer_dob' => '2000-03-27',
            'customer_address' => 'Nasinu',
            'customer_email' => 'ritikkumarfiji@gmail.com',
            'customer_phone' => '9317725',
        ]);
        Customers::create([
            'customer_fname' => 'Elon',
            'customer_lname' => 'Musk',
            'customer_dob' => '1980-04-20',
            'customer_address' => 'Nadi',
            'customer_email' => 'elonmusk@gmail.com',
            'customer_phone' => '9373939',
        ]);
        Customers::create([
            'customer_fname' => 'Bruce',
            'customer_lname' => 'Wayne',
            'customer_dob' => '1990-10-22',
            'customer_address' => 'Ba',
            'customer_email' => 'batman@gmail.com',
            'customer_phone' => '7777777',
        ]);
        Customers::create([
            'customer_fname' => 'Peter',
            'customer_lname' => 'Parker',
            'customer_dob' => '2000-11-30',
            'customer_address' => 'Suva',
            'customer_email' => 'spidey@gmail.com',
            'customer_phone' => '7380233',
        ]);
        Customers::create([
            'customer_fname' => 'Harley',
            'customer_lname' => 'Quinn',
            'customer_dob' => '1999-01-22',
            'customer_address' => 'Labasa',
            'customer_email' => 'harley22@gmail.com',
            'customer_phone' => '7696299',
        ]);
    }
}
