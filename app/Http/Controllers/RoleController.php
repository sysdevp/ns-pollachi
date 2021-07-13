<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    


    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin.master.role.view',compact('roles'));
    }

    public function create()
    {
       
        $permission = Permission::get();
        $roles = Role::all();
        return view('admin.master.role.add',compact('permission','roles'));
    }

    public function store(Request $request)
    {
       
//print_r($request->input('permission'));exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:roles,name,NULL,id,deleted_at,NULL',
            'permission.*' => 'required',
          ])->validate();


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return Redirect::back()->with('success', 'Successfully created');
    }

    // public function show($id)
    // {
    //     $role = Role::find($id);
    //     $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
    //         ->where("role_has_permissions.role_id",$id)
    //         ->get();
    //     return view('admin.master.role.show',compact('role','rolePermissions'));
    // }
    public function show($id)
    {
        // $role = Role::find($id);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        //     ->where("role_has_permissions.role_id",$id)
        //     ->get();

        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admin.master.role.show',compact('role','permission','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admin.master.role.edit',compact('role','permission','rolePermissions'));
    }


    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:roles,name,'.$id.',id',
            'permission' => 'required',
          ])->validate();


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
         $role->syncPermissions($request->input('permission'));


        return Redirect::back()->with('success', 'Updated Successfully');
    }
    
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
