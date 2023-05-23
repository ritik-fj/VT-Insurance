@extends('layouts.master')
@section('title', " $customer->fname's Policies")


@section('content')
    <div class="row px-4">
        <div class="col-lg-12 margin-tb">

            <div class="float-end">
                <a class="btn btn-success" href="{{ route('admin.managecustomers') }}">Back to Dashboard</a>
            </div>

        </div>
    </div>
    <div class="container">
        <h1>{{ $customer->fname }} {{ $customer->lname }}'s Policies</h1>
        <hr>
        @if ($message = Session::get('success'))
            <div class="p-2">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($policies->count() > 0)
            <div class="table-responsive">
                <div class="float-end my-2">
                    <a href="{{ route('admin.assignpolicy', ['id' => $customer->id]) }}" class="btn btn-primary">Assign New
                        Policy</a>
                </div>
                <table class="table table-bordered table-hover	bg-white">
                    <thead>
                        <tr>
                            <th>Policy ID</th>
                            <th>Policy Type</th>
                            <th>Coverage Amount</th>
                            <th>Premium Amount</th>
                            <th>Excess Amount</th>
                            <th>Policy Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($policies as $policy)
                            <tr>
                                <td>{{ $policy->id }}</td>
                                <td>{{ $policy->policy_type }}</td>
                                <td>${{ $policy->coverage_amount }}</td>
                                <td>${{ $policy->premium_amount }}</td>
                                <td>${{ $policy->excess_amount }}</td>
                                <td>{{ $policy->policy_duration }}</td>
                                <td class="text-center">
                                    <form action="{{ route('customer_policy.destroy', ['id' => $policy->id]) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Are you sure you want to delete this policy for the customer?')"
                                            type="submit" class="btn btn-danger btn-sm">Delete</button>

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

            <div class="row ">
                <div class="col-5">
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
                                <td><strong>Total Premium Amount: (Before Discount)</strong></td>
                                <td>${{ $totalPremiumAmount }}</td>
                            </tr>
                            <tr style="background-color: rgb(120, 233, 120);">
                                <td><strong>Total Premium Amount: (After Discount)</strong></td>
                                <td>${{ $discountedpremium }}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p>No policies found for this customer.</p>
        @endif


    </div>
@stop
