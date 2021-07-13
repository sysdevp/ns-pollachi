<?php

namespace App\Http\Controllers;

use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DenominationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denomination=Denomination::all();
        return view('admin.master.denomination.view',compact('denomination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.denomination.add');
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
            'amount' => 'required|unique:denominations,amount,NULL,id,deleted_at,NULL',
         ])->validate();

        $denomination = new Denomination();
        $denomination->amount       = $request->amount;
        $denomination->remark      =  $request->remark;
        $denomination->created_by = 0;
        $denomination->updated_by = 0;
      if ($denomination->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function show(Denomination $denomination,$id)
    {
        $denomination=Denomination::find($id);
        return view('admin.master.denomination.show',compact('denomination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function edit(Denomination $denomination,$id)
    {
        $denomination=Denomination::find($id);
        return view('admin.master.denomination.edit',compact('denomination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denomination $denomination,$id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|unique:denominations,amount,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $denomination = Denomination::find($id);
        $denomination->amount       = $request->amount;
        $denomination->remark      =  $request->remark;
        $denomination->created_by = 0;
        $denomination->updated_by = 0;
      if ($denomination->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denomination $denomination,$id)
    {
        $denomination = Denomination::find($id);
        if ($denomination->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
