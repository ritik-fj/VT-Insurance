@extends('layouts.master')
@section('title', 'Customer Detail')


@section('content')

    <div class="row p-4">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.index') }}">Back</a>
            </div>

        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">

        <div class="col"></div>
        <div class="col-6">
            <div class="card border-dark text-center">
                <h1 class="display-6">{{ $customers->customer_fname }}'s Details</h1>
                <div class="card-body">
                    <strong class="lead card-text">First Name: {{ $customers->customer_fname }}</strong><br>
                    <strong class="lead card-text">Last Name: {{ $customers->customer_lname }}</strong><br>
                    <strong class="lead card-text">Date Of Birth: {{ $customers->customer_dob }}</strong><br>
                    <strong class="lead card-text">Address: {{ $customers->customer_address }}</strong><br>
                    <strong class="lead card-text">Email: {{ $customers->customer_email }}</strong><br>
                    <strong class="lead card-text">Phone: {{ $customers->customer_phone }}</strong>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>


    <div class="text-center pt-2">
        <a href="{{ route('customers.policies_info', ['customer_id' => $customers->id]) }}" class="btn btn-primary">View
            Policies History</a>
        <a href="{{ route('customers.assign-policy', ['customer_id' => $customers->id]) }}" class="btn btn-primary">Assign
            Policy</a>
    </div>


@stop
