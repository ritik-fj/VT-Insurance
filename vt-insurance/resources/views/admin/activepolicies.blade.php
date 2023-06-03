@extends('layouts.master')
@section('title', 'Customer Detail')


@section('content')
    <div class="row px-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('admin.managecustomers') }}">Back to Dashboard</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-6">Active Policies</h1>
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col">
                <form class="float-end" action="{{ route('activepolicies') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}"
                            placeholder="Customer ID/Policy Type" style="max-width: 300px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary mx-1"
                            onclick="window.location='{{ route('activepolicies') }}'">Show All</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                @if ($message = Session::get('success'))
                    <!-- Success message -->
                    <div class="p-2">
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                @endif

                @if ($policies->count() > 0)
                    <!-- Policy table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover border-dark bg-white">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th>Policy ID</th>
                                    <th>Customer ID</th>
                                    <th>Policy Type</th>
                                    <th>Coverage Amount</th>
                                    <th>Premium Amount</th>
                                    <th>Excess Amount</th>
                                    <th>Policy Duration</th>
                                    <th>Balance</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($policies as $policy)
                                    <tr>
                                        <td>{{ $policy->id }}</td>
                                        <td>{{ $policy->customer_id }}</td>
                                        <td>{{ $policy->policy_type }}</td>
                                        <td>${{ $policy->coverage_amount }}</td>
                                        <td>${{ $policy->premium_amount }}</td>
                                        <td>${{ $policy->excess_amount }}</td>
                                        <td>{{ $policy->policy_duration }}</td>
                                        <td>${{ $policy->balance }}</td>


                                        <td class="text-center">
                                            <!-- Delete policy form -->
                                            <form action="{{ route('customer_policy.destroy', ['id' => $policy->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure you want to delete this policy for the customer?')"
                                                    type="submit" class="btn btn-danger btn-sm">Delete</button><br>
                                            </form>
                                            <a href="{{ route('customer_policy.edit', $policy->id) }}"
                                                class="btn btn-primary m-1">Edit Policy</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                @else
                    <p>No policies found for this search criteria.</p>
                @endif
            </div>
        </div>


    </div>
@stop
