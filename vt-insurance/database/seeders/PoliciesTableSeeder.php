<?php

namespace Database\Seeders;

use App\Models\Policies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Policies::create([
            'policy_type' => 'Basic',
            'coverage_amount' => '10000',
            'premium_amount' => '500',
            'excess_amount' => '200',
            'policy_duration' => '1 year',
        ]);
        Policies::create([
            'policy_type' => 'Standard',
            'coverage_amount' => '20000',
            'premium_amount' => '800',
            'excess_amount' => '400',
            'policy_duration' => '2 years',
        ]);
        Policies::create([
            'policy_type' => 'Comprehensive',
            'coverage_amount' => '30000',
            'premium_amount' => '1200',
            'excess_amount' => '600',
            'policy_duration' => '3 years',
        ]);
        Policies::create([
            'policy_type' => 'Liability',
            'coverage_amount' => '40000',
            'premium_amount' => '1600',
            'excess_amount' => '800',
            'policy_duration' => '4 years',
        ]);
        Policies::create([
            'policy_type' => 'Collision',
            'coverage_amount' => '50000',
            'premium_amount' => '2000',
            'excess_amount' => '1000',
            'policy_duration' => '5 years',
        ]);
    }
}
