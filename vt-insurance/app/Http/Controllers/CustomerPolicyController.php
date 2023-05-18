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

    public function search(Request $request)
    {
        $searchTerm = $request->input('customer_fname');

        $premiums = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->join('customers', 'customer_policies.customer_id', '=', 'customers.id')
            ->where('customer_fname', 'like', '%' . $searchTerm . '%')
            ->orWhere('customer_lname', 'like', '%' . $searchTerm . '%')
            ->orWhere('id', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('customers.index', ['customers' => $premiums]);
    }
    public function premiums(Request $request)
    {
        // Retrieve the search term from the request object
        $searchTerm = $request->input('search');

        // If a search term is present, retrieve customers that match the search term
        if (!empty($searchTerm)) {

            $premiums = DB::table('customer_policies')
                ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
                ->join('customers', 'customer_policies.customer_id', '=', 'customers.id')
                ->where('id', 'like', '%' . $searchTerm . '%')
                ->orWhere('customer_fname', 'like', '%' . $searchTerm . '%')
                ->orWhere('customer_lname', 'like', '%' . $searchTerm . '%')
                ->select('customer_policies.id', 'policies.id as policy_id', 'policies.policy_type', 'customer_policies.coverage_amount', 'customer_policies.premium_amount', 'customer_policies.policy_duration', 'customers.customer_fname', 'customers.customer_lname')
                ->get();
        }
        // Otherwise, retrieve all customers
        else {
            $premiums = DB::table('customer_policies')
                ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
                ->join('customers', 'customer_policies.customer_id', '=', 'customers.id')
                ->select('customer_policies.id', 'policies.id as policy_id', 'policies.policy_type', 'customer_policies.coverage_amount', 'customer_policies.premium_amount', 'customer_policies.policy_duration', 'customers.customer_fname', 'customers.customer_lname')
                ->get();
        }

        return view('premiumdashboard', compact('premiums'));
    }


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

        $policy = Policies::find($request->input('policy_type'));

        $customer_policy->policy_type = $policy->policy_type;
        $customer_policy->coverage_amount = $policy->coverage_amount;
        $customer_policy->premium_amount = $policy->premium_amount;
        $customer_policy->excess_amount = $policy->excess_amount;
        $customer_policy->policy_duration = $policy->policy_duration;

        $customer_policy->save();

        return redirect('/customers/' . $request->input('customer_id') . '/policies');
    }


    public function showCustomerPolicies($customer_id)
    {
        $customer = Customers::findOrFail($customer_id);
        $policies = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->select('customer_policies.id', 'policies.id as policy_id', 'policies.policy_type', 'customer_policies.coverage_amount', 'customer_policies.premium_amount', 'customer_policies.policy_duration', 'customer_policies.excess_amount')
            ->where('customer_policies.customer_id', '=', $customer_id)
            ->get();

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');

        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');
        // calculate the total coverage amount
        $totalExcessAmount = $policies->sum('excess_amount');

        return view('show', compact('customer', 'policies', 'totalPremiumAmount', 'totalCoverageAmount', 'totalExcessAmount'));
    }


    public function customerdetailsPDF($customer_id)
    {
        $customers = Customers::findOrFail($customer_id);
        $policies = DB::table('customer_policies')
            ->join('policies', 'customer_policies.policy_id', '=', 'policies.id')
            ->select('policies.id', 'policies.policy_type', 'policies.coverage_amount', 'policies.premium_amount', 'policies.policy_duration')
            ->where('customer_policies.customer_id', '=', $customer_id)
            ->get();

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');

        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');

        $pdf = app('dompdf.wrapper')->loadView('reports.customerdetails', compact('customers',  'policies', 'totalCoverageAmount', 'totalPremiumAmount'));

        return $pdf->download('customersdetails.pdf');
    }


    public function edit($id)
    {
        $customerPolicy = CustomerPolicy::find($id);

        return view('edit', compact('customerPolicy'));
    }

    public function update(Request $request, $id)
    {

        //validate input
        $request->validate([
            'coverage_amount' => 'required',
            'premium_amount' => 'required',
            'excess_amount' => 'required',
            'policy_duration' => 'required'
        ]);

        $customerPolicy = CustomerPolicy::find($id);

        $customerPolicy->coverage_amount = $request->input('coverage_amount');
        $customerPolicy->premium_amount = $request->input('premium_amount');
        $customerPolicy->excess_amount = $request->input('excess_amount');
        $customerPolicy->policy_duration = $request->input('policy_duration');

        $customerPolicy->save();

        return redirect('/customers/' . $customerPolicy->customer_id . '/policies')->with('success', 'Customer policy updated successfully!');
    }


    public function destroy($customer_id, $policy_id)
    {
        $customerPolicy = CustomerPolicy::where('customer_id', $customer_id)->where('policy_id', $policy_id)->first();
        if ($customerPolicy) {
            $customerPolicy->delete();
        }
        return redirect()->back()->with('success', 'Customer Policy Deleted Successfully');
    }

    public function editpremium($id)
    {
        $customerPolicy = CustomerPolicy::find($id);

        return view('editpremium', compact('customerPolicy'));
    }

    public function updatePremium(CustomerPolicy $customerPolicy, Request $request)
    {
        try {
            $request->validate([
                'coverage_amount' => 'required',
                'policy_duration' => 'required',
                'premium_amount' => 'required',
            ]);

            $customerPolicy->update([
                'coverage_amount' => $request->input('coverage_amount'),
                'policy_duration' => $request->input('policy_duration'),
                'premium_amount' => $request->input('premium_amount'),
            ]);

            return redirect('viewpremiums')->with('success', 'Premium updated successfully!');
        } catch (\Exception $e) {
            return redirect('viewpremiums')->with('error', 'An error occurred while updating the premium.');
        }
    }
}
