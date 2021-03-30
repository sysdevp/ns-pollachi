<?php

namespace App\Http\Controllers;

use App\Models\GstType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GstTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gstType=GstType::all();
        return view('admin.master.gst_type.view',compact('gstType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.gst_type.add');
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
            'name' => 'required|unique:gst_types,name,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:gst_types,code,NULL,id,deleted_at,NULL',
            'value' => 'required',
         ])->validate();

        $gstType = new GstType();
        $gstType->name       = $request->name;
        $gstType->code       = $request->code;
        $gstType->value       = $request->value;
        $gstType->remark      =  $request->remark;
        $gstType->created_by = 0;
        $gstType->updated_by = 0;
      if ($gstType->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GstType  $gstType
     * @return \Illuminate\Http\Response
     */
    public function show(GstType $gstType,$id)
    {
        $gstType=GstType::find($id);
        return view('admin.master.gst_type.show',compact('gstType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GstType  $gstType
     * @return \Illuminate\Http\Response
     */
    public function edit(GstType $gstType,$id)
    {
        $gstType=GstType::find($id);
        return view('admin.master.gst_type.edit',compact('gstType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GstType  $gstType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GstType $gstType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:gst_types,name,'.$id.',id,deleted_at,NULL',
            'code' => 'required|unique:gst_types,code,'.$id.',id,deleted_at,NULL',
            'value' => 'required',
         ])->validate();

        $gstType = GstType::find($id);
        $gstType->name       = $request->name;
        $gstType->code       = $request->code;
        $gstType->value       = $request->value;
        $gstType->remark      =  $request->remark;
        $gstType->created_by = 0;
        $gstType->updated_by = 0;
      if ($gstType->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GstType  $gstType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GstType $gstType,$id)
    {
        $gstType = GstType::find($id);
        if ($gstType->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
