<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Mail\SendMail;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


    }
}
