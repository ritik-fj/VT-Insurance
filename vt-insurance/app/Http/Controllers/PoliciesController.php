<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use Illuminate\Http\Request;

class PoliciesController extends Controller
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
        //
        return view('policies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input 
        $request->validate([
            'policy_name' => 'required',
            'policy_coverage' => 'required'
        ]);

        //create a new policy
        Policies::create($request->all());

        //redirect
        return redirect()->route('policies.index')->with('success', 'Policy Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Policies $policies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policies $policies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Policies $policies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policies $policies)
    {
        //
    }
}
