<?php

namespace App\Http\Controllers;

use App\Models\Category_one;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_one=Category_one::all();
        return view('admin.master.category_1.view',compact('category_one'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.category_1.add');
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
            'name' => 'required|unique:category_ones,name,NULL,id,deleted_at,NULL',
           
        ])->validate();

        $category_one = new Category_one();
        $category_one->name       = $request->name;
       
        $category_one->created_by = 0;
        $category_one->updated_by = 0;
      if ($category_one->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category_one  $category_one
     * @return \Illuminate\Http\Response
     */
    public function show(Category_one $category_one,$id)
    {
        $category_one=Category_one::find($id);
        return view('admin.master.category_1.show',compact('category_one'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category_one  $category_one
     * @return \Illuminate\Http\Response
     */
    public function edit(Category_one $category_one,$id)
    {
        $category_one=Category_one::find($id);
        return view('admin.master.category_1.edit',compact('category_one'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category_one  $category_one
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category_one $category_one,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category_ones,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $category_one = Category_one::find($id);
        $category_one->name       = $request->name;
       
        $category_one->created_by = 0;
        $category_one->updated_by = 0;
      if ($category_one->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category_one  $category_one
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category_one $category_one,$id)
    {
        $category_one = Category_one::find($id);
        if ($category_one->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
