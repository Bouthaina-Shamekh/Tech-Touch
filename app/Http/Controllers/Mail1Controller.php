<?php

namespace App\Http\Controllers;

use App\Events\ConsultationMessageEvent;
use App\Models\Hero;
use App\Models\User;
use App\Mail\SendMail;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Events\ContacMessageEvent;
use App\Mail\ConsultationMail;
use App\Notifications\ConsultationNotification;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;

class MailController extends Controller
{




    public function send()
    {
        Mail::to('bou@gmail.com')->send(new SendMail());
        return 'Done';
    }




    public function contact(){
        $abouts = Hero::where('section', 'About')
                    ->first();
        return view('site.contact', compact('abouts'));
    }

    public function contact_data(Request $request){

        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',

        ]);
        try {
            // dd($request->all());
            $data = $request->except('_token');
            Mail::to('contactus@gmail.com')->send(new ContactUs($data));

            $users = User::where('type', 'admin')->get();
            Notification::send($users,new ContactNotification(
                $request->name,
                $request->email,
                $request->phone,
                $request->message,
                'contact'
            ));

            foreach ($users as $user) {
                ContacMessageEvent::dispatch($user->id,'contact_us');
            }

        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->back()->with('successSend', true);
    }

    public function consultation(){
        return view('site.free_consultation');
    }


    public function consultation_data(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        try {
            $data = $request->except('_token');
            Mail::to('contactus@gmail.com')->send(new ConsultationMail($data));

            $users = User::where('type', 'admin')->get();
            Notification::send($users,new ConsultationNotification(
                $request->first_name,
                $request->last_name,
                $request->email,
                $request->phone,
                'consultation'
            ));

            foreach ($users as $user) {
                ConsultationMessageEvent::dispatch($user->id,$data,'consultation');
            }

        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->back()->with('successSend', true);
    }
}