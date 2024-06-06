<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subcategories = SubCategory::latest()->get();
        return view('admin.backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('admin.backend.subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // error part
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'subcategory_slug' => 'required',
        ]);
        // error part
        $slug = Str::slug($request->subcategory_slug);
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' =>$slug,
        ]);
        return redirect()->route('subcategory.index')->with('success','You Successfully Add A Sub Category');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::find($id);
        return view('admin.backend.subcategory.edit',compact('subCategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $slug = Str::slug($request->subcategory_slug);
        SubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' =>$slug,
        ]);
        return redirect()->route('subcategory.index')->with('success','You Successfully Update A Sub Category Info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = SubCategory::find($id);
        $delete->delete();
        return back()->with('success','You Successfully Delete A Sub Category');
    }
}
