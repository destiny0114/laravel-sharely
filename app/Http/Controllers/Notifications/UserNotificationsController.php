<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show(Request $request)
    {
        return view("notifications.show", [
            "notifications" => auth()->user()->notifications()->take(50)->paginate(10)
        ]);
    }
}
