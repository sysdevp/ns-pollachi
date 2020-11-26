<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ReceiptProcess;

class ReceiptProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.receipt_process.view');
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
        return view('admin.receipt_process.add',compact('supplier','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receipt_process = new ReceiptProcess();
        $receipt_process->voucher_no       = $request->receipt_no;
        $receipt_process->voucher_date      =  "2020-11-20";
        $receipt_process->supplier_id      = $request->supplier_id;
        $receipt_process->payment_request_id      = $request->receipt_request_no;
        $receipt_process->ledger = $request->nature;
        $receipt_process->purchase_id =  1;
        $receipt_process->purchase_amount =  5000;
        $receipt_process->payment_mode =  $request->mode;
        $receipt_process->remarks =  $request->remark;
        $receipt_process->active_status = 1;
        $receipt_process->created_by = 0;
        $receipt_process->updated_by = 0;

        if ($receipt_process->save()) {
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
