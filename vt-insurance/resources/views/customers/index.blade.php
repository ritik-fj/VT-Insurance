@extends('layouts.master')
@section('title', ' View Customers')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">All Customers</h1>
            </div>
            <div class="px-5">
                <a href="{{ route('customers.pdf') }}" target="_blank" class="btn btn-success float-end">Download Customers
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
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a>
                </div>
                <form class="float-end" action="{{ route('customers.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $searchTerm }}"
                            placeholder="Search by customer name..." style="max-width: 300px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary mx-1"
                            onclick="window.location='{{ route('customers.index') }}'">Show All</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered bg-white mt-3">
            <thead class="thead-dark">
                <tr class="lead">

                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="lead">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_fname }}</td>
                        <td>{{ $customer->customer_lname }}</td>
                        <td class="">
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                <a class="btn btn-sm btn-info " href="{{ route('customers.show', $customer->id) }}">
                                    Show</a>

                                <a href="{{ route('customers.assign-policy', ['customer_id' => $customer->id]) }}"
                                    class="btn btn-sm btn-primary">Assign
                                    Policy</a>

                                <a href="{{ route('customers.policies_info', ['customer_id' => $customer->id]) }}"
                                    class="btn btn-sm btn-primary">View Policies</a>


                                <a class="btn btn-sm btn-primary " href="{{ route('customers.edit', $customer->id) }}">
                                    Edit</a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this customer?')"
                                    type="submit" class="btn  btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
