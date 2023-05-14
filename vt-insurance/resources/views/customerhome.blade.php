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



                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col p-3">
                                <div class="card text-center text-white" style="background-color: #184949">
                                    <div class="card-body">
                                        <h5 class="card-title">Customers</h5>


                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center text-white" style="background-color: #184949">
                                    <div class="card-body">
                                        <h5 class="card-title">Policies</h5>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('viewpremiums') }}" class="btn">
                                            <div class="card-body">
                                                <h5 class="lead" style="font-size: 25px"><strong> View Premiums
                                                    </strong></h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col">
                                    <div class="card text-center bg-info text-white">
                                        <a href="{{ route('register') }}" class="btn">
                                            <div class="card-body">

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
