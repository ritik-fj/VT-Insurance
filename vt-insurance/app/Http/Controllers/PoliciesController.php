<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function search(Request $request)
    {
        $searchTerm = $request->input('policy_type');

        $policies = DB::table('policies')
            ->where('policy_type', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('policies.index', ['policies' => $policies]);
    }


    public function policiesPDF()
    {
        $policies = Policies::select('id', 'policy_type', 'coverage_amount', 'premium_amount', 'policy_duration')->get();
        $pdf = app('dompdf.wrapper')->loadView('reports.policies', compact('policies'));

        return $pdf->download('policies.pdf');
    }

    public function index(Request $request)
    {
        // Retrieve the search term from the request object
        $searchTerm = $request->input('policy_type');

        // If a search term is present, retrieve policies that match the search term
        if (!empty($searchTerm)) {
            $policies = Policies::where('policy_type', 'like', '%' . $searchTerm . '%')->get();
        }
        // Otherwise, retrieve all policies
        else {
            $policies = Policies::all();
        }

        return view('policies.index', ['policies' => $policies, 'searchTerm' => $searchTerm]);
    }

    public function viewpolicies(Request $request)
    {
        // Retrieve the search term from the request object
        $searchTerm = $request->input('policy_type');

        // If a search term is present, retrieve policies that match the search term
        if (!empty($searchTerm)) {
            $policies = Policies::where('policy_type', 'like', '%' . $searchTerm . '%')->get();
        }
        // Otherwise, retrieve all policies
        else {
            $policies = Policies::all();
        }

        return view('policies.viewpolicies', ['policies' => $policies, 'searchTerm' => $searchTerm]);
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
            'policy_type' => 'required',
            'coverage_amount' => 'required',
            'premium_amount' => 'required',
            'policy_duration' => 'required'
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
            'policy_type' => 'required',
            'coverage_amount' => 'required',
            'premium_amount' => 'required',
            'policy_duration' => 'required'
        ]);

        //finds and updates records
        $policies = Policies::find($id);
        $policies->policy_type = $request->input('policy_type');
        $policies->coverage_amount = $request->input('coverage_amount');
        $policies->premium_amount = $request->input('premium_amount');
        $policies->policy_duration = $request->input('policy_duration');
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
