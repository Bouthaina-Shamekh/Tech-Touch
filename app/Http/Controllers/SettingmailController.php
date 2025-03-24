<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SettingMail;
use Illuminate\Http\Request;

class SettingmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingsmail  = SettingMail::first();
        if (!$settingsmail) {
            $settingsmail = SettingMail::create([
                'mail_mailer' => 'smtp',
                'mail_host' => 'smtp.gmail.com',
                'mail_port' => 587,
                'mail_username' => '',
                'mail_password' => '',
                'mail_encryption' => 'tls',
                'mail_from_address' => 'example@gmail.com',
                'mail_from_name' => 'Default Name',
            ]);
        }
        return view('dashboard.setting.settingmail', compact('settingsmail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required|integer',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
        ]);
        $settingsmail = SettingMail::first();
        $settingsmail->update($request->all());

        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('config:cache');

        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح!');
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
