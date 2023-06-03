<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class CustomerDashboardController extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $policies = DB::table('customer_policies')
        ->select('*')
        ->where('customer_id', '=', Auth::id())
        ->get();

        $balance = $policies->sum('balance');

        return view('dashboard.customer', compact('user', 'balance'));
    }
}
