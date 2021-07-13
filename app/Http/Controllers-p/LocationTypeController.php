<?php

namespace App\Http\Controllers;

use App\Models\LocationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LocationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location_type=LocationType::all();
        return view('admin.master.location_type.view',compact('location_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.location_type.add');
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
            'name' => 'required|unique:location_types,name,NULL,id,deleted_at,NULL',
         ])->validate();

        $location_type = new LocationType();
        $location_type->name       = $request->name;
        $location_type->remark       = $request->remark;
        $location_type->created_by = 0;
        if ($location_type->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function show(LocationType $locationType,$id)
    {
        $location_type=LocationType::find($id);
        return view('admin.master.location_type.show',compact('location_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationType $locationType,$id)
    {
        $location_type=LocationType::find($id);
        return view('admin.master.location_type.edit',compact('location_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationType $locationType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:location_types,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $location_type = LocationType::find($id);
        $location_type->name       = $request->name;
        $location_type->remark       = $request->remark;
        $location_type->updated_by = 0;
        if ($location_type->save()) {
                return Redirect::back()->with('success', 'Updated  Successfully');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationType $locationType,$id)
    {
        $location_type = LocationType::find($id);
        if ($location_type->delete()) {
            return Redirect::back()->with('success', 'Deleted  Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
