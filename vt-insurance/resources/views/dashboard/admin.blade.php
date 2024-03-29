@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container lead">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="p-2">
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h1 class="display-6 text-center">Welcome to the Admin Dashboard</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col">
                                <div class="card text-center text-white" style="background-color: #184949">
                                    <div class="card-body">
                                        <h5 class="card-title">Customers</h5>
                                        <p class="card-text">We currently have <span
                                                class="fw-bold">{{ $customersCount }}</span>
                                            customers.</p>
                                        <a href="{{ route('admin.managecustomers') }}" class="btn btn-info ">Manage
                                            Customers</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center text-white" style="background-color: #184949">
                                    <div class="card-body">
                                        <h5 class="card-title">Policies</h5>
                                        <p class="card-text">We currently have <span
                                                class="fw-bold">{{ $policiesCount }}</span>
                                            policies.</p>
                                        <a href="{{ route('managepolicies') }}" class="btn btn-info">Manage Policies</a>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('activepolicies') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> Active Policies
                                                    </strong></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('claim.manage') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> Manage Claims
                                                    </strong></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('request.manage') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> Upgrade Requests
                                                    </strong></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('admin.viewpayments') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> View Payments
                                                    </strong>
                                                </h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('admin.registerview') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> Register New User
                                                    </strong>
                                                </h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
