<?php

namespace App\Http\Controllers;

use App\Models\about_instuctor;
use App\Models\Aboutins;
use App\Models\User;
use Carbon\Carbon;
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
        $about_ins = Aboutins::all();
        return view('instuctor.profile',compact('profiledata','about_ins'));
    }//end method

    public function InstuctorProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->description = $request->description;
        $data->long_description = $request->long_description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('uploads/instuctor_img/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/instuctor_img/'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return back()->with('success','You Successfully Upload Profile Picture');
    } //end method

    public function AboutInstuctorCreate($id){

        $about_ins = Aboutins::find($id);

        return view('instuctor.about_ins',compact('about_ins'));
    }//end method

    public function InstuctorAboutStore(Request $request){

        $id = Auth::user()->id;
        $request->validate([
            'position'  => 'required',
            'description' => 'required',
            'social_one' => 'required',
            'social_one_icon' => 'required',
            'link_one' => 'required',
            'social_two' => 'required',
            'social_two_icon' => 'required',
            'link_two' => 'required',
            'social_three' => 'required',
            'social_three_icon' => 'required',
            'link_three' => 'required',
            'social_four' => 'required',
            'social_four_icon' => 'required',
            'link_four' => 'required',
            'social_five' => 'required',
            'social_five_icon' => 'required',
            'link_five' => 'required',
            'bio' => 'required',
            'experience_one' => 'required',
            'experience_one_number' => 'required',
            'experience_two' => 'required',
            'experience_two_number' => 'required',
            'experience_three' => 'required',
            'experience_three_number' => 'required',
            'experience_four' => 'required',
            'experience_four_number' => 'required',
        ]);

        Aboutins::insert([
            'position' => $request->position,
            'description' => $request->description,
            'social_one' => $request->social_one,
            'social_one_icon' => $request->social_one_icon,
            'link_one' => $request->link_one,
            'social_two' => $request->social_two,
            'social_two_icon' => $request->social_two_icon,
            'link_two' => $request->link_two,
            'social_three' => $request->social_three,
            'social_three_icon' => $request->social_three_icon,
            'link_three' => $request->link_three,
            'social_four' => $request->social_four,
            'social_four_icon' => $request->social_four_icon,
            'link_four' => $request->link_four,
            'social_five' => $request->social_five,
            'social_five_icon' => $request->social_five_icon,
            'link_five' => $request->link_five,
            'bio' => $request->bio,
            'experience_one' => $request->experience_one,
            'experience_one_number' => $request->experience_one_number,
            'experience_two' => $request->experience_two,
            'experience_two_number' => $request->experience_two_number,
            'experience_three' => $request->experience_three,
            'experience_three_number' => $request->experience_three_number,
            'experience_four' => $request->experience_four,
            'experience_four_number' => $request->experience_four_number,
            'instuctor_id' => $id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','You Successfully Updated Your Info');

    } //end method

        public function AboutInstuctorEdit($id){

        $about = Aboutins::find($id);

        return view('instuctor.edit_about_ins',compact('about'));
    }//end method

    public function InstuctorAboutUpdate(Request $request, $id){

         Aboutins::find($id)->update([
            'position' => $request->position,
            'description' => $request->description,
            'social_one' => $request->social_one,
            'social_one_icon' => $request->social_one_icon,
            'link_one' => $request->link_one,
            'social_two' => $request->social_two,
            'social_two_icon' => $request->social_two_icon,
            'link_two' => $request->link_two,
            'social_three' => $request->social_three,
            'social_three_icon' => $request->social_three_icon,
            'link_three' => $request->link_three,
            'social_four' => $request->social_four,
            'social_four_icon' => $request->social_four_icon,
            'link_four' => $request->link_four,
            'social_five' => $request->social_five,
            'social_five_icon' => $request->social_five_icon,
            'link_five' => $request->link_five,
            'bio' => $request->bio,
            'experience_one' => $request->experience_one,
            'experience_one_number' => $request->experience_one_number,
            'experience_two' => $request->experience_two,
            'experience_two_number' => $request->experience_two_number,
            'experience_three' => $request->experience_three,
            'experience_three_number' => $request->experience_three_number,
            'experience_four' => $request->experience_four,
            'experience_four_number' => $request->experience_four_number,
            'instuctor_id' => $id,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success','You Successfully Updated Your Info');
    }//end method

    public function AboutInstuctorDelete($id){

            $about = Aboutins::find($id);
            $about->delete();
            return back()->with('success','You Successfully Deleted Your Info');

    }//end method


    public function Instuctorlogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instuctor/login')->with('success','You Successfully LogOut');
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
