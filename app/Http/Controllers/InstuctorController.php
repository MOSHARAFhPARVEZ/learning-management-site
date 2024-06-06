<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstuctorController extends Controller
{
    public function InstuctorDashboard(){
        return view('instuctor.index');
    }//end method

    public function InstuctorProfile(){
        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('instuctor.profile',compact('profiledata'));
    }//end method

    public function InstuctorProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('uploads/instuctor_img/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/instuctor_img/'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return back()->with('success','You Successfully Upload Profile Picture');
    }//end method


    public function Instuctorlogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instuctor/login');
    }//end method


    public function InstuctorChangePassword(){
        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('instuctor.instuctor_cng_password',compact('profiledata'));
    } //end method


    public function InstuctorPasswordUpdate(Request $request){

        // error part
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password , Auth::user()->password)) {
            return back()->with('error','Old Password Does not Match');
        }
        // error part

        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return back()->with('success','Your Password Successfully Change');

    } //end method


    public function InstuctorLogin(){
        return view('instuctor.instuctor_login');
    } //end method


}
