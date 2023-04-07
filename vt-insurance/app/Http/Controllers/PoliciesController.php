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
        // assigns policy data to variable
        $policies = Policies::all();

        // $policies = 'this is a test';

        return view('policies.index', ['policies' => $policies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // returns to the create view
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
    public function show($id)
    {
        $policies = Policies::findOrFail($id);
        return view('policies.show', compact('policies'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $policies = Policies::find($id);
        return view('policies.edit', compact('policies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate input 
        $request->validate([
            'policy_name' => 'required',
            'policy_coverage' => 'required'
        ]);

        //finds and updates records
        $policies = Policies::find($id);
        $policies->policy_name = $request->input('policy_name');
        $policies->policy_coverage = $request->input('policy_coverage');
        $policies->save();

        //redirect
        return redirect()->route('policies.index')->with('success', 'Policy Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //deletes the record
        $policies = Policies::find($id);
        $policies->delete();

        //redirect
        return redirect()->route('policies.index')->with('success', 'Policy Deleted Successfully');
    }
}
