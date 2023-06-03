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

    public function myreport()
    {
        $customers = DB::table('users')
        ->select('*')
        ->where('id','=',Auth::id())
        ->first();

        $claims = DB::table('claims')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();

        $policies = DB::table('customer_policies')
            ->select('*')
            ->where('customer_policies.customer_id', '=', Auth::id())
            ->get();

        $payments = DB::table('payments')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();

        $balance = $policies->sum('balance');

        // calculate the total coverage amount
        $totalCoverageAmount = $policies->sum('coverage_amount');

        // calculate the total coverage amount
        $totalPremiumAmount = $policies->sum('premium_amount');

        $totalExcessAmount = $policies->sum('excess_amount');

        // Calculate the discounted premium if the number of policies is greater than 1
        $numberOfPolicies = $policies->count();
        $discountedpremium = $numberOfPolicies > 1 ? $totalPremiumAmount * pow(0.9, ($numberOfPolicies - 1)) : $totalPremiumAmount;
        $discountedpremium = round($discountedpremium, 2);
        $totalCoverageAmount = round($totalCoverageAmount, 2);
        $totalPremiumAmount = round($totalPremiumAmount, 2);
        $totalExcessAmount = round($totalExcessAmount, 2);


        $pdf = app('dompdf.wrapper')
            ->loadView('reports.customerdetails', compact('customers', 'balance', 'payments', 'policies', 'totalCoverageAmount', 'totalPremiumAmount', 'totalExcessAmount', 'discountedpremium', 'claims'));

        return $pdf->download('myreport.pdf');
    }
}
