<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Coursegoal;
use App\Models\CourseLecture;
use App\Models\CourseSection;
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
        $goals = Coursegoal::where('course_id',$id)->get();
        $course = Course::find($id);
        return view('instuctor.course.edit',compact('categories','subcategories','course','goals'));
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

        $video_update = Course::find($id);
        $video_path = public_path('uploads/course/course_video/'.$video_update->course_video);

        $video = $request->file('course_video');
        $video_name = uniqid() . "." . $video->getClientOriginalExtension();
        $video->move(public_path('uploads/course/course_video/'),$video_name);
        $savevideo = 'uploads/course/course_video/'.$video_name;

        if (File::exists($video_path)) {
            unlink($video_path);
        }

        $video_update->update([
            'course_video' => $savevideo,
            'updated_at' => Carbon::now(),
        ]);


        return redirect()->route('course.index')->with('success','You Successfully Updated Course Video');

    } //end method

    public function CourseUpdateGoals(request $request, $id){


        if ($request->course_goals == NULL) {
            return back();
        } else {
            Coursegoal::where('course_id',$id)->delete();
            $goals = Count($request->course_goals);
            for ($i=0; $i < $goals; $i++) {
                    $gcount = new Coursegoal();
                    $gcount->course_id = $id;
                    $gcount->goal_name = $request->course_goals[$i];
                    $gcount->save();
                };
        }


        return redirect()->route('course.index')->with('success','You Successfully Updated Course Goals');

    } //end method

    public function CourseDestroy($id){

        $course = Course::find($id);
        $img_path = public_path('uploads/course/course_image/' . $course->course_image);
        if (File::exists($img_path)) {
            unlink($img_path);
        }

        $img_path = public_path('uploads/course/course_video/' . $course->course_video);
        if (File::exists($img_path)) {
                unlink($img_path);
        }

        // unlink($course->course_video);
        $course->delete();

        $goalsdata = Coursegoal::where('course_id',$id)->get();
        foreach ($goalsdata as $item) {
            $item->goal_name;
            Coursegoal::where('course_id',$id)->delete();
        }
        return redirect()->route('course.index')->with('success','You Successfully Deleted');


    } //end method

    public function CourseLectureCreate($id){

        $course = Course::find($id);
        $section = CourseSection::where('course_id',$id)->latest()->get();
        return view('instuctor.course.sectionandlecture.lecture.create',compact('course','section'));

    }   //end method


    public function CourseSectionCreate(Request $request , $id){

        $course = Course::find($id);

        // error part
        $request->validate([
            'section_tittle'=>'required',
        ]);
        // error part

        CourseSection::insert([
            'course_id' => $course->id,
            'section_tittle' => $request->section_tittle,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('course.lecture.create',$course->id)->with('success','You Successfully Added A Course Section');

    }   //end method


    public function CourseSectionEdit($id){

        $section = CourseSection::find($id);
        return view('instuctor.course.sectionandlecture.section.edit',compact('section'));

    }   //end method


    public function CourseSectionUpdate(Request $request , $id){

        $section = CourseSection::find($id);

        $section->update([
            'section_tittle' => $request->section_tittle,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('course.index')->with('success','You Successfully Edited A Course Section');


    }   //end method

    public function CourseSectionDestroy( $id){

        $section = CourseSection::find($id);
        $section->lectures()->delete();
        $section->delete();
        return redirect()->back()->with('success','You Successfully Deleted A Course Section');

    }   //end method


    public function CourseSectionAddlecture($id){


        $section = CourseSection::find($id);
        return view('instuctor.course.sectionandlecture.lecture.addlecture',compact('section'));

    }   //end method


    public function AddlectureStore(Request $request , $id){

        // store part
        CourseLecture::insert([
            'lecture_tittle' => $request->lecture_tittle,
            'url' => $request->url,
            'content' => $request->content,
            'course_id' => $request->course_id,
            'secation_id' => $request->secation_id,
            'created_at' => Carbon::now(),
        ]);
        // store part
        return redirect()->back()->with('success','You Successfully Added A Lecture Info');


    }   //end method


    public function CourseLectureEdit($id){


        $lecture = CourseLecture::find($id);
        return view('instuctor.course.sectionandlecture.lecture.editlecture',compact('lecture'));

    }   //end method


    public function CourseLectureUpdate(Request $request , $id){

        CourseLecture::find($id)->update([
            'lecture_tittle' => $request->lecture_tittle,
            'url' => $request->url,
            'content' => $request->content,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','You Successfully Updated A Lecture Info');

    }   //end method


    public function CourseLectureDestroy( $id){

        $lecture = CourseLecture::find($id);
        $lecture->delete();
        return redirect()->back()->with('success','You Successfully Deleted A Course Lecture');

    }   //end method

    ////////////////////////////////////////////////////////////
    ///////// {{-- ===== CourseDetailsPage ===== --}} //////////
    ////////////////////////////////////////////////////////////

    public function CourseDetailsPage($id,$slug){

        $course = Course::find($id);
        $goals = Coursegoal::where('course_id',$id)->orderBy('id','DESC')->get();
        $ins_id = $course->instactor_id;
        $ins_courses = Course::where('instactor_id',$ins_id)->orderBy('id','DESC')->get();
        $categories = Category::latest()->get();
        $caregory_id = $course->category_id;
        $related_course = Course::where('category_id',$caregory_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.component.courseDetails',compact('course','goals','ins_courses','categories','related_course'));

    }   //end method
}
