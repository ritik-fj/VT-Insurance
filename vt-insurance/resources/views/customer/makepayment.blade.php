<!-- resources/views/claims/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-8">
                <h1 class="display-6">Make Payment</h1>
                <hr>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="container border">
                    <form method="POST" action="{{ route('payment.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group py-2">
                            <label for="policy_id">ID:</label>
                            <input id="policy_id" type="number" value="{{ $id }}" name="policy_id"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group py-2">
                            <label for="amount_paid">Enter Amount:</label>
                            <input id="amount_paid" type="text" name="amount_paid" class="form-control" required>
                        </div>

                        <div class="text-center py-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
