<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function clearAllNotifications(Request $request){
        Notification::where('notifiable_id', auth()->user()->id)->delete();
        return redirect()->back();
    }
}
