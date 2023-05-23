@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row p-4">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('managepolicies') }}">Back</a>
            </div>

        </div>
    </div>

    <div class="row p-4 text-center">

        <div class="col-md-6 mx-auto">
            <div class="card border-dark">
                <div class="card-body">
                    <h1 class="card-title display-6">
                        {{ $policies->policy_type }}
                    </h1>
                    <hr>
                    <p class="card-text">
                        <strong class="lead">Coverage Amount: {{ $policies->coverage_amount }}</strong><br>
                        <strong class="lead mt-2">Premium Amount: {{ $policies->premium_amount }}</strong><br>
                        <strong class="lead">Excess Amount: {{ $policies->excess_amount }}</strong><br>
                        <strong class="lead">Policy Duration: {{ $policies->policy_duration }}</strong><br>
                        <strong class="lead">Description Amount: {{ $policies->description }}</strong>

                    </p>
                </div>
            </div>
        </div>

    </div>

@stop
