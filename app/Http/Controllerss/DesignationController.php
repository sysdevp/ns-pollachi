<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation=Designation::all();
        return view('admin.master.designation.view',compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.designation.add');
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
            'name' => 'required|unique:designations,name,NULL,id,deleted_at,NULL',
            'short_name' => 'required|unique:designations,short_name,NULL,id,deleted_at,NULL',
         ])->validate();

        $designation = new Designation();
        $designation->name       = $request->name;
        $designation->short_name       = $request->short_name;
        $designation->remark      =  $request->remark;
        $designation->created_by = 0;
        $designation->updated_by = 0;
      if ($designation->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation,$id)
    {
        $designation=Designation::find($id);
        return view('admin.master.designation.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation,$id)
    {
        $designation=Designation::find($id);
        return view('admin.master.designation.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation,$id)
    {
        $designation = Designation::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:designations,name,'.$id.',id,deleted_at,NULL',
            'short_name' => 'required|unique:designations,short_name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        
        $designation->name       = $request->name;
        $designation->short_name       = $request->short_name;
        $designation->remark      =  $request->remark;
        $designation->created_by = 0;
        $designation->updated_by = 0;
      if ($designation->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation = Designation::find($id);
        if ($designation->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
