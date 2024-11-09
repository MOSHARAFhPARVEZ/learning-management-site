<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;
use App\Exports\RoleExport;
use App\Imports\RoleImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

///////////////////////////////////////////////////////
//////////----> Permission Part <----//////////////////
///////////////////////////////////////////////////////
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


    public function ImportPermission(){

        return view('admin.backend.pages.permission.importfile');

    } // end method


    public function ExportPermission(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    } // end method


    public function ImportPermissionStore(Request $request){

        Excel::import(new PermissionImport, $request->file('importpermission') );

        return redirect()->route('all.permission')->with('success','Successfully Imported');

    } // end method


///////////////////////////////////////////////////////
/////////////////----> Role Part <----//////////////////
///////////////////////////////////////////////////////


    public function AllRole(){

        $roles = Role::latest()->get();

        return view('admin.backend.pages.role.index',compact('roles'));

    } // end method


    public function CreateRole(){

        return view('admin.backend.pages.role.create');

    } // end method


    public function StoreRole(Request $request){

        // error part
        $request->validate([
            'name' => 'required',
        ]);
        // error part

        Role::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('all.role')->with('success','Successfully Inserted A Role');

    } // end method


    public function EditRole($id){

        $role = Role::find($id);

        return view('admin.backend.pages.role.edit',compact('role'));

    } // end method


    public function UpdateRole(Request $request , $id){

        $role = Role::find($id);

        $role->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('all.role')->with('success','Successfully Updated');


    } // end method


    public function DestroyRole($id){

        Role::find($id)->delete();

        return back()->with('success','Successfully Deleted');

    } // end method


    public function ImportRole(){

        return view('admin.backend.pages.role.import');

    } // end method


    public function ExportRole(){

        return Excel::download(new RoleExport, 'role.xlsx');

    } // end method


    public function ImportRoleStore(Request $request){

        Excel::import(new RoleImport, $request->file('importxlsx') );

        return redirect()->route('all.role')->with('success','Successfully Imported');

    } // end method



///////////////////////////////////////////////////////
///////////----> Role Add Permission <----////////////
///////////////////////////////////////////////////////

    public function RoleAddPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permissions_Groups = User::permissionGroup();

        return view('admin.backend.pages.rolesetup.role_add_permission',compact('roles','permissions_Groups','permissions'));
    } // end method



    public function StoreRoleAddPermission(Request $request){

        $data = array();
        $permissions = $request->permission_id;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        } // end foreach

        return redirect()->route('index.role.has.permission')->with('success','Successfully Added');

    } // end method


    public function IndexRoleHasPermission(){

        $roles = Role::all();
        return view('admin.backend.pages.rolesetup.index_role_has_permission',compact('roles'));

    } // end method



    public function AdminEditRole($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $permissions_Groups = User::permissionGroup();

        return view('admin.backend.pages.rolesetup.role_edit_permission',compact('role','permissions_Groups','permissions'));
    } // end method


//     public function UpdateRolePermission(Request $request , $id){
// // dd($request);

// return $request;
// die();
//         $role = Role::findOrFail($id);
//         $permissions = $request->permission_id;

//         if (!empty($permissions)) {
//             $role->syncPermissions($permissions);
//         }

//         return redirect()->route('admin.dashboard')->with('success','Successfully Updated');

//     } // end method


public function UpdateRolePermission(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->permission_id;

        if (!empty($permissions)) {
            // Fetch permission names by IDs
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            // If no permissions are provided, remove all permissions from the role
            $role->syncPermissions([]);
        }

        // $notification = array(
        //     'message' => 'Role Permission Updated Successfully',
        //     'alert-type' => 'success'
        // );
        return redirect()->route('index.role.has.permission')->with('success','Successfully Updated');
    }
    // End Method



    public function AdminDestroyRole($id){

        $role = Role::find($id);

        if (!is_null($role)) {
            $role->delete();
        }

        return redirect()->route('index.role.has.permission')->with('success','Successfully Updated');

    } // end method






}
