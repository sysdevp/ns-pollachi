<?php

namespace App\Http\Controllers;

use App\Models\Giftvoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GiftvoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gift_voucher=Giftvoucher::all();
        return view('admin.master.gift_voucher.view',compact('gift_voucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.gift_voucher.add');
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
            'name' => 'required|unique:giftvouchers,name,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:giftvouchers,code,NULL,id,deleted_at,NULL',
            'value' => 'required',
            'valid_from' => 'required',
            'valid_to' => 'required',
            
         ])->validate();

        $giftvoucher = new Giftvoucher();
        $giftvoucher->name       = $request->name;
        $giftvoucher->code       = $request->code;
        $giftvoucher->value       = $request->value;
        $giftvoucher->valid_from       = date('Y-m-d',strtotime($request->valid_from));
        $giftvoucher->valid_to       = date('Y-m-d',strtotime($request->valid_to));
        $giftvoucher->remark      =  $request->remark;
        $giftvoucher->created_by = 0;
        $giftvoucher->updated_by = 0;
      if ($giftvoucher->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function show(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher=Giftvoucher::find($id);
        return view('admin.master.gift_voucher.show',compact('giftvoucher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher=Giftvoucher::find($id);
        return view('admin.master.gift_voucher.edit',compact('giftvoucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher = Giftvoucher::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:giftvouchers,name,'.$id.',id,deleted_at,NULL',
            'code' => 'required|unique:giftvouchers,code,'.$id.',id,deleted_at,NULL',
            'value' => 'required',
            'valid_from' => 'required',
            'valid_to' => 'required',
            
         ])->validate();
        $giftvoucher->name       = $request->name;
        $giftvoucher->code       = $request->code;
        $giftvoucher->value       = $request->value;
        $giftvoucher->valid_from       = date('Y-m-d',strtotime($request->valid_from));
        $giftvoucher->valid_to       = date('Y-m-d',strtotime($request->valid_to));
        $giftvoucher->remark      =  $request->remark;
        $giftvoucher->created_by = 0;
        $giftvoucher->updated_by = 0;
      if ($giftvoucher->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giftvoucher  $giftvoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giftvoucher $giftvoucher,$id)
    {
        $giftvoucher = Giftvoucher::find($id);
        if ($giftvoucher->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
