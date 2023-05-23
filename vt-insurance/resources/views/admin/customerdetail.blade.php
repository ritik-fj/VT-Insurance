@extends('layouts.master')
@section('title', 'Customer Detail')


@section('content')

    <div class="row px-4">
        <div class="col-lg-12 margin-tb">

            <div class="float-start">
                <a class="btn btn-success" href="{{ route('admin.managecustomers') }}">Back</a>
            </div>
            <div class="float-end">
                <a class="btn btn-success"
                    href="{{ route('customerdetails.pdf', ['customer_id' => $customer->id]) }}">Download
                    {{ $customer->fname }}'s Report</a>
            </div>

        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-md-6 mx-auto">
            <div class="card border-dark text-center lead">
                <h1 class="display-6">{{ $customer->fname }}'s Details</h1>

                <div class="card-body">
                    <div class="row ">
                        <div class="col-4 border">First Name</div>
                        <div class="col border">{{ $customer->fname }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4 border">Last Name</div>
                        <div class="col border">{{ $customer->lname }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4 border">Date Of Birth:</div>
                        <div class="col border">{{ $customer->dob }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4  border">Address:</div>
                        <div class="col  border">{{ $customer->address }}</div>
                    </div>
                    <div class="row ">
                        <div class="col-4  border">Email:</div>
                        <div class="col border">{{ $customer->email }}</div>
                    </div>
                    <div class="row ">

                        <div class="col-4  border">Phone:</div>
                        <div class="col  border">{{ $customer->phone }}</div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="text-center pt-2">
        <a href="{{ route('customer.viewpolicies', ['id' => $customer->id]) }}" class="btn btn-primary">View
            Policies History</a>
        <a href="{{ route('admin.assignpolicy', ['id' => $customer->id]) }}" class="btn btn-primary">Assign
            Policy</a>
    </div>


@stop
