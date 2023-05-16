<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        $customersCount = DB::table('customers')->count();
        $policiesCount = DB::table('policies')->count();

        return view('dashboard.admin', [
            'customersCount' => $customersCount,
            'policiesCount' => $policiesCount,
        ]);
    }

    public function customer()
    {
        $customer = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->user()->id)
            ->first();


        return view('dashboard.customer', compact('customer'));
    }
}
