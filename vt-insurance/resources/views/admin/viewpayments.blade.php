@extends('layouts.master')
@section('title', ' Policies')


@section('content')
    <div class="row p-4">
        <div class="col-lg-12 margin-tb"></div>
    </div>
    <div class="container">
        <div>
            <h1 class="display-6">All Payments</h1>
        </div>
        <hr>
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
        <hr>
    </div>
@stop
