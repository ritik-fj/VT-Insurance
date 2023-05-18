<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\RequestChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestChangeController extends Controller
{
    public function create($id)
    {
        $policy = CustomerPolicy::findOrFail($id);

        return view('customers.requestchange', compact('policy'));
    }

    public function store(Request $request)
    {

        // //validate input
        // $request->validate([
        //     'policy_type' => 'required',
        //     'coverage_amount' => 'required',
        //     'premium_amount' => 'required',
        //     'policy_duration' => 'required'
        // ]);

        // RequestChange::create($request->all());

        $change = new RequestChange();
        $change->customer_id = $request->input('customer_id');
        $change->policy_id = $request->input('policy_id');
        $change->policy_type = $request->input('policy_type');
        $change->coverage_amount = $request->input('coverage_amount');
        $change->premium_amount = $request->input('premium_amount');
        $change->policy_duration = $request->input('policy_duration');

        $change->save();



        return redirect()->route('request.view')->with('success', 'Request Created Successfully');
    }

    public function viewrequests()
    {

        $customer = DB::table('customers')
            ->where('user_id', '=', auth()->user()->id)
            ->value('id');

        $requests = DB::table('request_changes')
            ->select('*')
            ->where('customer_id', $customer)
            ->get();

        return view('customers.viewrequests', compact('requests'));
    }
}
