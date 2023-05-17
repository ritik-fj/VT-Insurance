@extends('layouts.master')
@section('title', ' View CLaims')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Your Claims</h1>
            </div>
            <div class="px-5">
                <a href="{{ route('customers.pdf') }}" target="_blank" class="btn btn-success float-end">Download Claims
                    Report</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="p-2">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    <hr class="featurette-divider">
    <div class="">

    </div>

    <div class="container ">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">

                <div class="float-start">
                    <a class="btn btn-success" href="{{ route('claims.create') }}"> Create New Claim</a>
                </div>

            </div>
        </div>

        <table class="table table-bordered bg-white mt-3">
            <thead class="thead-dark">
                <tr class="lead">

                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Incident Date</th>
                    <th scope="col">Claim Type</th>
                    <th scope="col">Claim Amount</th>
                    <th scope="col">Date of Claim</th>
                    <th scope="col">Status</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($claims as $claim)
                    <tr class="lead">
                        <td>{{ $claim->id }}</td>
                        <td>{{ $claim->description }}</td>
                        <td>{{ $claim->incident_date }}</td>
                        <td>{{ $claim->claim_type }}</td>
                        <td>{{ $claim->claim_amount }}</td>
                        <td>{{ $claim->created_at }}</td>
                        <td class="bg-info">{{ $claim->status }}</td>
                        <td class="">

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
