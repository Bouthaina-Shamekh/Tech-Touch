<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
 use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index()
    {

        return view('dashboard.index');
    }


    public function notificationsIndex()
    {
        return view('dashboard.notifications.index');
    }





    public function show($id)
    {

        $notification = Notification::withTrashed()->findOrFail($id);
        $notificationData = $notification->data;

        return view('dashboard.notifications.show', compact('notification', 'notificationData'));
    }


    public function clearAllNotifications(Request $request)
   {

    Notification::where('notifiable_id', auth()->user()->id)
        ->whereNull('deleted_at')
        ->update(['deleted_at' => now()]);

    return redirect()->back();
  }
}
