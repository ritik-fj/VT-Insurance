<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\CustomerPolicy;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $customer = Customers::where('user_id', $user->id)->first();

        $policies = CustomerPolicy::where('customer_id', $customer->id)->get();

        return view('customers.createclaim', compact('policies'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_id' => 'required',
            'description' => 'required',
            'incident_date' => 'required',
            'claim_type' => 'required',
            'claim_amount' => 'required',
        ]);

        $user = Auth::user();
        $customer = Customers::where('user_id', $user->id)->first();


        // Create a new claim
        $claim = new Claim();

        $claim->customer_id = $customer->id; // Assuming the relationship is defined

        $claim->policy_id = $request->input('policy_id');
        $claim->description = $request->input('description');
        $claim->incident_date = $request->input('incident_date');
        $claim->claim_type = $request->input('claim_type');
        $claim->claim_amount = $request->input('claim_amount');
        $claim->save();

        // Redirect or show success message
        return redirect()->route('claims.create')->with('success', 'Claim submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        //
    }
}