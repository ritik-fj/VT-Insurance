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
            ->select('customer_policies.id', 'policies.id as policy_id', 'policies.policy_type', 'customer_policies.coverage_amount', 'customer_policies.premium_amount', 'customer_policies.policy_duration')
            ->where('customers.user_id', '=', auth()->user()->id)
            ->get();

        return view('mypolicies', compact('policies', 'customer', 'id'));
    }
}
