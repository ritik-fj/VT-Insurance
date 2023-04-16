@extends('layouts.master')
@section('title', ' View Customers')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">All Customers</h1>
            </div>
            <div class="px-5">
                <a href="{{ route('customers.pdf') }}" target="_blank" class="btn btn-primary float-end">Generate PDF</a>

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
        <div class="float-end pb-2">
            <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer</a>
        </div>
        <table class="table table-bordered bg-white">
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
                                <a class="btn btn-info " href="{{ route('customers.show', $customer->id) }}"> Show</a>


                                <a href="{{ route('customers.policies_info', ['customer_id' => $customer->id]) }}"
                                    class="btn btn-primary">View Policies</a>


                                <a class="btn btn-primary " href="{{ route('customers.edit', $customer->id) }}">
                                    Edit</a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this customer?')"
                                    type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
