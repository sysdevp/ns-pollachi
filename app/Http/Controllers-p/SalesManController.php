<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesMan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SalesManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_man = SalesMan::all();
        return view('admin.master.sales_man.view',compact('sales_man'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.sales_man.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new SalesMan();

        $insert->name = $request->name;
        $insert->code = $request->code;
        $insert->address = $request->address;
        $insert->phone_no = $request->phone_no;
        $insert->email = $request->email;

        $insert->save();

        return Redirect::back()->with('success','Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_man = SalesMan::find($id);

        return view('admin.master.sales_man.show',compact('sales_man'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales_man = SalesMan::find($id);

        return view('admin.master.sales_man.edit',compact('sales_man'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales_man = SalesMan::find($id);

        $sales_man->name = $request->name;
        $sales_man->code = $request->code;
        $sales_man->address = $request->address;
        $sales_man->phone_no = $request->phone_no;
        $sales_man->email = $request->email;

        $sales_man->save();

        return Redirect::back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SalesMan::find($id);
        $delete->delete();

        return Redirect::back()->with('success','Deleted Successfully');
    }
}
