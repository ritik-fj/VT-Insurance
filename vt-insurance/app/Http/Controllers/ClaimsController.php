<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\CustomerPolicy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClaimsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function myclaims()
    {
        //
        $customer = Auth::id();
        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', $customer)
            ->get();

        return view('customer.myclaims', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Auth::id();

        $policies = CustomerPolicy::where('customer_id', $customer)->get();

        return view('customer.createclaim', compact('policies'));
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

        $customer = Auth::id();

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('claim_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create a new claim
        $claim = new Claim();

        $claim->customer_id = $customer; // Assuming the relationship is defined
        $claim->policy_id = $request->input('policy_id');
        $claim->description = $request->input('description');
        $claim->incident_date = $request->input('incident_date');
        $claim->claim_type = $request->input('claim_type');
        $claim->claim_amount = $request->input('claim_amount');
        $claim->image = $validatedData['image'] ?? null; // Assign the image path if available

        $claim->save();

        // Redirect or show success message
        return redirect()->route('myclaims')->with('success', 'Claim submitted successfully!');
    }

    public function allclaims()
    {
        //
        $claims = DB::table('claims')
            ->select('*')
            ->get();
        return view('admin.viewclaims', compact('claims'));
    }

    public function claimPDF()
    {
        $customer = DB::table('users')
            ->select('*')
            ->where('id', '=', Auth::id())
            ->first();

        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();

        $pdf = app('dompdf.wrapper')->loadView('reports.claim', compact('customer',  'claims'));

        return $pdf->download('claim.pdf');
    }

    public function manageclaims()
    {

        $claims = DB::table('claims')
            ->select('*')
            ->get();

        return view('admin.manageclaims', compact('claims'));
    }

    public function approve_claim($id)
    {
        $claim = Claim::findOrFail($id);

        $claim->status = 'Approved';
        $claim->save();


        return redirect()->route('claim.manage')->with('success', 'Claim Approved Successfully');
    }
    public function reject_claim($id)
    {
        $claim = Claim::findOrFail($id);
        $claim->status = 'Rejected';
        $claim->save();

        return redirect()->route('claim.manage')->with('success', 'Claim Rejected Successfully');
    }

    public function destroy($id)
    {
        //deletes the record
        $claim = Claim::find($id);
        $claim->delete();

        //redirect
        return redirect()->route('claim.manage')->with('success', 'Claim Deleted Successfully');
    }
}
