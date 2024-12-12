<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\User;
use App\Mail\SendMail;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Events\ContacMessageEvent;
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

       // dd($request->all());
       $data = $request->except('_token');
        Mail::to('contactus@gmail.com')->send(new ContactUs($data));

        $users = User::where('type', 'admin')->get();
        Notification::send($users,new ContactNotification(
        $request->name,
        $request->email,
        $request->phone,
        $request->message));

        foreach ($users as $user) {
            ContacMessageEvent::dispatch($user->id,'contact_us');
        }



        return redirect()->route('site.contact')->with('success', __('Item updated successfully.'));


    }
}
