<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoggedInCustomerController extends Controller
{
    //
    public function mypolicies()
    {
        $customer = DB::table('customers')
            ->select('id')
            ->where('user_id', '=', auth()->user()->id)
            ->get();
        $id = auth()->user()->id;

        $policies = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->join('customers', 'customer_policies.customer_id', '=', 'customers.id')
            ->select('customer_policies.id', 'policies.id as policy_id', 'policies.policy_type', 'customer_policies.coverage_amount', 'customer_policies.premium_amount', 'customer_policies.policy_duration', 'customer_policies.excess_amount')
            ->where('customers.user_id', '=', auth()->user()->id)
            ->get();

        $totalCoverageAmount = $policies->sum('coverage_amount');

        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');
        // calculate the total coverage amount
        $totalExcessAmount = $policies->sum('excess_amount');

        // Calculate the discounted premium if the number of policies is greater than 1
        $numberOfPolicies = $policies->count();
        $discountedpremium = $numberOfPolicies > 1 ? $totalPremiumAmount * pow(0.9, ($numberOfPolicies - 1)) : $totalPremiumAmount;

        return view('mypolicies', compact('policies', 'customer', 'id', 'totalCoverageAmount', 'totalPremiumAmount', 'totalExcessAmount', 'discountedpremium'));
    }
}
