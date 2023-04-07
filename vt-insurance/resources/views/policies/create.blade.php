@extends('layouts.master')
@section('title', 'Create Policy')

@section('content')
    <div class="row">
        <div class="col">
            <div class="float-start px-4 pt-2">
                <h1 class="display-4">Create New Policies</h1>
            </div>
            <div class="float-end p-2">
                <a class="btn btn-success " href="{{ route('policies.index') }}"> View All Policy</a>
            </div>
        </div>
    </div>

    <div class="container p-5 my-3 border">
        @if ($errors->any())
            <div class="alert alert-danger lead">
                <strong>Whoops</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="lead" action="{{ route('policies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label"> <strong> Policy Name</strong></label>
                <input type="text" class="form-control" name="policy_name" placeholder="Enter Policy Name">
            </div>
            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="collisionCover" name="CollisionCover" value="Yes">
                <label class="form-check-label" for="collisionCover">Collision Cover</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="fireDamage" name="fireDamage" value="Yes">
                <label class="form-check-label" for="fireDamage">Fire Damage</label>
            </div> --}}


            <div class="mb-3">
                <label class="form-label"> <strong>Policy Coverage</strong></label>
                <textarea class="form-control" rows="5" name="policy_coverage" placeholder="Enter Policy Coverage"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>




@stop
