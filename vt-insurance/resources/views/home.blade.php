@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <div class="mt-3 text-center">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary me-3">Manage Customers</a>
                            <a href="{{ route('policies.index') }}" class="btn btn-primary">Manage Policies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
