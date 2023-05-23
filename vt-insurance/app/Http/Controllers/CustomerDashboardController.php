<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerDashboardController extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->user()->id)
            ->first();
        return view('dashboard.customer', compact('user'));
    }
}
