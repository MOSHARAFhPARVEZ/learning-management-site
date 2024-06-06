<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogin(){
        return view('admin.admin_login');
    } //end method


    public function AdminDashboard(){
        return view('admin.index');
    } //end method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('admin.prfile_view',compact('profiledata'));
    } //end method


    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('admin.admin_cng_password',compact('profiledata'));
    } //end method


    public function AdminPasswordChange(Request $request){
        // error part
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with('error','Old Password Does not Match');
        }
        // error part
        // passwoerd change
        User::find(auth::user()->id)->update([
                'password'=> Hash::make($request->new_password)
        ]);
        return back()->with('success','Your Password Successfully Change');
        // passwoerd change

    } //end method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('uploads/admin_img/'.$data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_img'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        return back()->with('success','You Successfully Upload Profile Info');

    } //end method


    public function Adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } //end method









}
