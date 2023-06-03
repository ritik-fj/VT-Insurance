@extends('layouts.master')

@section('title', 'Customer Dashboard')

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
                        <h1 class="display-6 text-center">Welcome to the Customer Dashboard</h1>
                    </div>

                    <a name="" id="" class="btn btn-primary" href="{{ route('myreport') }}" role="button">Download YOur Detailed Report</a>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container border rounded-3 my-2 border-warning p-2">
                            <strong>Total Premiums Balance: ${{$balance}}</strong>

                        </div>

                        <div class="container border rounded-3 my-2">
                            <div class="">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{ $user->fname }} {{ $user->lname }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Date of Birth:</td>
                                            <td>{{ $user->dob }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Address:</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Phone:</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Email:</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col pt-2">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('claims.create') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">Create Claim</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col pt-2">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('myclaims') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    View Claims</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col pt-2">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('mypolicies') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">My Policies</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col pt-2">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('request.view') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">My Change Requests</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col pt-2">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('customer.mypayments') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">My Payments</h5>
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
