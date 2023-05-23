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
                    {{-- <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a> --}}
                </div>
                <form class="float-end" action="{{ route('admin.managecustomers') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $searchTerm }}"
                            placeholder="Search by customer name..." style="max-width: 300px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-secondary mx-1"
                            onclick="window.location='{{ route('admin.managecustomers') }}'">Show All</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-hover table-bordered border-dark bg-white mt-3">
            <thead class="thead-dark">
                <tr class="lead">

                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="lead">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->fname }}</td>
                        <td>{{ $customer->lname }}</td>
                        <td class="text-center">
                            <a href="{{ route('customer.viewpolicies', ['id' => $customer->id]) }}"
                                class="btn btn-sm btn-primary">View
                                Policies History</a>
                            <a href="{{ route('admin.assignpolicy', ['id' => $customer->id]) }}"
                                class="btn btn-sm btn-primary">Assign
                                Policy</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                <a class="btn btn-sm btn-info " href="{{ route('customer.show', $customer->id) }}">
                                    Show</a>

                                <a class="btn btn-sm btn-primary " href="{{ route('customer.edit', $customer->id) }}">
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
