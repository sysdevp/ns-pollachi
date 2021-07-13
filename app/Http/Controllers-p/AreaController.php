<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area=Area::all();
        return view('admin.master.area.view',compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.area.add');
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
            'name' => 'required|unique:areas,name,NULL,id,deleted_at,NULL',
            'code'=> 'required',
           
        ])->validate();

        $area = new Area();
        $area->name       = $request->name;
        $area->code       = $request->code;
        $area->remark       = $request->remark;
       
        $area->created_by = 0;
        $area->updated_by = 0;
      if ($area->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area,$id)
    {
        $area=Area::find($id);
        return view('admin.master.area.show',compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area,$id)
    {
        $area=Area::find($id);
        return view('admin.master.area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:areas,name,'.$id.',id,deleted_at,NULL',
            'code'=> 'required',
         ])->validate();

        $area = Area::find($id);
        $area->name       = $request->name;
        $area->code       = $request->code;
        $area->remark       = $request->remark;
      $area->updated_by = 0;
      if ($area->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area,$id)
    {
        $area = Area::find($id);
        if ($area->delete()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
