<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PaymentRequest;
use App\Models\PaymentProcess;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class PaymentProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment_process.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $supplier = Supplier::all();
        $payment_req = PaymentRequest::all();
        return view('admin.payment_process.add',compact('supplier','date','payment_req'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment_process = new PaymentProcess();
        $payment_process->voucher_no       = $request->voucher_no;
        $payment_process->voucher_date      =  "2020-11-20";
        $payment_process->supplier_id      = $request->supplier_id;
        $payment_process->payment_request_id      = $request->request_no;
        $payment_process->ledger = $request->nature;
        $payment_process->purchase_id =  1;
        $payment_process->purchase_amount =  5000;
        $payment_process->payment_mode =  $request->mode;
        $payment_process->remarks =  $request->remark;
        $payment_process->active_status = 1;
        $payment_process->created_by = 0;
        $payment_process->updated_by = 0;

        if ($payment_process->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
