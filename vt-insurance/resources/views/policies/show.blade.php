@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Policy</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('policies.index') }}">Back</a>
            </div>

        </div>
    </div>

    <div class="row">
        <h1 class="display-4">{{ $policies->policy_name }}</h1>
        <strong class="lead">Coverage: {{ $policies->policy_coverage }}</strong>
    </div>

@stop
