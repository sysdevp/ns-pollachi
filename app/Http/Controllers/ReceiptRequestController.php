<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ReceiptRequest;

use Illuminate\Support\Facades\Redirect;

class ReceiptRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $receipt_request=ReceiptRequest::all();
       return view('admin.receipt_request.view',compact('receipt_request'));
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
        return view('admin.receipt_request.add',compact('supplier','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment_request = new ReceiptRequest();
        $payment_request->request_no       = $request->receipt_no;
        $payment_request->request_date      =  "2020-11-21";
        $payment_request->supplier_id      = $request->supplier_id;
        $payment_request->ledger = $request->nature;
        $payment_request->sales_id =  1;
        $payment_request->request_amount =  5000;
        $payment_request->active_status = 1;
        $payment_request->created_by = 0;
        $payment_request->updated_by = 0;

        if ($payment_request->save()) {
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
