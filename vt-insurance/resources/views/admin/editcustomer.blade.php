@extends('layouts.master')
@section('title', 'Edit Customer')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Edit Customer</h1>
            </div>
            <div class="float-end p-2">
                <a class="btn btn-success " href="{{ route('admin.managecustomers') }}"> View All Customers</a>
            </div>
        </div>
        <hr>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-7 mx-auto">
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
                <form class="lead" action="{{ route('customer.update', $customers->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label"> <strong>First Name</strong></label>
                        <input type="text" class="form-control" value="{{ $customers->fname }}" name="fname"
                            placeholder="Enter First Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> <strong>Last Name </strong></label>
                        <input type="text" class="form-control" value="{{ $customers->lname }}" name="lname"
                            placeholder="Enter Last Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> <strong>Date Of Birth</strong></label>
                        <input type="date" class="form-control" value="{{ $customers->dob }}" name="dob"
                            placeholder="Enter Date Of Birth">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> <strong>Address</strong></label>
                        <input type="text" class="form-control" value="{{ $customers->address }}" name="address"
                            placeholder="Enter Address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> <strong>Email Address</strong></label>
                        <input type="email" class="form-control" value="{{ $customers->email }}" name="email"
                            placeholder="Enter Email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> <strong>Phone</strong></label>
                        <input type="text" class="form-control" value="{{ $customers->phone }}" name="phone"
                            placeholder="Enter Phone Number">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@stop
