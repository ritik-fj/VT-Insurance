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

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container border">
                            <div class="">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{ $customer->fname }} {{ $customer->lname }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Date of Birth:</td>
                                            <td>{{ $customer->dob }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Address:</td>
                                            <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Phone:</td>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Email:</td>
                                            <td>{{ $customer->email }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>


                        </div>

                        <div class="container">
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col p-3">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('claims.create') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">Claim</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('claims.index') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">View Claims</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col p-3">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('mypolicies') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">My Policies</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col p-3">
                                    <div class="card text-center text-white" style="background-color: #184949">
                                        <a href="{{ route('request.view') }}" class="btn text-light">
                                            <div class="card-body">
                                                <h5 class="card-title">My Change Requests</h5>
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
