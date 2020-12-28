<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\ReceiptProcess;
use App\Models\ReceiptRequest;
use App\Models\SaleEntry;
use DateTime;

class ReceivablePartywiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        $purchaseentry_datas = SaleEntry::get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){
         $paid_amount = ReceiptProcess::where('s_no',$purchaseentry_data->s_no)->sum('receipt_amount');
         $purchaseentry_data['paid_amount'] = $paid_amount;
         $pending_amount = $purchaseentry_data->total_net_value - $paid_amount;
         $purchaseentry_data['pending_amount'] = $pending_amount;

         //no of days calculation
         $fdate = $purchaseentry_data->s_date;
         $tdate = date('Y-m-d');
         $datetime1 = new DateTime($fdate);
         $datetime2 = new DateTime($tdate);
         $interval = $datetime1->diff($datetime2);
         $days = $interval->format('%a');
         $purchaseentry_data['no_of_days'] = $days;
                   
        }
        return view('admin.outstanding.receivables.partywise.bill',compact('purchaseentry_datas','supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
