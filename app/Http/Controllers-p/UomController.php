<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uom=Uom::all();
        return view('admin.master.uom.view',compact('uom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.uom.add');
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
            'name' => 'required|unique:uoms,name,NULL,id,deleted_at,NULL',
            'description' => 'required',
        ])->validate();

        $uom = new Uom();
        $uom->name       = $request->name;
        $uom->description      =  $request->description;
        $uom->created_by = 0;
        $uom->updated_by = 0;
      if ($uom->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function show(Uom $uom,$id)
    {
        $uom=Uom::find($id);
        return view('admin.master.uom.show',compact('uom'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function edit(Uom $uom,$id)
    {
        $uom=Uom::find($id);
        return view('admin.master.uom.edit',compact('uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uom $uom,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:uoms,name,'.$id.',id,deleted_at,NULL',
            'description' => 'required',
        ])->validate();

        $uom =Uom::find($id);
        $uom->name       = $request->name;
        $uom->description      =  $request->description;
        $uom->created_by = 0;
        $uom->updated_by = 0;
      if ($uom->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uom  $uom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uom $uom,$id)
    {
        $uom = Uom::find($id);
        if ($uom->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
