<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use App\Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.master.user.view',compact('users'));
    }

    public function create()
    {
        $employee=Employee::all();
        
        return view('admin.master.user.add',compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'employee_id' => 'required|unique:users,employee_id,NULL,id,deleted_at,NULL',
            'employee_id' => 'required',
            'role_id' => 'required',
            'user_name' => 'required|min:3|max:50|unique:users,user_name,NULL,id,deleted_at,NULL',
            'password' => 'required|min:3',
            'confirm_password' => 'required|same:password',
          ])->validate();

        $user = new User();
        $user->employee_id       = $request->employee_id;
        $user->user_name       = $request->user_name;
        $user->password       = Hash::make($request->password);
        $user->role_id       = $request->role_id;
        $user->created_by = 0;
        $user->updated_by = 0;
      if ($user->save()) {
        $user->assignRole($request->input('role_id'));
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function show($id)
    {
        $user=User::find($id);
        return view('admin.master.user.show',compact('user'));
    }

    public function edit($id)
    {
        $user=User::find($id);
        $employee=Employee::all();
        $role=Role::all();
        return view('admin.master.user.edit',compact('user','employee','role'));
    }


    public function destroy(User $user,$id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|unique:users,employee_id,'.$id.',id,deleted_at,NULL',
            'role_id' => 'required',
            'user_name' => 'required|min:3|max:50|unique:users,user_name,'.$id.',id,deleted_at,NULL',
           ])->validate();

        $user =  User::find($id);
        $user->employee_id       = $request->employee_id;
        $user->user_name       = $request->user_name;
       $user->role_id       = $request->role_id;
        $user->updated_by = 0;
      if ($user->save()) {
        $user->assignRole($request->input('role_id'));
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    
}
