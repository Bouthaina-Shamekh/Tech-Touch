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
use App\Models\Visit;
use App\Models\Work;
use Carbon\Carbon;

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

        // $visits = Visit::;
        $days = Visit::select('date')->distinct()->pluck('date')->toArray();
        $daysVisits = collect($days)->map(function ($day) {
            return [
                "count" => Visit::where("date", "=", $day)->count(),
                'date' => $day
            ];
        });
        $daysVisits = $daysVisits->pluck('count')->toArray();


        $months = [];
        foreach ($days as $day) {
            $month = Carbon::parse($day)->format('Y-m');
            if (!in_array($month, $months)) {
                $months[] = $month;
            }
        }
        $months = array_values($months);

        $monthsVisitsArray = collect($months)->map(function ($month) {
            return [
                "count" => Visit::whereBetween("date", [$month . '-01', $month . '-31'])->count(),
                'month' => Carbon::parse($month)->format('M')
            ];
        });
        $monthsVisits = $monthsVisitsArray->pluck('count')->toArray();
        $months = $monthsVisitsArray->pluck('month')->toArray();
        return view('dashboard.index', compact('s_count','f_count','p_count','w_count','t_count','c_count','fe_count','u_count','daysVisits','days','monthsVisits','months'));
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
