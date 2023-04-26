@extends('layouts.master')
@section('title', 'Edit Policy')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Edit Policy</h1>
            </div>
            <div class="float-end p-2">
                <a class="btn btn-success " href="{{ route('policies.index') }}"> View All Policy</a>
            </div>
        </div>
    </div>

    <div class="container p-5 my-3 border">
        @if ($errors->any())
            <div class="alert alert-danger lead">
                <strong>Whoops</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="lead" action="{{ route('policies.update', $policies->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Type</strong></label>
                <input type="text" class="form-control" value="{{ $policies->policy_type }}" name="policy_type"
                    placeholder="Enter Policy Type">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Coverage Amount</strong></label>
                <input type="text" class="form-control" value="{{ $policies->coverage_amount }}" name="coverage_amount"
                    placeholder="Enter Coverage Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Premium Amount</strong></label>
                <input type="text" class="form-control" value="{{ $policies->premium_amount }}" name="premium_amount"
                    placeholder="Enter Policy Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Duration</strong></label>
                <input type="text" class="form-control" value="{{ $policies->policy_duration }}" name="policy_duration"
                    placeholder="Enter Policy Duration">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>




@stop
