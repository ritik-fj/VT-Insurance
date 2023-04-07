@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start px-5">
                <h1 class="display-6">Our Policies</h1>
            </div>
            <div class="float-end px-5">
                <a class="btn btn-success" href="{{ route('policies.create') }}"> Create New Policy</a>
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
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr class="lead">
                    <th scope="col">Policy Name</th>
                    <th scope="col">Policy Coverage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr class="lead">
                        <td>{{ $policy->policy_name }}</td>
                        <td>{{ $policy->policy_coverage }}</td>
                        <td class="">
                            <form action="{{ route('policies.destroy', $policy->id) }}" method="POST">
                                <a class="btn btn-info " href="{{ route('policies.show', $policy->id) }}"> Show</a>
                                <a class="btn btn-primary " href="{{ route('policies.edit', $policy->id) }}"> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
