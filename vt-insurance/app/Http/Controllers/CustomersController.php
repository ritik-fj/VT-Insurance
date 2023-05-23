<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    //
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customers = User::find($id);
        return view('admin.editcustomer', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate input
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'numeric',
            ],
        ]);

        //finds and updates records
        $customers = User::find($id);
        $customers->fname = $request->input('fname');
        $customers->lname = $request->input('lname');
        $customers->dob = $request->input('dob');
        $customers->address = $request->input('address');
        $customers->email = $request->input('email');
        $customers->phone = $request->input('phone');
        $customers->save();

        //redirect
        return redirect()->route('admin.managecustomers')->with('success', 'Customer Updated Successfully');
    }

    public function customerdetails($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customerdetail', compact('customer'));
    }

    public function mypolicies()
    {
        $policies = DB::table('customer_policies')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');
        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');
        // calculate the total coverage amount
        $totalExcessAmount = $policies->sum('excess_amount');

        // Calculate the discounted premium if the number of policies is greater than 1
        $numberOfPolicies = $policies->count();
        $discountedpremium = $numberOfPolicies > 1 ? $totalPremiumAmount * pow(0.9, ($numberOfPolicies - 1)) : $totalPremiumAmount;


        return view('customer.mypolicies', compact('policies', 'totalCoverageAmount', 'totalPremiumAmount', 'totalExcessAmount', 'discountedpremium'));
    }
    public function generatePDF()
    {
        $customers = DB::table('users')
            ->select('*')
            ->where('role', '=', 'customer')
            ->get();
        $pdf = app('dompdf.wrapper')->loadView('reports.customers', compact('customers'));

        return $pdf->download('customers.pdf');
    }

    public function destroy($id)
    {
        //deletes the record
        $customers = User::find($id);
        $customers->delete();

        //redirect
        return redirect()->route('admin.managecustomers')->with('success', 'Customer Deleted Successfully');
    }
}
