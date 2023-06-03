@extends('layouts.master')
@section('title', 'Notifications')

@section('content')
    <div class="row p-4">
        <div class="col-lg-12 margin-tb"></div>
    </div>
    <div class="container">
        <div>
            <h1 class="display-6">Notifications</h1>
        </div>
        <hr>

        @if ($notifications->isEmpty())
            <p>No notifications available.</p>
        @else
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        <span class="badge bg-secondary">{{ $notification->created_at->format('Y-m-d') }}</span>
                        <span class="badge bg-info">{{ $notification->created_at->format('H:i:s') }}</span>
                        : {{ $notification->message }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@stop
