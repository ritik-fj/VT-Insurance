@extends('layouts.master')
@section('title', ' View Customers')


@section('content')

    <h1 class="p-2 text-center display-6">Assign Policy to {{ $customer->fname }}
        {{ $customer->lname }}
    </h1>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-5">
            <div class="container mt-4 border">

                <form class="lead" method="POST" action="{{ route('assignpolicy') }}">
                    @csrf

                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                    <div class="">
                        <label class="form-label" for="policy_type"><strong>Policy Type</strong></label>
                        <select class="form-select" name="policy_type" id="policy_type">
                            @foreach ($policyTypes as $id => $policyType)
                                <option value="{{ $id }}">{{ $policyType }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-2 text-center">
                        <button class="btn btn-primary" type="submit">Assign Policy</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col">

        </div>

    </div>

@stop
