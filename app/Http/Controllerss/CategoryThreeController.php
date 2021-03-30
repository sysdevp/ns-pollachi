<?php

namespace App\Http\Controllers;

use App\Models\Category_one;
use App\Models\Category_three;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_three=Category_three::all();
        return view('admin.master.category_3.view',compact('category_three'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_one=Category_one::all();
        return view('admin.master.category_3.add',compact('category_one'));
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
            'category_one_id' => 'required',
            'category_two_id' => 'required',
            'name' => 'required|unique:category_threes,name,NULL,id,deleted_at,NULL,category_one_id,'.$request->category_one_id.',category_two_id,'.$request->category_two_id,
         ])->validate();

        $category_three = new Category_three();
        $category_three->name       = $request->name;
        $category_three->category_one_id       = $request->category_one_id;
        $category_three->category_two_id       = $request->category_two_id;
        $category_three->remark       = $request->remark;
        $category_three->created_by = 0;
        $category_three->updated_by = 0;
      if ($category_three->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category_three  $category_three
     * @return \Illuminate\Http\Response
     */
    public function show(Category_three $category_three,$id)
    {
        $category_three=Category_three::find($id);
        return view('admin.master.category_3.show',compact('category_three'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category_three  $category_three
     * @return \Illuminate\Http\Response
     */
    public function edit(Category_three $category_three,$id)
    {
        $category_three=Category_three::find($id);
        $category_one=Category_one::all();
        return view('admin.master.category_3.edit',compact('category_three','category_one'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category_three  $category_three
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category_three $category_three,$id)
    {
        $validator = Validator::make($request->all(), [
            'category_one_id' => 'required',
            'category_two_id' => 'required',
            'name' => 'required|unique:category_threes,name,'.$id.',id,deleted_at,NULL,category_one_id,'.$request->category_one_id.',category_two_id,'.$request->category_two_id,
         ])->validate();

        $category_three = Category_three::find($id);
        $category_three->name       = $request->name;
        $category_three->category_one_id       = $request->category_one_id;
        $category_three->category_two_id       = $request->category_two_id;
        $category_three->remark       = $request->remark;
       $category_three->updated_by = 0;
      if ($category_three->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category_three  $category_three
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category_three $category_three,$id)
    {
        $category_three = Category_three::find($id);
        if ($category_three->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }
}
