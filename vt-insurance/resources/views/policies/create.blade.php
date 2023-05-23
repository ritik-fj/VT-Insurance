@extends('layouts.master')
@section('title', 'Create Policy')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Create New Policies</h1>
            </div>
            <div class="float-end p-2">
                <a class="btn btn-success " href="{{ route('managepolicies') }}"> Back</a>
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
        <form class="lead" action="{{ route('policies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Type</strong></label>
                <input type="text" class="form-control" name="policy_type" placeholder="Enter Policy Name">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Coverage Amount</strong></label>
                <input type="text" class="form-control" id="coverage_amount" name="coverage_amount"
                    placeholder="Enter Coverage Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Premium Amount</strong></label>
                <input type="text" class="form-control" id="premium_amount" name="premium_amount"
                    placeholder="Enter Policy Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Excess Amount</strong></label>
                <input type="text" class="form-control" id="excess_amount" name="excess_amount"
                    placeholder="Enter Excess Amount">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Duration</strong></label>
                <input type="text" class="form-control" name="policy_duration" placeholder="Enter Policy Duration">
            </div>
            <div class="mb-3">
                <label class="form-label"> <strong>Description</strong></label>
                <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#coverage_amount, #premium_amount, #excess_amount').on('input', function() {
                var coverage_amount = parseFloat($('#coverage_amount').val());
                var premium_amount = parseFloat($('#premium_amount').val());
                var excess_amount = parseFloat($('#excess_amount').val());
                var premium_rate = 0.05; // 5%
                var excess_rate = 0.02; // 2%

                if (isNaN(coverage_amount)) {
                    coverage_amount = 0;
                }

                if (isNaN(premium_amount)) {
                    premium_amount = 0;
                }

                if (isNaN(excess_amount)) {
                    excess_amount = 0;
                }

                if ($(this).attr('id') === 'coverage_amount') {
                    premium_amount = coverage_amount * premium_rate;
                    excess_amount = coverage_amount * excess_rate;
                    $('#premium_amount').val(premium_amount.toFixed(2));
                    $('#excess_amount').val(excess_amount.toFixed(2));
                }

                if ($(this).attr('id') === 'premium_amount') {
                    coverage_amount = premium_amount / premium_rate;
                    excess_amount = coverage_amount * excess_rate;
                    $('#coverage_amount').val(coverage_amount.toFixed(2));
                    $('#excess_amount').val(excess_amount.toFixed(2));
                }

                if ($(this).attr('id') === 'excess_amount') {
                    coverage_amount = excess_amount / excess_rate;
                    premium_amount = coverage_amount * premium_rate;
                    $('#coverage_amount').val(coverage_amount.toFixed(2));
                    $('#premium_amount').val(premium_amount.toFixed(2));
                }
            });
        });
    </script>

@stop
