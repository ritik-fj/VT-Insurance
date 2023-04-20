@extends('layouts.master')
@section('title', 'Our Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Our Policies</h1>
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
    <div class="container p-2">


        <div class="row justify-content-center align-items-center g-2">
            <div class="col">

                <form class="float-end" action="{{ route('policies.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control " name="policy_type" value="{{ $searchTerm }}"
                            placeholder="Search by policy type..." style="max-width: 200px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary mx-1"
                            onclick="window.location='{{ route('policies.index') }}'">Show All</button>
                    </div>

                </form>
            </div>
        </div>

        <table class="table table-bordered bg-white text-center mt-2">
            <thead class="thead-dark">
                <tr class="lead">
                    <th scope="col">Policy Type</th>
                    <th scope="col">Coverage Amount</th>
                    <th scope="col">Premium Amount</th>
                    <th scope="col">Policy Duration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr class="lead">
                        <td>{{ $policy->policy_type }}</td>
                        <td>${{ $policy->coverage_amount }}</td>
                        <td>${{ $policy->premium_amount }}</td>
                        <td>{{ $policy->policy_duration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
