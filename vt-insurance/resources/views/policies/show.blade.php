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
        <div class="col">
            <div class="form-group">
                <strong>Name: </strong>
                {{ $policies->policy_name }}
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <strong>Coverage: </strong>
                {{ $policies->policy_coverage }}
            </div>
        </div>

    </div>
    <br><br><br>
@stop
