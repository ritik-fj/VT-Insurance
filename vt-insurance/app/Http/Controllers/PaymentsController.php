<?php

namespace App\Http\Controllers;

use App\Models\CustomerPolicy;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();

        return view('admin.viewpayments', compact('payments'));
    }

    public function mypayments()
    {
        $payments = DB::table('payments')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();
        return view('customer.mypayments', compact('payments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function makepayment($id)
    {
        $policy = CustomerPolicy::findOrFail($id);
        return view('customer.makepayment', compact('policy', 'id'));
    }

    public function storepayment(Request $request)
    {
        //validate input
        $request->validate([
            'amount_paid' => 'required',
        ]);

        //create a new policy
        $payment = new Payment();

        $payment->amount_paid = $request->input('amount_paid');
        $payment->customer_id = Auth::id();
        $payment->policy_id = $request->input('policy_id');

        $payment->save();

        //redirect
        return redirect()->route('customer.mypayments')->with('success', 'Payment Made Successfully');
    }

    public function paymentsPDF()
    {
        $customers = DB::table('users')
            ->select('*')
            ->where('id', '=', Auth::id())
            ->first();

        $payments = DB::table('payments')
            ->select('*')
            ->where('customer_id', '=', Auth::id())
            ->get();

        $pdf = app('dompdf.wrapper')->loadView('reports.mypayments', compact('customers',  'payments'));

        return $pdf->download('payments.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
