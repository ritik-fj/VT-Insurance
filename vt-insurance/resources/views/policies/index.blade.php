@extends('layouts.master')
@section('title', 'Policies')


@section('content')

    <div class="row">
        <div class="col">
            <div class="float-start">
                <h2>View All Policies</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('policies.create') }}"> Create New Policy</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <hr class="featurette-divider">
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Policy Name</th>
                    <th scope="col">Policy Coverage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr>
                        <td>{{ $policy->policy_name }}</td>
                        <td>{{ $policy->policy_coverage }}</td>
                        <td>
                            <form action="{{ route('policies.destroy', $policy->id) }}"" method="POST">
                                <a class="btn btn-info" href="{{ route('policies.show', $policy->id) }}"> Show</a>
                                <a class="btn btn-primary" href="{{ route('policies.edit', $policy->id) }}"> Edit</a>
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
