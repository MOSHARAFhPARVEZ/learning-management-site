<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function CourseIndex(){
        $id = Auth::user()->id;
        $courses = Course::where('instactor_id',$id)->orderby('id','desc')->get();
        return view('instuctor.course.index',compact('courses'));
    } //end method

    public function CourseCreate(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('instuctor.course.create',compact('categories','subcategories'));
    }

}
