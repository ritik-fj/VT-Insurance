@extends('layouts.master')
@section('title', " $customer->customer_fname's Policies")


@section('content')
    <div class="row p-4">
        <div class="col-lg-12 margin-tb">

            <div class="float-start">
                <a class="btn btn-success" href="{{ route('customers.show', $customer->id) }}">Back</a>
            </div>

        </div>
    </div>
    <div class="container">
        <h1>{{ $customer->customer_fname }} {{ $customer->customer_lname }}'s Policies</h1>

        @if ($message = Session::get('success'))
            <div class="p-2">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($policies->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Policy ID</th>
                        <th>Policy Type</th>
                        <th>Coverage Amount</th>
                        <th>Premium Amount</th>
                        <th>Policy Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($policies as $policy)
                        <tr>
                            <td>{{ $policy->id }}</td>
                            <td>{{ $policy->policy_type }}</td>
                            <td>{{ $policy->coverage_amount }}</td>
                            <td>{{ $policy->premium_amount }}</td>
                            <td>{{ $policy->policy_duration }}</td>
                            <td>
                                <form
                                    action="{{ route('customer_policy.destroy', ['customer_id' => $customer->id, 'policy_id' => $policy->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Are you sure you want to delete this policy for the customer?')"
                                        type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No policies found for this customer.</p>
        @endif
        <div class="text-center">
            <a href="{{ route('customers.assign-policy', ['customer_id' => $customer->id]) }}"
                class="btn btn-primary">Assign
                Policy</a>
        </div>

    </div>
@stop
