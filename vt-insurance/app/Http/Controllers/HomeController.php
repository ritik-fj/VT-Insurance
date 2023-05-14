<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customersCount = DB::table('customers')->count();
        $policiesCount = DB::table('policies')->count();
        return view('home', [
            'customersCount' => $customersCount,
            'policiesCount' => $policiesCount,
        ]);
    }
    public function customerindex()
    {;
        return view('customerhome');
    }
}
