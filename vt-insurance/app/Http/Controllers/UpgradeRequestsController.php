<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\UpgradeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpgradeRequestsController extends Controller
{
    public function create($id)
    {
        $policy = CustomerPolicy::findOrFail($id);

        return view('customer.upgraderequest', compact('policy'));
    }

    public function store(Request $request)
    {

        $change = new UpgradeRequest();
        $change->customer_id = $request->input('customer_id');
        $change->policy_id = $request->input('policy_id');
        $change->policy_type = $request->input('policy_type');
        $change->coverage_amount = $request->input('coverage_amount');
        $change->premium_amount = $request->input('premium_amount');
        $change->excess_amount = $request->input('excess_amount');
        $change->policy_duration = $request->input('policy_duration');

        $change->save();



        return redirect()->route('request.view')->with('success', 'Request Created Successfully');
    }

    public function viewrequests()
    {

        $requests = DB::table('upgrade_requests')
            ->select('*')
            ->where('customer_id', Auth::id())
            ->get();

        return view('customer.viewrequests', compact('requests'));
    }
    public function managerequests()
    {

        $requests = DB::table('upgrade_requests')
            ->select('*')
            ->get();

        return view('admin.managerequests', compact('requests'));
    }

    public function approve_request($id)
    {
        $policy = UpgradeRequest::findOrFail($id);


        $customerPolicy = CustomerPolicy::findOrFail($policy->policy_id);


        $customerPolicy->coverage_amount = $policy->coverage_amount;
        $customerPolicy->excess_amount = $policy->excess_amount;
        $customerPolicy->premium_amount = $policy->premium_amount;
        $customerPolicy->policy_duration = $policy->policy_duration;
        $customerPolicy->save();

        $policy->status = 'Approved';
        $policy->save();


        return redirect()->route('request.manage')->with('success', 'Upgrade Approved Successfully');
    }
    public function reject_request($id)
    {
        $policy = UpgradeRequest::findOrFail($id);
        $policy->status = 'Rejected';
        $policy->save();

        return redirect()->route('request.manage')->with('success', 'Upgrade Rejected Successfully');
    }
}
