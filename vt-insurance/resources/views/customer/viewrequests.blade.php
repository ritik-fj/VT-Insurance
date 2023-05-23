@extends('layouts.master')
@section('title', ' Policies')


@section('content')
    <div class="row p-4">
        <div class="col-lg-12 margin-tb"></div>
    </div>
    <div class="container">
        <div>
            <h1 class="display-6">My Change Requests</h1>
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
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr class="table  border-dark">
                        <td>{{ $request->policy_id }}</td>
                        <td>{{ $request->policy_type }}</td>
                        <td>{{ $request->coverage_amount }}</td>
                        <td>{{ $request->premium_amount }}</td>
                        <td>{{ $request->policy_duration }}</td>
                        <td>{{ $request->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@stop
