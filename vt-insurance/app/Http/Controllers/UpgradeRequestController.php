<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\UpgradeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpgradeRequestController extends Controller
{
    public function create($id)
    {
        $policy = CustomerPolicy::findOrFail($id);

        return view('customers.upgraderequest', compact('policy'));
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

        $customer = DB::table('customers')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        $requests = DB::table('upgrade_requests')
            ->select('*')
            ->where('customer_id', $customer)
            ->get();

        return view('customers.viewrequests', compact('requests'));
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
