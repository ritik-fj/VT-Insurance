<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\CustomerPolicy;
use App\Models\Notification;
use App\Models\Policies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerPoliciesController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = CustomerPolicy::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('policy_type', 'LIKE', "%$search%")
                    ->orWhere('customer_id', 'LIKE', "%$search%");
            });
        }

        $policies = $query->get();

        return view('admin.activepolicies', compact('policies', 'search'));
    }

    public function assignPolicy($customer_id)
    {
        $customer = User::find($customer_id);
        $policyTypes = Policies::pluck('policy_type', 'id');

        return view('admin.assignpolicy', compact('customer', 'policyTypes'));
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
        $customer_policy->description = $policy->description;
        $customer_policy->balance = $policy->premium_amount;

        $customer_policy->save();

        $customer = DB::table('users')
            ->select('id')
            ->where('id', '=', $customer_policy->customer_id)
            ->first();

        return redirect()->route('customer.viewpolicies', ['id' => $customer->id]);
    }

    public function customerdetailsPDF($customer_id)
    {
        $customers = User::findOrFail($customer_id);

        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', $customer_id)
            ->get();

        $policies = DB::table('customer_policies')
            ->select('*')
            ->where('customer_policies.customer_id', '=', $customer_id)
            ->get();

        $payments = DB::table('payments')
            ->select('*')
            ->where('customer_id', '=', $customer_id)
            ->get();

        $balance = $policies->sum('balance');

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');

        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');

        $totalExcessAmount = $policies->sum('excess_amount');

        // Calculate the discounted premium if the number of policies is greater than 1
        $numberOfPolicies = $policies->count();
        $discountedpremium = $numberOfPolicies > 1 ? $totalPremiumAmount * pow(0.9, ($numberOfPolicies - 1)) : $totalPremiumAmount;
        $discountedpremium = round($discountedpremium, 2);
        $totalCoverageAmount = round($totalCoverageAmount, 2);
        $totalPremiumAmount = round($totalPremiumAmount, 2);
        $totalExcessAmount = round($totalExcessAmount, 2);


        $pdf = app('dompdf.wrapper')
            ->loadView('reports.customerdetails', compact('customers', 'balance', 'payments', 'policies', 'totalCoverageAmount', 'totalPremiumAmount', 'totalExcessAmount', 'discountedpremium', 'claims'));

        return $pdf->download('customersdetails.pdf');
    }

    public function viewpolicies($id)
    {
        $policies = DB::table('customer_policies')
            ->where('customer_id', '=', $id)
            ->get();

        $customer = DB::table('users')
            ->where('id', '=', $id)
            ->first();

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');
        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');
        // calculate the total coverage amount
        $totalExcessAmount = $policies->sum('excess_amount');

        // Calculate the discounted premium if the number of policies is greater than 1
        $numberOfPolicies = $policies->count();
        $discountedpremium = $numberOfPolicies > 1 ? $totalPremiumAmount * pow(0.9, ($numberOfPolicies - 1)) : $totalPremiumAmount;
        $discountedpremium = round($discountedpremium, 2);
        $totalCoverageAmount = round($totalCoverageAmount, 2);
        $totalPremiumAmount = round($totalPremiumAmount, 2);
        $totalExcessAmount = round($totalExcessAmount, 2);

        return view('admin.customerpolicies', compact('policies', 'customer', 'totalCoverageAmount', 'totalPremiumAmount', 'totalExcessAmount', 'discountedpremium'));
    }

    public function edit($id)
    {
        $customerPolicy = CustomerPolicy::find($id);
        return view('admin.customerpolicyedit', compact('customerPolicy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate input
        $request->validate([

            'coverage_amount' => 'required',
            'premium_amount' => 'required',
            'policy_duration' => 'required',
            'excess_amount' => 'required',

        ]);

        //finds and updates records
        $customerPolicy = CustomerPolicy::find($id);
        $customerPolicy->coverage_amount = $request->input('coverage_amount');
        $customerPolicy->premium_amount = $request->input('premium_amount');
        $customerPolicy->policy_duration = $request->input('policy_duration');
        $customerPolicy->excess_amount = $request->input('excess_amount');
        $customerPolicy->save();

        return redirect()->route('customer.viewpolicies', ['id' => $customerPolicy->customer_id])->with('success', 'Customer policy updated successfully!');
    }

    public function renew_policy($id)
    {
        $policy = CustomerPolicy::findOrFail($id);

        $policy->status = 'Renewed';
        $policy->save();

        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', $policy->customer_id)
            ->get();

        if ($claims->count() >= 1) {
            $policy->premium_amount = round($policy->premium_amount * 1.10);
            $policy->excess_amount = round($policy->excess_amount * 1.10);
            $policy->save();
            $policy->balance = $policy->premium_amount;
            $policy->save();

            $notification = new Notification();
            $notification->customer_id = $policy->customer_id;
            $notification->message = $policy->policy_type . ' Policy has been renewed. Premium and Excess amounts are increased by 10%, please call us on 9696969 for more information.';
            $notification->save();

            return redirect()->route('activepolicies')->with('success', 'Policy Renewed Successfully.
            Premium and Excess amounts are increased by 10%');
        } else {
            error_log('Premium amount remains the same');
            $notification = new Notification();
            $notification->customer_id = $policy->customer_id;
            $notification->message = $policy->policy_type . ' Policy has been renewed. Please call us on 9696969 if more information is needed.';
            $notification->save();
        }

        return redirect()->route('activepolicies')->with('success', 'Policy Renewed Successfully');
    }
    public function cancel_policy($id)
    {
        $policy = CustomerPolicy::findOrFail($id);
        $policy->status = 'Canceled';
        $policy->save();

        $notification = new Notification();
        $notification->customer_id = $policy->customer_id;
        $notification->message = $policy->policy_type . ' Policy has been canceled, please call us on 9696969 for more information.';
        $notification->save();
        return redirect()->route('activepolicies')->with('success', 'Policy Canceled Successfully');
    }

    public function destroy($id)
    {
        //deletes the record
        $policy = CustomerPolicy::find($id);
        $policy->delete();

        //redirect
        return redirect()->back()->with('success', 'Customer Policy Deleted Successfully');
    }
}
