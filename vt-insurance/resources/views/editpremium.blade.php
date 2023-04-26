@extends('layouts.master')
@section('title', ' View Customers')


@section('content')

    <h1 class="display-6 mx-4">Customize Policy</h1>
    <hr>

    <div class="container p-5 my-3 border">
        @if ($errors->any())
            <div class="alert alert-danger lead">
                <strong>Whoops...</strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer_policies.update', $customerPolicy->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"> <strong>Premium Amount:</strong></label>
                <input type="number" class="form-control" value="{{ $customerPolicy->premium_amount }}" name="premium_amount"
                    placeholder="Enter Premium Amount">
            </div>

            <div class="mb-3">
                <label class="form-label"> <strong>Coverage Amount:</strong></label>
                <input type="number" step="any" class="form-control" value="{{ $customerPolicy->coverage_amount }}"
                    name="coverage_amount" placeholder="Enter Coverage Amount" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label"> <strong>Policy Duration:</strong></label>
                <input type="text" class="form-control" value="{{ $customerPolicy->policy_duration }}"
                    name="policy_duration" placeholder="Enter Policy Duration" readonly>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
@stop
