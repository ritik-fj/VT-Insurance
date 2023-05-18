<?php

namespace Database\Seeders;

use App\Models\Claim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Claim::create([
            'customer_id' => '9',
            'policy_id' => '1',
            'description' => 'I had an accident where I was held responsible for causing damage to someone elses car.',
            'incident_date' => '2023-05-11',
            'claim_type' => 'Collision',
            'claim_amount' => '800',
        ]);
    }
}
