<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
 use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Feature;
use App\Models\File;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;

class HomeController extends Controller
{

    public function index()
    {
        $s_count = Service::count();
        $f_count = File::count();
        $p_count = Partner::count();
        $w_count = Work::count();
        $t_count = Team::count();
        $c_count = Client::count();
        $fe_count = Feature::count();
        $u_count = User::count();
       
        return view('dashboard.index', compact('s_count','f_count','p_count','w_count','t_count','c_count','fe_count','u_count'));
    }


    public function notificationsIndex()
    {
        $this->authorize('view', Notification::class);
        return view('dashboard.notifications.index');
    }





    public function show($id)
    {
        $this->authorize('view', Notification::class);
        $notification = Notification::withTrashed()->findOrFail($id);
        $notificationData = $notification->data;

        return view('dashboard.notifications.show', compact('notification', 'notificationData'));
    }


    public function clearAllNotifications(Request $request)
   {

    $this->authorize('delete', Notification::class);

    Notification::where('notifiable_id', auth()->user()->id)
        ->whereNull('deleted_at')
        ->update(['deleted_at' => now()]);

    return redirect()->back();
  }
}
