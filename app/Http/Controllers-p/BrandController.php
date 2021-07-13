<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::all();
        return view('admin.master.brand.view',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.brand.add');
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
            'name' => 'required|unique:brands,name,NULL,id,deleted_at,NULL',
           // 'code' => 'required|unique:brands,code,NULL,id,deleted_at,NULL',
        ])->validate();

        $brand = new Brand();
        $brand->name       = $request->name;
        $brand->code      =  $request->code;
        $brand->created_by = 0;
        $brand->updated_by = 0;
      if ($brand->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand,$id)
    {
        $brand=Brand::find($id);
        return view('admin.master.brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand,$id)
    {
        $brand=Brand::find($id);
        return view('admin.master.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand,$id)
    {
        $brand = Brand::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands,name,'.$id.',id,deleted_at,NULL',
           // 'code' => 'required|unique:brands,code,'.$id.',id,deleted_at,NULL',
        ])->validate();
        $brand->name       = $request->name;
        $brand->code      =  $request->code;
        $brand->created_by = 0;
        $brand->updated_by = 0;
      if ($brand->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand,$id)
    {
        $brand = Brand::find($id);
        if ($brand->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
