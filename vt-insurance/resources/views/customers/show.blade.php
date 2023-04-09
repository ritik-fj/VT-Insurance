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
    <div class="row p-4 text-center">
        {{-- <h1 class="display-4">{{ $customers->policy_type }}</h1> --}}
        <strong class="lead">First Name: {{ $customers->customer_fname }}</strong>
        <strong class="lead">Last Name: {{ $customers->customer_lname }}</strong>
        <strong class="lead">Date Of Birth: {{ $customers->customer_dob }}</strong>
        <strong class="lead">Address: {{ $customers->customer_address }}</strong>
        <strong class="lead">Email: {{ $customers->customer_email }}</strong>
        <strong class="lead">Phone: {{ $customers->customer_phone }}</strong>
    </div>

@stop
