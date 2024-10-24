<?php

namespace App\Http\Controllers;

use App\Models\Sitesetting;
use App\Models\Smtpsetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

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


    public function AdminSiteSettings(){

        $site = Sitesetting::find(1);
        return view('admin.backend.settings.sitesetting',compact('site'));

    } //end method


    public function AdminSiteUpdate(Request $request){


        $site_id = $request->id;
        $logo_update = Sitesetting::find($site_id);
        $img_path = public_path('uploads/logo/' . $logo_update->logo);

        if ($request->hasFile('logo')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($img_path)) {
                unlink($img_path);
            }
            $new_name = uniqid() . "." . $request->file('logo')->getClientOriginalExtension();
            $image = $manager->read($request->file('logo'))->resize(140,41);
            $image->toPng()->save(base_path('public/uploads/logo/'.$new_name));

            $logo_update->update([
                'logo' => $new_name,
                'updated_at' => Carbon::now(),
            ]);
        }


        $logo_update->update([
                'phone' =>$request->phone,
                'email' =>$request->email,
                'address' =>$request->address,
                'facebook' =>$request->facebook,
                'twitter' =>$request->twitter,
                'instragram' =>$request->instragram,
                'linkedin' =>$request->linkedin,
                'copyright' =>$request->copyright,
                'updated_at' => Carbon::now(),
            ]);

        return back()->with('success','Site Settings Info Successfully Updated');


    } //end method







}
