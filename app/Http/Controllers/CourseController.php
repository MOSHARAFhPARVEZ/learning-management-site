<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Coursegoal;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;

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
    } //end method

    public function CourseStore(Request $request){
        // error part
        $request->validate([
            'course_video'=>'required|mimes:mp4|max:10000',
            'course_name'=>'required',
            'course_title'=>'required',
            'course_name_slug'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'course_image'=>'required|image',
            'label'=>'required',
            'duration'=>'required',
            'resources'=>'required',
            'selling_price'=>'required',
            'discount_price'=>'required',
            'prerequisites'=>'required',
            'certificate'=>'required',
        ]); // error part

        // store part
        if ($request->hasFile('course_image')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('course_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('course_image'))->resize(370,246);
            $image->toJpeg()->save(base_path('public/uploads/course/course_image/'.$new_name));


            $video = $request->file('course_video');
            $video_name = uniqid() . "." . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/course/course_video/'),$video_name);
            $savevideo = 'uploads/course/course_video/'.$video_name;

            $slug = Str::slug($request->course_name_slug);

            $course_id = Course::insertGetId([
                'course_video'=> $savevideo,
                'instactor_id'=> Auth::user()->id ,
                'course_name'=> $request->course_name,
                'course_title'=> $request->course_title,
                'course_name_slug'=> $slug,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
                'subcategory_id'=> $request->subcategory_id,
                'course_image'=> $new_name,
                'label'=> $request->label,
                'duration'=> $request->duration,
                'resources'=> $request->resources,
                'selling_price'=> $request->selling_price,
                'discount_price'=> $request->discount_price,
                'prerequisites'=> $request->prerequisites,
                'certificate'=> $request->certificate,
                'bestseller'=> $request->bestseller,
                'featured'=> $request->featured,
                'highestrated'=> $request->highestrated,
                'status'=> 1,
                'created_at'=> Carbon::now(),
            ]);

            // goals part start
            $goals = Count($request->course_goals);
            if ($goals != NULL) {
                for ($i=0; $i < $goals; $i++) {
                    $gcount = new Coursegoal();
                    $gcount->course_id = $course_id;
                    $gcount->goal_name = $request->course_goals[$i];
                    $gcount->save();
                }
            }
            // goals part end

            return redirect()->route('course.index')->with('success','You Successfully Add A Course');

        }// image part

        // store part


    } //end method

    public function CourseDetails($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $courses = Course::findorfail($id);
        return view('instuctor.course.details',compact('categories','subcategories','courses'));
    } //end method

    public function CourseEdit($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $course = Course::find($id);
        return view('instuctor.course.edit',compact('categories','subcategories','course'));
    } //end method


    public function CourseUpdate(request $request, $id){
        // error part
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'label'=>'required',
            'certificate'=>'required',
        ]); // error part
        $slug = Str::slug($request->course_name_slug);
        $course = Course::find($id);
        $course->update([
                'course_name'=> $request->course_name,
                'course_title'=> $request->course_title,
                'course_name_slug'=> $slug,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
                'subcategory_id'=> $request->subcategory_id,
                'label'=> $request->label,
                'duration'=> $request->duration,
                'resources'=> $request->resources,
                'selling_price'=> $request->selling_price,
                'discount_price'=> $request->discount_price,
                'prerequisites'=> $request->prerequisites,
                'certificate'=> $request->certificate,
                'bestseller'=> $request->bestseller,
                'featured'=> $request->featured,
                'highestrated'=> $request->highestrated,
                'updated_at'=> Carbon::now(),
        ]);
        return redirect()->route('course.index')->with('success','You Successfully Updated A Course');

    } //end method

    public function CourseUpdateImage(request $request, $id){

        $request->validate([
            'course_image'=>'required|image',
        ]);

        $image_update = Course::find($id);
        $image_path = public_path('uploads/course/course_image/'.$image_update->course_image);

        if ($request->hasfile('course_image')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('course_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('course_image'))->resize(370,246);
            $image->toJpeg(80)->save(base_path('public/uploads/course/course_image/'.$new_name));
            if (File::exists($image_path)) {
                unlink($image_path);
            }

           $image_update->update([
                'course_image'=>$new_name,
                'updated_at' => Carbon::now(),
           ]);

        }


        return redirect()->route('course.index')->with('success','You Successfully Updated Course Image');

    } //end method

    public function CourseUpdateVideo(request $request, $id){

        $request->validate([
            'course_video'=>'required|mimes:mp4|max:10000',
        ]);

        $image_update = Course::find($id);
        $image_path = public_path('uploads/course/course_image/'.$image_update->course_image);




        return redirect()->route('course.index')->with('success','You Successfully Updated Course Image');

    } //end method


}
