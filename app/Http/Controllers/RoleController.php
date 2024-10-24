<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{


    public function AllPermission(){

        $permissions = Permission::all();

        return view('admin.backend.pages.permission.index',compact('permissions'));

    } //end method


    public function CreatePermission(){

        return view('admin.backend.pages.permission.create');

    } //end method


    public function StorePermission(Request $request){

        // error part
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);
        // error part

        Permission::insert([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'created_at' => Carbon::now(),
        ]);
        ////////////////////////////////////////////////////
        // $table->string('guard_name')->default(config('auth.defaults.guard'));
        /////////////////////////////////////////////////
        // Don't Forget To Add Default line On Database
        ////////////////////////////////////////////////////

        return redirect()->route('all.permission')->with('success','Successfully Added');

    } //end method


    public function EditPermission($id){

        $permission = Permission::find($id);

        return view('admin.backend.pages.permission.edit',compact('permission'));
    } // end method


    public function UpdatePermission(Request $request , $id){

        Permission::find($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('all.permission')->with('success','Successfully Updated');

    } // end method


    public function DestroyPermission($id){

        Permission::find($id)->delete();
        return back()->with('success','Successfully Deleted');

    } // end method



}
