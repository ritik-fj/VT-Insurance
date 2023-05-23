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
                    <th></th>

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
                        <td class="text-center">
                            {{-- <a class="btn btn-info " href="{{ route('policies.show', $policy->id) }}"> Show</a> --}}
                            <a class="btn btn-success " href="{{ route('request.approve', $request->id) }}"
                                onclick="return confirm('Are you sure you want to APPROVE this request?')"> Approve</a>
                            <a class="btn btn-danger " href="{{ route('request.reject', $request->id) }}"
                                onclick="return confirm('Are you sure you want to REJECT this request?')"> Reject</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@stop
