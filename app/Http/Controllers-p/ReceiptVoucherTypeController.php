<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReceiptVoucherType;
use Illuminate\Support\Facades\Redirect;

class ReceiptVoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher_data = ReceiptVoucherType::all();
        return view('admin.master.receipt_voucher_type.view',compact('voucher_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.receipt_voucher_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher_data = new ReceiptVoucherType();

        $voucher_data->name = $request->name;
        $voucher_data->type = $request->type;
        $voucher_data->prefix = $request->prefix;
        $voucher_data->suffix = $request->suffix;
        $voucher_data->starting_no = $request->starting;
        $voucher_data->updated_no = $request->starting;
        $voucher_data->no_digits = $request->digits;

        $voucher_data->save();

        return Redirect::back()->with('success','Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher_data = ReceiptVoucherType::find($id);
        return view('admin.master.receipt_voucher_type.show',compact('voucher_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher_data = ReceiptVoucherType::find($id);
        return view('admin.master.receipt_voucher_type.edit',compact('voucher_data'));
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
        $voucher_data = ReceiptVoucherType::find($id);

        $voucher_data->name = $request->name;
        $voucher_data->type = $request->type;
        $voucher_data->prefix = $request->prefix;
        $voucher_data->suffix = $request->suffix;
        $voucher_data->starting_no = $request->starting;
        $voucher_data->updated_no = $request->starting;
        $voucher_data->no_digits = $request->digits;

        $voucher_data->save();

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
        $voucher_data = ReceiptVoucherType::find($id);

        $voucher_data->delete();
        return Redirect::back()->with('success','Deleted Successfully');
    }
}
