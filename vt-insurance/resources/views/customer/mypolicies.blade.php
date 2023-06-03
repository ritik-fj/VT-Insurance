@extends('layouts.master')
@section('title', ' Policies')


@section('content')
    <div class="row p-4">
        <div class="col-lg-12 margin-tb"></div>
    </div>
    <div class="container">
        <div>
            <h1 class="display-6">My Policies</h1>
        </div>
        <hr>
        <table class="table table-bordered table-hover bg-white border-dark">
            <thead>
                <tr>
                    <th>Policy ID</th>
                    <th>Policy Type</th>
                    <th>Coverage Amount</th>
                    <th>Premium Amount</th>
                    <th>Policy Duration</th>
                    <th>Excess Amount</th>
                    <th>Balance</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr class="table  border-dark">
                        <td>{{ $policy->policy_id }}</td>
                        <td>{{ $policy->policy_type }}</td>
                        <td>${{ $policy->coverage_amount }}</td>
                        <td>${{ $policy->premium_amount }}</td>
                        <td>{{ $policy->policy_duration }}</td>
                        <td>${{ $policy->excess_amount }}</td>
                        <td>${{ $policy->balance }}</td>

                        <td class="text-center">

                            <a href="{{ route('request.create', $policy->id) }}" class="btn btn-primary">Request
                                Change</a>

                        </td>
                        <td class="text-center">
                            @if ($policy->premium_amount == 0)
                                <a type="button" href="{{ route('customer.makepayment', $policy->id) }}"
                                    class="btn btn-success">Pay Premium</button>
                                @else
                                    <a type="button" href="{{ route('customer.makepayment', $policy->id) }}"
                                        class="btn btn-success">Pay Premium</button>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <table class=" table table-bordered table-hover bg-white">
                    <tbody>
                        <tr style="background-color: lightblue;">
                            <td><strong>Total Coverage Amount:</strong></td>
                            <td>${{ $totalCoverageAmount }}</td>
                        </tr>
                        <tr style="background-color: lightblue;">
                            <td><strong>Total Excess Amount:</strong></td>
                            <td>${{ $totalExcessAmount }}</td>
                        </tr>
                        <tr style="background-color: rgb(230, 173, 173);">
                            <td><strong>Total Premium Amount (Without Discount):</strong></td>
                            <td>${{ $totalPremiumAmount }}</td>
                        </tr>
                        <tr style="background-color: rgb(120, 233, 120);">
                            <td><strong>Total Premium Amount (With Discount):</strong></td>
                            <td>${{ $discountedpremium }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col"></div>
        </div>
    </div>
@stop
