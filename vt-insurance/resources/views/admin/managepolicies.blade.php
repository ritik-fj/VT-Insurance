@extends('layouts.master')
@section('title', ' Manage Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Manage Policies</h1>
            </div>
            <div class="float-end px-5">
                <a href="{{ route('policies.pdf') }}" target="_blank" class="btn btn-success float-end">Download Policies
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
    <div class="container ">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">

                <a class="btn btn-success float-start" href="{{ route('policies.create') }}"> Create New Policy</a>

                <form class="float-end" action="{{ route('managepolicies') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control " name="policy_type" value="{{ $searchTerm }}"
                            placeholder="Search by policy type..." style="max-width: 200px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary mx-1"
                            onclick="window.location='{{ route('managepolicies') }}'">Show All</button>
                    </div>

                </form>
            </div>
        </div>

        <table class="table table-bordered border-dark table-hover mt-2">
            <thead class="thead-dark">
                <tr class="lead">
                    <th scope="col">Policy Type</th>
                    {{-- <th scope="col">Coverage Amount</th>
                    <th scope="col">Premium Amount</th>
                    <th scope="col">Excess Amount</th>
                    <th scope="col">Policy Duration</th> --}}
                    <th scope="col">Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr class="lead">
                        <td>{{ $policy->policy_type }}</td>
                        {{-- <td>{{ $policy->coverage_amount }}</td>
                        <td>{{ $policy->premium_amount }}</td>
                        <td>{{ $policy->Excess_amount }}</td>
                        <td>{{ $policy->policy_duration }}</td> --}}
                        <td style="word-break: break-word; max-width: 200px;">{{ $policy->description }}</td>
                        <td class="text-center">
                            <form action="{{ route('policies.destroy', $policy->id) }}" method="POST">
                                <a class="btn btn-info " href="{{ route('policies.show', $policy->id) }}"> Details</a>
                                <a class="btn btn-primary " href="{{ route('policies.edit', $policy->id) }}">
                                    Edit</a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this policy?')"
                                    type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
