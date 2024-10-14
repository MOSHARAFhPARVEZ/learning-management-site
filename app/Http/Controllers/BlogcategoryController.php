<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogcategoryController extends Controller
{


    public function AdminBlogCategoryView(){

        $blogcategories = BlogCategory::latest()->get();

        return view('admin.backend.blogcategory.index',compact('blogcategories'));

    } //end method


    public function CreateBlogCategory(){

        return view('admin.backend.blogcategory.create');

    } //end method


    public function BlogCategoryStore(Request $request){

        // erorr part
        $request->validate([
            'category_name' => 'required',
        ]);
        // erorr part

        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => str::slug($request->category_name),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.blogcategory.view')->with('success','Successfully Added A Blog Category');

    } //end method

    public function EditBlogCategory($id){

        $category = BlogCategory::find($id);


        return view('admin.backend.blogcategory.edit',compact('category'));


    } //end method

    public function UpdateBlogCategory(Request $request ,$id){

       BlogCategory::find($id)->update([
            'category_name' => $request->category_name,
            'category_slug' => str::slug($request->category_name),
            'updated_at' => Carbon::now(),
       ]);

       return redirect()->route('admin.blogcategory.view')->with('success','Successfully Updated Blog Category Info');

    } //end method


    public function DestroyBlogCategory($id){

        $blogcate = BlogCategory::find($id);
        $blogcate->delete();

        return back()->with('success','Successfully Deleted A Blog Category');


    } // end method







}
