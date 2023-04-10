<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\Customers;
use App\Models\Policies;
use Illuminate\Http\Request;

class CustomerPolicyController extends Controller
{
    //
    public function assignPolicy($customer_id)
    {
        $customer = Customers::find($customer_id);
        $policyTypes = Policies::pluck('policy_type', 'id');
        return view('assign-policy', compact('customer', 'policyTypes'));
    }

    public function store(Request $request)
    {
        $customer_policy = new CustomerPolicy();

        $customer_policy->customer_id = $request->input('customer_id');
        $customer_policy->policy_id = $request->input('policy_type');

        $customer_policy->save();

        return redirect('/customers/' . $request->input('customer_id'));
    }
}
