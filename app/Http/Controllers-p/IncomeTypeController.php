<?php

namespace App\Http\Controllers;

use App\IncomeType;
use App\Models\IncomeType as AppIncomeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class IncomeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_type=AppIncomeType::all();
        return view('admin.master.income_type.view',compact('income_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.income_type.add');
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
            'name' => 'required|unique:income_types,name,NULL,id,deleted_at,NULL',
            'type' => 'required',
        ])->validate();

        $income_type = new AppIncomeType();
        $income_type->name       = $request->name;
        $income_type->type       = $request->type;
        $income_type->remark       = $request->remark;
       $income_type->created_by = 0;
        $income_type->updated_by = 0;
      if ($income_type->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function show(AppIncomeType $incomeType,$id)
    {
        $incomeType=AppIncomeType::find($id);
        return view('admin.master.income_type.show',compact('incomeType'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function edit(AppIncomeType $incomeType,$id)
    {
        $incomeType=AppIncomeType::find($id);
        return view('admin.master.income_type.edit',compact('incomeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppIncomeType $incomeType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:income_types,name,'.$id.',id,deleted_at,NULL',
            'type' => 'required',
        ])->validate();

        $incomeType = AppIncomeType::find($id);
        $incomeType->name       = $request->name;
        $incomeType->type       = $request->type;
        $incomeType->remark       = $request->remark;
       $incomeType->created_by = 0;
        $incomeType->updated_by = 0;
      if ($incomeType->save()) {
            return Redirect::back()->with('success', 'Updated Successfully ');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppIncomeType $incomeType,$id)
    {
        $incomeType = AppIncomeType::find($id);
        if ($incomeType->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
