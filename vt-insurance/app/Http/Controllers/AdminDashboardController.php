<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $customersCount = DB::table('users')
            ->where('role', '=', 'customer')
            ->count();
        $policiesCount = DB::table('policies')->count();

        return view('dashboard.admin', [
            'customersCount' => $customersCount,
            'policiesCount' => $policiesCount,
        ]);
    }

    public function customers(Request $request)
    {
        // Retrieve the search term from the request object
        $searchTerm = $request->input('search');

        // If a search term is present, retrieve customers that match the search term
        if (!empty($searchTerm)) {
            $customers = User::where('fname', 'like', '%' . $searchTerm . '%')
                ->orWhere('lname', 'like', '%' . $searchTerm . '%')
                ->get();
        } else {
            $customers = DB::table('users')
                ->select('*')
                ->where('role', 'customer')
                ->get();
        }



        return view('admin.managecustomers', compact('customers', 'searchTerm'));
    }

    public function count()
    {
        $customersCount = DB::table('customers')->count();
        $policiesCount = DB::table('policies')->count();

        return view('dashboard.admin', [
            'customersCount' => $customersCount,
            'policiesCount' => $policiesCount,
        ]);
    }

    public function registerview()
    {
        // returns to the create view
        return view('admin.newuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registeruser(Request $request)
    {
        //validate input
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $user = new User();

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->dob = $request->input('dob');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        //redirect
        return redirect()->route('admin.dashboard')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function customerdetail($id)
    {
        $customers = User::findOrFail($id);
        return view('admin.customerdetail', compact('customers'));
    }
}
