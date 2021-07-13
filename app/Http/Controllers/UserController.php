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
        $role = Role::all();
        
        return view('admin.master.user.add',compact('employee','role'));
    }
    public function change_password($id)
    {
        
        $user = User::find($id);
     //   print_r($user->employee_id);exit;
        @$employee=Employee::find($user->employee_id);
        @$role = Role::find($user->role_id);
        return view('admin.master.user.change_password',compact('user','employee','role')); 
    }
    public function update_password(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:3',
            'confirm_password' => 'required|same:password',
          ])->validate();
          $password       = Hash::make($request->password);

             User::where('id',$id)->update(["password"=>$password]);
            return Redirect::back()->with('success', 'Successfully Updated');


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


        $employee=Employee::where('id',$request->employee_id)->first();

        $user = new User();
        $user->employee_id       = $request->employee_id;
        $user->user_name       = $request->user_name;
        $user->password       = Hash::make($request->password);
        $user->role_id       = $request->role_id;
        $user->email =  $employee->email;
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

    public function import()
    {

       return view('admin.master.user.index');
    }

    public function importCsv(Request $request)
    {

        $profile_name="";
         $destinationPath = 'storage/file/';
         if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }

        $file = storage_path('file/'.$profile_name);

        $handle = fopen($file, "r");

$i = 0;
$total_count = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                if($i >0)
                {

                    $name=$filesop[1];   echo "</br>";
                    $password=$filesop[2];   echo "</br>";
                    $employee_name=$filesop[3];   echo "</br>";
                    $role_name=$filesop[4];   echo "</br>";

                    $employee_name = str_replace(' ', '', $employee_name);
                    $employees=Employee::whereRaw("REPLACE(`name`, ' ' ,'') = '".$employee_name."'")->first();

                    $role_name = str_replace(' ', '', $role_name);
                    $roles=Role::whereRaw("REPLACE(`name`, ' ' ,'') = '".$role_name."'")->first();

                    $employee_id = @$employees->id;
                    $employee_email = @$employees->email;
                    $role_id = @$roles->id;
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=User::whereRaw("REPLACE(`user_name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0 && $employees != '' && $roles != '')
                    {
                        $user = new User();
                        $user->employee_id       = $employee_id;
                        $user->user_name       = $name;
                        $user->password       = Hash::make($password);
                        $user->role_id       = $role_id;
                        $user->email =  $employee_email;
                        $user->created_by = 0;
                        $user->updated_by = 0;

                        $user->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Users Imported successfully');    
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
