<?php

namespace App\Http\Controllers;

use App\Models\Quans;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuansController extends Controller
{
    public function UserCourseQuestion(Request $request){
        Quans::insert([
            'instructor_id' => $request->instructor_id,
            'course_id' => $request->course_id,
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'question' => $request->question,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Your Question Successfully Submited');

    }//end method


    public function InstuctorAllQuestion(){

        $id = Auth::user()->id;
        $questions = Quans::where('instructor_id', $id)->where('parent_id',null)->orderBy('id','DESC')->get();

        return view('instuctor.quans.allques',compact('questions'));

    } //end method


    public function InstuctorQuestionDetails($id){

        $questions = Quans::find($id);
        $instructor_id = Auth::user()->id;
        $instructor_data = User::find($instructor_id);
        $replay = Quans::where('parent_id',$id)->orderBy('id','ASC')->get();

        return view('instuctor.quans.quesdetails',compact('questions','instructor_data','replay'));

    } //end method

    public function InstuctorQuestionAnswer(Request $request ,$id){

        // error part
        $request->validate([
            'question' => 'required'
        ]);
        // error part

        Quans::insert([
            'instructor_id' => $request->instructor_id,
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'subject' => $request->subject,
            'question' => $request->question,
            'parent_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Your Answer Successfully Submited');


    } //end method




}


