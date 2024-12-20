<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        return redirect('/admin/login')->with('success','You Successfully LogOut');
    } //end method


    public function AdminCourseIndex()
    {
        $courses = Course::latest()->get();
        return view('admin.backend.courses.index',compact('courses'));
    } //end method


    public function AdminCourseDetails($id)
    {
        $courses = Course::find($id);

        return view('admin.backend.courses.details',compact('courses'));
    } //end method



    public function AdminInactiveCourse($id)
    {

        Course::find($id)->update([
            'status'=>'0',
        ]);

        return back()->with('success','You Successfully Inactive This Course');


    } //end method


    public function AdminActiveCourse($id)
    {

        Course::find($id)->update([
            'status'=>'1',
        ]);

        return back()->with('success','You Successfully Active This Course');


    } //end method


    ////////////////////////////////////////////////////////////////////////////
    ///////////---> All  ADMIN <---//////////---> All ADMIN <---////////////////
    ////////////////////////////////////////////////////////////////////////////


    public function AllAdmin(){

        $allAdmin = User::where('role','admin')->get();
        return view('admin.backend.admin.index',compact('allAdmin'));

    } // end method


    public function CreateAdmin(){

        $roles = Role::all();
        return view('admin.backend.admin.create',compact('roles'));

    } // end method


    public function AdminStore(Request $request){

        // error part
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        // error part

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->created_at = Carbon::now();
        $user->save();

        $role = Role::find($request->role);

        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('all.admin')->with('success','Successfully Added');

    } // end method


    public function AdminEdit($id){

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.backend.admin.edit',compact('user','roles'));

    } // end method


    public function AdminUpdate(Request $request , $id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->updated_at = Carbon::now();
        $user->save();

        $role = Role::find($request->role);
        $user->roles()->detach();

        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('all.admin')->with('success','Successfully Added');

    } // end method


    public function AdminDestroy($id){

        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        return redirect()->route('all.admin')->with('success','Successfully Deleted');

    } // end method





}
