<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // assigns customer data to variable
        $customers = Customers::all();


        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // returns to the create view
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input 
        $request->validate([
            'customer_fname' => 'required',
            'customer_lname' => 'required',
            'customer_dob' => 'required',
            'customer_address' => 'required',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_phone' => 'required|unique:customers,customer_phone'

        ]);


        //create a new customer
        Customers::create($request->all());

        //redirect
        return redirect()->route('customers.index')->with('success', 'Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customers = Customers::findOrFail($id);
        return view('customers.show', compact('customers'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('customers.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate input 
        $request->validate([
            'customer_fname' => 'required',
            'customer_lname' => 'required',
            'customer_dob' => 'required',
            'customer_address' => 'required',
            'customer_email' => [
                'required',
                'email',
                Rule::unique('customers')->ignore($id),
            ],
            'customer_phone' => [
                'required',
                'numeric',
                Rule::unique('customers')->ignore($id),
            ],
        ]);

        //finds and updates records
        $customers = Customers::find($id);
        $customers->customer_fname = $request->input('customer_fname');
        $customers->customer_lname = $request->input('customer_lname');
        $customers->customer_dob = $request->input('customer_dob');
        $customers->customer_address = $request->input('customer_address');
        $customers->customer_email = $request->input('customer_email');
        $customers->customer_phone = $request->input('customer_phone');
        $customers->save();

        //redirect
        return redirect()->route('customers.index')->with('success', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //deletes the record
        $customers = Customers::find($id);
        $customers->delete();

        //redirect
        return redirect()->route('customers.index')->with('success', 'Customer Deleted Successfully');
    }
}
