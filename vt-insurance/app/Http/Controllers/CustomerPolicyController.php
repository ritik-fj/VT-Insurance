<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\Customers;
use App\Models\Policies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect('/customers/' . $request->input('customer_id') . '/policies');
    }

    public function showCustomerPolicies($customer_id)
    {
        $customer = Customers::findOrFail($customer_id);
        $policies = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->select('policies.id', 'policies.policy_type', 'policies.coverage_amount', 'policies.premium_amount', 'policies.policy_duration')
            ->where('customer_policies.customer_id', '=', $customer_id)
            ->get();
        return view('show', compact('customer', 'policies'));
    }

    public function customerdetailsPDF($customer_id)
    {
        $customers = Customers::findOrFail($customer_id);
        $policies = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->select('policies.id', 'policies.policy_type', 'policies.coverage_amount', 'policies.premium_amount', 'policies.policy_duration')
            ->where('customer_policies.customer_id', '=', $customer_id)
            ->get();

        $pdf = app('dompdf.wrapper')->loadView('reports.customerdetails', compact('customers',  'policies'));

        return $pdf->download('customersdetails.pdf');
    }
}
