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
        <table class="table table-bordered bg-white border-dark">
            <thead>
                <tr>
                    <th>Policy ID</th>
                    <th>Policy Type</th>
                    <th>Coverage Amount</th>
                    <th>Premium Amount</th>
                    <th>Policy Duration</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr class="table  border-dark">
                        <td>{{ $policy->policy_id }}</td>
                        <td>{{ $policy->policy_type }}</td>
                        <td>{{ $policy->coverage_amount }}</td>
                        <td>{{ $policy->premium_amount }}</td>
                        <td>{{ $policy->policy_duration }}</td>
                        <td class="text-center">

                            <a href="{{ route('request.create', $policy->id) }}" class="btn btn-primary">Request
                                Change</a>


                        </td>
                        <td class="text-center">
                            @if ($policy->premium_amount == 0)
                                <button type="button" class="btn btn-success" disabled>Pay Premium</button>
                            @else
                                <a href="#" class="btn btn-success">Pay Premium</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@stop
