<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // index page part start
    public function Index(){
        $categories = Category::latest()->limit(6)->get();
        return view('frontend.index',compact('categories'));
    } //end method
    // index page part end


    public function UserProfile(){
    $id = Auth::user()->id;
    $profiledata  = User::find($id);
        return view('frontend.dashboard.profile',compact('profiledata'));
    } //end method
    public function UserProfileChange(){
    $id = Auth::user()->id;
    $profiledata  = User::find($id);
        return view('frontend.dashboard.profile_change',compact('profiledata'));
    } //end method

    public function UserProfileUpdate(Request $request){

        $id = Auth::user()->id;
        $profiledata  = User::find($id);
        $profiledata->name = $request->name;
        $profiledata->username = $request->username;
        $profiledata->email = $request->email;
        $profiledata->address = $request->address;
        $profiledata->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('uploads/user_img/'.$profiledata->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_img'),$filename);
            $profiledata['photo'] = $filename;
        }
        $profiledata->save();
        return redirect()->route('user.profile.change')->with('success','You Successfully Upload Profile Info');

    } //end method

    public function UserLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    } //end logut method

    public function UserChangePassword(Request $request){

            $id = Auth::user()->id;
            $profiledata  = User::find($id);
            return view('frontend.dashboard.password_change',compact('profiledata'));
    } //end method


    public function UserUpdatePassword(Request $request){
        // error part
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password , Auth::user()->password)) {
            return back()->with('error','Your old Password Does Not Match');
        }
        // error part
        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('dashboard')->with('success','You Successfully Update Your Password');
    } //end method
}
