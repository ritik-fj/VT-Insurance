<?php

namespace Database\Seeders;

use App\Models\CustomerPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerPoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CustomerPolicy::create([
            'customer_id' => '9',
            'policy_id' => '1',
            'policy_type' => 'Basic',
            'coverage_amount' => '10000',
            'premium_amount' => '500',
            'excess_amount' => '200',
            'policy_duration' => '1 year',
        ]);
        CustomerPolicy::create([
            'customer_id' => '9',
            'policy_id' => '4',
            'policy_type' => 'Liability',
            'coverage_amount' => '40000',
            'premium_amount' => '1600',
            'excess_amount' => '800',
            'policy_duration' => '4 year',
        ]);
    }
}
