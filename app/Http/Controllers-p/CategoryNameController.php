<?php

namespace App\Http\Controllers;

use App\Models\CategoryName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_name=CategoryName::all();
        return view('admin.master.category_name.view',compact('category_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.category_name.add');
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
            'category_name_1' => 'required|unique:category_names,category_1,NULL,id,deleted_at,NULL',
            'category_name_2' => 'required|unique:category_names,category_2,NULL,id,deleted_at,NULL',
            'category_name_3' => 'required|unique:category_names,category_3,NULL,id,deleted_at,NULL',
            ])->validate();

        $category_name = new CategoryName();
        $category_name->category_1       = $request->category_name_1;
        $category_name->category_2       = $request->category_name_2;
        $category_name->category_3       = $request->category_name_3;
         $category_name->created_by = 0;
        $category_name->updated_by = 0;
      if ($category_name->save()) {
            return Redirect::to('master/category-name')->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryName $categoryName,$id)
    {
        $category_name=CategoryName::find($id);
        return view('admin.master.category_name.show',compact('category_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryName $categoryName,$id)
    {
        $category_name=CategoryName::find($id);
        return view('admin.master.category_name.edit',compact('category_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryName $categoryName,$id)
    {
        $validator = Validator::make($request->all(), [
            'category_name_1' => 'required|unique:category_names,category_1,'.$id.',id,deleted_at,NULL',
            'category_name_2' => 'required|unique:category_names,category_2,'.$id.',id,deleted_at,NULL',
            'category_name_3' => 'required|unique:category_names,category_3,'.$id.',id,deleted_at,NULL',
            ])->validate();

        $category_name = CategoryName::find($id);
        $category_name->category_1       = $request->category_name_1;
        $category_name->category_2       = $request->category_name_2;
        $category_name->category_3       = $request->category_name_3;
         $category_name->created_by = 0;
        $category_name->updated_by = 0;
      if ($category_name->save()) {
            return Redirect::to('master/category-name')->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryName $categoryName)
    {
        //
    }
}
