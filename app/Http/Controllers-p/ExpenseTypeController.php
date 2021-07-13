<?php

namespace App\Http\Controllers;

use App\ExpenseType;
use App\Models\ExpenseType as AppExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_type = AppExpenseType::all();
        return view('admin.master.expense_type.view',compact('expense_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.expense_type.add');
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
                'name' => 'required|unique:expense_types,name,NULL,id,deleted_at,NULL',
                'type' => 'required',
            ])->validate();

            $expense_type = new AppExpenseType();
            $expense_type->name       = $request->name;
            $expense_type->type       = $request->type;
            $expense_type->remark       = $request->remark;
           $expense_type->created_by = 0;
            $expense_type->updated_by = 0;
          if ($expense_type->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(AppExpenseType $expenseType,$id)
    {
        $expense_type = AppExpenseType::find($id);
        return view('admin.master.expense_type.show',compact('expense_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(AppExpenseType $expenseType,$id)
    {
        $expense_type = AppExpenseType::find($id);
        return view('admin.master.expense_type.edit',compact('expense_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppExpenseType $expenseType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:expense_types,name,'.$id.',id,deleted_at,NULL',
            'type' => 'required',
        ])->validate();

        $expense_type = AppExpenseType::find($id);
        $expense_type->name       = $request->name;
        $expense_type->type       = $request->type;
        $expense_type->remark       = $request->remark;
       $expense_type->created_by = 0;
        $expense_type->updated_by = 0;
      if ($expense_type->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppExpenseType $expenseType,$id)
    {
        $expense_type = AppExpenseType::find($id);
        if ($expense_type->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
