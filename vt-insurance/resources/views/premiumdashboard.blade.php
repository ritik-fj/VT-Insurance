@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Premiums</h1>
            </div>

        </div>
    </div>




    <hr class="featurette-divider">
    <div class="container ">






        <table class="table table-bordered mt-2">
            <thead class="thead-dark">
                <tr class="lead">
                    <th scope="col">Policy ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Policy Type</th>
                    <th scope="col">Premium Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($premiums as $premium)
                    <tr class="lead">
                        <td>{{ $premium->id }}</td>
                        <td>{{ $premium->customer_fname }} {{ $premium->customer_lname }}</td>
                        <td>{{ $premium->policy_type }}</td>
                        <td>{{ $premium->premium_amount }}</td>
                        <td class="text-center">
                            <a href="{{ route('editpremium', $premium->id) }}" class="btn btn-primary m-1">Edit Premium</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
