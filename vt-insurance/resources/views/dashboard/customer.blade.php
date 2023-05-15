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





                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
