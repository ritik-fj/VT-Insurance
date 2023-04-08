@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row p-4">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('policies.index') }}">Back</a>
            </div>

        </div>
    </div>
    <div class="row p-4 text-center">
        <h1 class="display-4">{{ $policies->policy_type }}</h1>
        <strong class="lead">Coverage Amount: {{ $policies->coverage_amount }}</strong>
        <strong class="lead">Premium Amount: {{ $policies->premium_amount }}</strong>
        <strong class="lead">Policy Duration: {{ $policies->policy_duration }}</strong>
    </div>

@stop
