<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function show()
    {
        $customer = Auth::id();

        $notifications = Notification::where('customer_id', $customer)->get();

        return view('customer.notifications', compact('notifications'));
    }
}
