<!-- resources/views/claims/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container border">
        <h1 class="display-6">Create Claim </h1>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('claims.store') }}">
            @csrf

            <div class="form-group py-2">
                <label for="policy_id">Choose your Policy </label>
                <select name="policy_id" id="policy_id" class="form-control">
                    @foreach ($policies as $policy)
                        <option value="{{ $policy->id }}">{{ $policy->policy_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group py-2">
                <label for="description">Reason for the Claim</label>
                <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="form-group py-2">
                <label for="incident_date">Incident Date</label>
                <input id="incident_date" type="date" name="incident_date" class="form-control" required>
            </div>

            <div class="form-group py-2">
                <label for="claim_type">Claim Type</label>
                <input id="claim_type" type="text" name="claim_type" class="form-control" required>
            </div>

            <div class="form-group py-2">
                <label for="claim_amount">Claim Amount</label>
                <input id="claim_amount" type="number" name="claim_amount" class="form-control" required>
            </div>
            <div class="text-center py-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
