<?php

namespace App\Http\Controllers;

use App\Models\Smtpsetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function AdminSettingSmtp(){

        $smtp = Smtpsetting::find(1);
        return view('admin.backend.settings.smtppart',compact('smtp'));

    } //end method

    public function AdminSmtpUpdate(Request $request){

        $smtp_id = $request->id;

        Smtpsetting::find($smtp_id)->update([

            'mailer' =>$request->mailer,
            'host' =>$request->host,
            'port' =>$request->port,
            'username' =>$request->username,
            'password' =>$request->password,
            'encryption' =>$request->encryption,
            'from_address' =>$request->from_address,
            'updated_at' =>Carbon::now(),
        ]);

        return back()->with('success','SMTP Info Successfully Updated');

    } //end method



}
