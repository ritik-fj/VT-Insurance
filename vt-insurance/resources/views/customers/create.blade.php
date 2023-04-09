@extends('layouts.master')
@section('title', 'Create Customer')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Create New Customer</h1>
            </div>
            <div class="float-end p-2">
                <a class="btn btn-success " href="{{ route('customers.index') }}"> View All Customers</a>
            </div>
        </div>
    </div>

    <div class="container p-5 my-3 border">
        @if ($errors->any())
            <div class="alert alert-danger lead">
                <strong>Whoops</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="lead" action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label"> <strong>First Name</strong></label>
                <input type="text" class="form-control" name="customer_fname" placeholder="Enter First Name">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Last Name </strong></label>
                <input type="text" class="form-control" name="customer_lname" placeholder="Enter Last Name">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Date Of Birth</strong></label>
                <input type="date" class="form-control" name="customer_dob" placeholder="Enter Date Of Birth">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Address</strong></label>
                <input type="text" class="form-control" name="customer_address" placeholder="Enter Address">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Email Address</strong></label>
                <input type="email" class="form-control" name="customer_email" placeholder="Enter Email">
                @error('customer_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Phone</strong></label>
                <input type="text" class="form-control" name="customer_phone" placeholder="Enter Phone Number">
                @error('customer_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>




@stop
