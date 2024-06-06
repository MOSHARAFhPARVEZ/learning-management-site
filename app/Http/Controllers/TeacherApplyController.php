<?php

namespace App\Http\Controllers;

use App\Models\ApplyTeacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherApplyController extends Controller
{
    public function TeacherApply(){
        return view('frontend.teacherapply.teacherapply');
    }//end method


    public function TeacherApplyStore(Request $request){
        // error part
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'address' =>'required',
            'phone' =>'required',
        ]);
        // error part

            ApplyTeacher::insert([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
            ]);

        return back()->with('success','You Successfully Sent Your Info');

    }//end method

    public function IndexApply(){
        $applyinstuctor = ApplyTeacher::latest()->get();
        return view('admin\backend\instructor\index',compact('applyinstuctor'));
    } //end method

    public function AddAsInstuctor($id){
        $applyinstuctor = ApplyTeacher::find($id);
        return view('admin\backend\instructor\create',compact('applyinstuctor'));
    } //end method


    public function StoreInstuctor(Request $request){
        // error part
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        // error part

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'instuctor',
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','You Successfully Add A Instuctor');
    } //end method



    public function AllInstuctor(){
        $instuctors = User::where('role','instuctor')->latest()->get();
        return view('admin\backend\instructor\show',compact('instuctors'));
    } //end method



    public function InactiveInstuctor($id){

        User::find($id)->update([
            'status'=>'0',
        ]);

        return back()->with('success','You Successfully Update Instuctor Status');
    } //end method

    public function ActiveInstuctor($id){

        User::find($id)->update([
            'status'=>'1',
        ]);

        return back()->with('success','You Successfully Update Instuctor Status');

    } //end method


}
