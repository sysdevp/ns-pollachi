<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CategoryName;
use App\Models\LocationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bank=Bank::all();
        return view('admin.master.bank.view',compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.bank.add');
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
                'name' => 'required|unique:banks,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:banks,code,NULL,id,deleted_at,NULL',
            ])->validate();

            $bank = new Bank();
            $bank->name       = $request->name;
            $bank->code      =  $request->code;
            $bank->created_by = 0;
            $bank->updated_by = 0;
          if ($bank->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank,$id)
    {
        $bank=Bank::find($id);
        return view('admin.master.bank.show',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank,$id)
    {
        $bank=Bank::find($id);
        return view('admin.master.bank.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank,$id)
    {
        $bank = Bank::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:banks,name,'.$id.',id,deleted_at,NULL',
            'code' => 'required|unique:banks,code,'.$id.',id,deleted_at,NULL',
        ])->validate();
        $bank->name       = $request->name;
        $bank->code      =  $request->code;
        $bank->created_by = 0;
        $bank->updated_by = 0;
      if ($bank->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank,$id)
    {
        $bank = Bank::find($id);
        if ($bank->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }
}
