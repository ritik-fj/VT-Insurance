@extends('layouts.master')
@section('title', 'Customer Detail')


@section('content')

    <div class="row px-4">
        <div class="col-lg-12 margin-tb">

            <div class="float-start">
                <a class="btn btn-success" href="{{ route('customers.index') }}">Back</a>
            </div>
            <div class="float-end">
                <a class="btn btn-success"
                    href="{{ route('customerdetails.pdf', ['customer_id' => $customers->id]) }}">Download
                    {{ $customers->customer_fname }}'s Report</a>
            </div>

        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">

        <div class="col"></div>
        <div class="col-5">
            <div class="card border-dark text-center lead">
                <h1 class="display-6">{{ $customers->customer_fname }}'s Details</h1>

                <div class="card-body">
                    <div class="row ">
                        <div class="col-4 border">First Name</div>
                        <div class="col border">{{ $customers->customer_fname }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4 border">Last Name</div>
                        <div class="col border">{{ $customers->customer_lname }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4 border">Date Of Birth:</div>
                        <div class="col border">{{ $customers->customer_dob }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4  border">Address:</div>
                        <div class="col  border">{{ $customers->customer_address }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4  border">Email:</div>
                        <div class="col border">{{ $customers->customer_email }}</div>
                    </div>
                    <div class="row ">

                        <div class="col-4  border">Phone:</div>
                        <div class="col  border">{{ $customers->customer_phone }}</div>

                    </div>

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
