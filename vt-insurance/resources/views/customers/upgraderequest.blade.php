@extends('layouts.master')
@section('title', 'Create Policy')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Request Change</h1>
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
        <form class="lead" action="{{ route('request.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label"> <strong> Policy ID</strong></label>
                <input type="text" class="form-control" name="policy_id" value="{{ $policy->policy_id }}" readonly
                    placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong> Customer ID</strong></label>
                <input type="text" class="form-control" name="customer_id" value="{{ $policy->customer_id }}" readonly
                    placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Type</strong></label>
                <input type="text" class="form-control" name="policy_type" value="{{ $policy->policy_type }}" readonly
                    placeholder="Enter Policy Name">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Coverage Amount</strong></label>
                <input type="text" class="form-control" id="coverage_amount" value="{{ $policy->coverage_amount }}"
                    name="coverage_amount" placeholder="Enter Coverage Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Premium Amount</strong></label>
                <input type="text" class="form-control" id="premium_amount" name="premium_amount"
                    placeholder="Enter Policy Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Excess Amount</strong></label>
                <input type="text" class="form-control" id="excess_amount" name="excess_amount"
                    placeholder="Enter Policy Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Duration</strong></label>
                <input type="text" class="form-control" value="{{ $policy->policy_duration }}" name="policy_duration"
                    placeholder="Enter Policy Duration">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#coverage_amount').on('input', function() {
                var coverage_amount = $(this).val();
                var premium_rate = 0.05; // 5%
                var excess_rate = 0.02; // 2%

                var premium_amount = coverage_amount * premium_rate;
                var excess_amount = coverage_amount * excess_rate;

                $('#premium_amount').val(premium_amount.toFixed(2));
                $('#excess_amount').val(excess_amount.toFixed(2));
            });
        });
    </script>



@stop
