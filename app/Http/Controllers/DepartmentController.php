<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Department::all();
        return view('admin.master.department.view',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,NULL,id,deleted_at,NULL',
            'short_name' => 'required|unique:departments,short_name,NULL,id,deleted_at,NULL',
         ])->validate();

        $department = new Department();
        $department->name       = $request->name;
        $department->short_name       = $request->short_name;
        $department->remark      =  $request->remark;
        $department->created_by = 0;
        $department->updated_by = 0;
      if ($department->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department,$id)
    {
        $department=Department::find($id);
        return view('admin.master.department.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department,$id)
    {
        $department=Department::find($id);
        return view('admin.master.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department,$id)
    {
        $department = Department::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,'.$id.',id,deleted_at,NULL',
            'short_name' => 'required|unique:departments,short_name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        
        $department->name       = $request->name;
        $department->short_name       = $request->short_name;
        $department->remark      =  $request->remark;
        $department->created_by = 0;
        $department->updated_by = 0;
      if ($department->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department,$id)
    {
        $department = Department::find($id);
        if ($department->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
