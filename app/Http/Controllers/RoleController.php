<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;
use App\Models\Designation;
use App\Models\Role;
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
		$roles=Designation::all();
        return view('admin.master.role.add',compact('permission','roles'));
    }

    public function store(Request $request)
    {
       

                 $role_permission = new Role();
                
				$role_permission->role_id = isset($request->role_id) ? ($request->role_id) : 0;
                $role_permission->permission = isset($request->permission) ? serialize($request->permission) : '';
                $role_permission->created_by = isset($request->created_by) ? ($request->created_by) : 0;
                $role_permission->active_status = isset($request->status) ? ($request->status) : 1;
                if($role_permission->save()) {


        return Redirect::back()->with('success', 'Successfully created');
				}
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('admin.master.role.show',compact('role','rolePermissions'));
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
