<?php

namespace App\Http\Controllers;

use App\Models\Aboutins;
use App\Models\Category;
use App\Models\Course;
use App\Models\Coursegoal;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function CategorywiseCourse($id,$slug){

        $courses = Course::where('category_id',$id)->where('status',1)->get();
        $category = Category::where('id',$id)->first();
        $categories = Category::latest()->get();

        return view('frontend.component.categorywisecourse',compact('courses','category','categories'));
    } //end method


    public function SubcategorywiseCourse($id,$slug){

        $courses = Course::where('subcategory_id',$id)->where('status',1)->get();
        $subcategory = SubCategory::where('id',$id)->first();
        $categories = Category::latest()->get();

        return view('frontend.component.subcategorywisecourse',compact('courses','subcategory','categories'));
    } //end method


    public function InstuctorDetails($id){

        $instuctor = User::find($id);
        $courses = Course::where('instactor_id',$id)->get();
        $aboutins = Aboutins::where('instuctor_id',$id)->first();
        // $course = Course::get();
        // $goals = Coursegoal::where('course_id',$courses->$id)->orderBy('id','DESC')->get();

        return view('instuctor.details',compact('instuctor','courses','aboutins'));
    } //end method


}
