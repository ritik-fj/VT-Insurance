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
        $user = Auth::user();
        $customer = Customers::where('user_id', $user->id)->first();
        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', $customer->id)
            ->get();
        // $claims = Claim::all();

        return view('claim.index', compact('claims'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
        ]);

        $user = Auth::user();
        $customer = Customers::where('user_id', $user->id)->first();

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('claim_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create a new claim
        $claim = new Claim();

        $claim->customer_id = $customer->id; // Assuming the relationship is defined
        $claim->policy_id = $request->input('policy_id');
        $claim->description = $request->input('description');
        $claim->incident_date = $request->input('incident_date');
        $claim->claim_type = $request->input('claim_type');
        $claim->claim_amount = $request->input('claim_amount');
        $claim->image = $validatedData['image'] ?? null; // Assign the image path if available

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
