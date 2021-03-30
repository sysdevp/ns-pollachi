<?php

namespace App\Http\Controllers;

use App\Models\Category_one;
use App\Models\Category_two;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_two=Category_two::all();
        return view('admin.master.category_2.view',compact('category_two'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_one=Category_one::all();
        return view('admin.master.category_2.add',compact('category_one'));
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
            'name' => 'required|unique:category_twos,name,NULL,id,deleted_at,NULL,category_one_id,'.$request->category_one_id,
         ])->validate();

        $category_two = new Category_two();
        $category_two->name       = $request->name;
        $category_two->category_one_id       = $request->category_one_id;
        $category_two->remark       = $request->remark;
        $category_two->created_by = 0;
        $category_two->updated_by = 0;
      if ($category_two->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category_two  $category_two
     * @return \Illuminate\Http\Response
     */
    public function show(Category_two $category_two,$id)
    {
      
        $category_two=Category_two::find($id);
        return view('admin.master.category_2.show',compact('category_two'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category_two  $category_two
     * @return \Illuminate\Http\Response
     */
    public function edit(Category_two $category_two,$id)
    {
        $category_one=Category_one::all();
        $category_two=Category_two::find($id);
        return view('admin.master.category_2.edit',compact('category_one','category_two'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category_two  $category_two
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category_two $category_two,$id)
    {
        $validator = Validator::make($request->all(), [
            'category_one_id' => 'required',
            'name' => 'required|unique:category_twos,name,'.$id.',id,deleted_at,NULL,category_one_id,'.$request->category_one_id,
         ])->validate();

        $category_two = Category_two::find($id);
        $category_two->name       = $request->name;
        $category_two->category_one_id       = $request->category_one_id;
        $category_two->remark       = $request->remark;
        $category_two->created_by = 0;
        $category_two->updated_by = 0;
        if ($category_two->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category_two  $category_two
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category_two $category_two,$id)
    {
        $category_two = Category_two::find($id);
        if ($category_two->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
