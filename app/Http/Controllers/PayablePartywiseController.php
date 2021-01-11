<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PaymentProcess;
use App\Models\PaymentRequest;
use App\Models\PurchaseEntry;
use DateTime;

class PayablePartywiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supplier = Supplier::all();
        $initial_page = "1";
       
        return view('admin.outstanding.payables.partywise.bill',compact('initial_page','supplier'));
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
        $purchaseentry_datas = PurchaseEntry::where('supplier_id',$id)->get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){
         $paid_amount = PaymentProcess::where('p_no',$purchaseentry_data->s_no)->sum('payment_amount');
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
        return view('admin.outstanding.payables.billwise.party_ledger_billwise',compact('purchaseentry_datas'));
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

     public function report(Request $request){
        $supplier = Supplier::all();
        $cond = [];
        // if(isset($request->supplier_id)){
                // $cond['supplier_id'] = $request->supplier_id; 
            // }
            // if(isset($request->from)) { 
                // $from = date('Y-m-d',strtotime($request->from)); 
            // }           
            // if(isset($request->to)) {
                // $to = date('Y-m-d',strtotime($request->to)); 
            // }
        // $initial_page = "0";
        // $purchaseentry_datas = PurchaseEntry::where($cond)->whereBetween('p_date',[$from,$to])->get();
		$purchaseentry_datas = Supplier::get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){
         $paid_amount = PaymentProcess::where('p_no',$purchaseentry_data->p_no)->sum('payment_amount');
         $purchaseentry_data['paid_amount'] = $paid_amount;
         $pending_amount = $purchaseentry_data->total_net_value - $paid_amount;
         $purchaseentry_data['pending_amount'] = $pending_amount;

         //no of days calculation
         $fdate = $purchaseentry_data->p_date;
         $tdate = date('Y-m-d');
         $datetime1 = new DateTime($fdate);
         $datetime2 = new DateTime($tdate);
         $interval = $datetime1->diff($datetime2);
         $days = $interval->format('%a');
         $purchaseentry_data['no_of_days'] = $days;
                   
        }
        return view('admin.outstanding.payables.partywise.bill',compact('purchaseentry_datas','supplier','initial_page'));

    }
}
