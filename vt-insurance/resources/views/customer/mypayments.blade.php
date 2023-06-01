@extends('layouts.master')
@section('title', ' View CLaims')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Payment History</h1>
            </div>
            <div class="px-5">
                <a href="{{ route('customer.paymentspdf') }}" target="_blank" class="btn btn-success float-end">Download
                    Payments
                    Report</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="p-2">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    <hr class="featurette-divider">
    <div class="">

    </div>

    <div class="container ">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">


            </div>
        </div>

        <table class="table table-hover border-dark table-bordered bg-white mt-3">
            <thead class="thead-dark">
                <tr class="lead">

                    <th scope="col">ID</th>
                    <th scope="col">Policy ID</th>
                    <th scope="col">Amount Paid</th>
                    <th scope="col">Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="lead">
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->policy_id }}</td>
                        <td>${{ $payment->amount_paid }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
