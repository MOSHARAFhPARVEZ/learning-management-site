<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Blogpost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class BlogpostController extends Controller
{

    public function AdminBlogPostView(){

        $blogpost = Blogpost::latest()->get();

        return view('admin.backend.blogcategory.post.index',compact('blogpost'));
    } //end method

    public function BlogPostCreate(){

        $blogCategory = BlogCategory::latest()->get();

        return view('admin.backend.blogcategory.post.create',compact('blogCategory'));
    } //end method


    public function BlogPostStore(Request $request){

        // error part
        $request->validate([
            'blogcat_id' => 'required',
            'post_title' => 'required',
            'post_image' => 'required',
            'long_descrip' => 'required',
            'post_tags' => 'required',
        ]);
        // error part

        if ($request->hasFile('post_image')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('post_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('post_image'))->resize(400,400);
            $image->toJpeg(80)->save(base_path('public/uploads/post_image/'.$new_name));
            $slug = Str::slug($request->post_title);
            Blogpost::insert([
                'post_title' => $request->post_title,
                'blogcat_id' => $request->blogcat_id,
                'long_descrip' => $request->long_descrip,
                'post_tags' => $request->post_tags,
                'post_slug' => $slug,
                'post_image' => $new_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('admin.blogpost.view')->with('success','Successfully Add A Post');
        }
    }//end method

    public function BlogPostDetails($id){

        $blog = Blogpost::find($id);

        return view('admin.backend.blogcategory.post.details',compact('blog'));

    } //end method


    public function BlogPostEdit($id){

        $blog = Blogpost::find($id);
        $blogCategory = BlogCategory::latest()->get();

        return view('admin.backend.blogcategory.post.edit',compact('blog','blogCategory'));

    } // end method


    public function BlogPostUpdate(Request $request,$id){

        $blog_update = Blogpost::find($id);
        $img_path = public_path('uploads/post_image/' . $blog_update->post_image);

        if ($request->hasFile('post_image')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($img_path)) {
                unlink($img_path);
            }
            $new_name = uniqid() . "." . $request->file('post_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('post_image'))->resize(400,400);
            $image->toJpeg(80)->save(base_path('public/uploads/post_image/'.$new_name));

            $blog_update->update([
               'post_image' => $new_name,
               'updated_at' => Carbon::now(),
            ]);
        }

        $slug = Str::slug($request->post_title);

        $blog_update->update([
            'post_title' => $request->post_title,
            'blogcat_id' => $request->blogcat_id,
            'long_descrip' => $request->long_descrip,
            'post_tags' => $request->post_tags,
            'post_slug' => $slug,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.blogpost.view')->with('success','You Successfully Update Blog Post');

    } // end method


    public function BlogPostDestroy($id){

        $blog_delete = Blogpost::find($id);
        $img_path = public_path('uploads/post_image/' . $blog_delete->post_image);

        if (File::exists($img_path)) {
            unlink($img_path);
        }

        $blog_delete->delete();

        return back()->with('success','You Successfully Deleted Blog Post');


    } // end method


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////FONTEND PART BLOG///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////


    public function BlogDetails($id , $post_slug){

        $blog = Blogpost::where('id',$id)->where('post_slug',$post_slug)->first();
        $allTags = $blog->post_tags;
        $explode = explode(',',$allTags);
        $blogCategory = BlogCategory::latest()->get();
        $recents = Blogpost::latest()->limit(4)->get();

    return view('frontend.component.blog.details',compact('blog','explode','blogCategory','recents'));

    } //end method


    public function BlogCatList($id , $category_slug){

        $blogs = Blogpost::where('blogcat_id',$id)->get();
        $blogCategory = BlogCategory::latest()->get();
        $blogcate = BlogCategory::where('id',$id)->first();
        $recents = Blogpost::latest()->limit(4)->get();

    return view('frontend.component.blog.cat_wisepost',compact('blogs','blogCategory','recents','blogcate'));

    } //end method


    public function AllBlog(){

        $blogs = Blogpost::latest()->paginate(6);
        return view('frontend.component.blog.index',compact('blogs'));

    } //end method





}
