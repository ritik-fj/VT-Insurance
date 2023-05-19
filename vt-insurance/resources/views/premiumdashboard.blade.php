@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Active Policies</h1>
            </div>

        </div>
    </div>




    <hr class="featurette-divider">
    <div class="container ">






        <table class="table table-bordered border-dark mt-2">
            <thead class="thead-dark">
                <tr class="lead">
                    <th scope="col">Policy ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Policy Type</th>
                    <th scope="col">Coverage Amount</th>
                    <th scope="col">Premium Amount</th>
                    <th scope="col">Excess Amount</th>
                    <th scope="col">Policy Duration</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($premiums as $premium)
                    <tr class="lead">
                        <td>{{ $premium->id }}</td>
                        <td>{{ $premium->customer_fname }} {{ $premium->customer_lname }}</td>
                        <td>{{ $premium->policy_type }}</td>
                        <td>{{ $premium->coverage_amount }}</td>
                        <td>{{ $premium->premium_amount }}</td>
                        <td>{{ $premium->excess_amount }}</td>
                        <td>{{ $premium->policy_duration }}</td>
                        <td class="text-center">
                            <a href="{{ route('editpremium', $premium->id) }}" class="btn btn-primary m-1">Edit Policy</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
