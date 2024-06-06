<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function IndexCategory(){
        $categories = Category::latest()->get();
        return view('admin\backend\category\indexcategory',compact('categories'));
    } //end method


    public function CrateCategory(){
        return view('admin\backend\category\createcategory');
    } //end method


    public function StoreCategory(Request $request){

        // error part
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required',
            'image' => 'required|image',
        ]);
        // error part

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $new_name = uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'))->resize(370,246);
            $image->toJpeg(80)->save(base_path('public/uploads/category_img/'.$new_name));
            $slug = Str::slug($request->category_slug);
            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => $slug,
                'image' => $new_name,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('index.category')->with('success','You Successfully Add A Category');
        }
    }//end method


    public function EditCategory($id){
        $category = Category::find($id);
        return view('admin\backend\category\editcategory',compact('category'));
    }//end method


    public function UpdateCategory(Request $request ,$id){

        $category_update = Category::find($id);
        $img_path = public_path('uploads/category_img/' . $category_update->image);

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            if (File::exists($img_path)) {
                unlink($img_path);
            }
            $new_name = uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'))->resize(370,246);
            $image->toJpeg(80)->save(base_path('public/uploads/category_img/'.$new_name));

            $category_update->update([
               'image' => $new_name,
               'updated_at' => Carbon::now(),
            ]);
        }
        $slug = Str::slug($request->category_slug);
        $category_update->update([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('index.category')->with('success','You Successfully Update Category Info');

    }//end method

    public function DestroyCategory($id){
        $category_delete = Category::find($id);
        $img_path = public_path('uploads/category_img/' . $category_delete->image);
        if (File::exists($img_path)) {
                unlink($img_path);
        }
        $category_delete->delete();
        return redirect()->route('index.category')->with('success','You Successfully Delete Category');

    }//end method



}
