<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountHead;
use App\Models\PurchaseEntryItem;
use App\Models\SaleEntryItem;
use App\Models\Expense;
use DB;

class DayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		 $head = AccountHead::all();
        $array_details = [];
       // print_r($request->supplier_id);exit;
        if($request->nature)
          {
            $from_date = $request->from;
            $to_date = $request->to;
            if($request->nature=='1'){
				DB::enableQueryLog();
			$credit_heads= PurchaseEntryItem::join('purchase_entries','purchase_entry_items.p_no','=','purchase_entries.p_no')
                             ->where('purchase_entries.cancel_status','=',0)
                             ->where('purchase_entry_items.active','!=',0)
                             ->select('purchase_entries.p_no','purchase_entry_items.rate_exclusive_tax','purchase_entry_items.rate_inclusive_tax','purchase_entry_items.remaining_qty','purchase_entries.p_date')->get();

            foreach($credit_heads as $credit_head){
				
            $new_array = array();
            $new_array['date'] = $credit_head->p_date;
			$new_array['voucher_no'] = $credit_head->p_no;
			$new_array['nature'] = "Purchase";
            $new_array['particular_db'] = isset($credit_head->debit_head_det) ? ($credit_head->debit_head_det->name) : '-';
            $new_array['debit'] = $credit_head->rate_exclusive_tax;
            $new_array['credit'] = 0;
            array_push($array_details, $new_array);
			
			$new_array_gst = array();
            $new_array_gst['date'] = $credit_head->p_date;
			$new_array_gst['voucher_no'] = $credit_head->p_no;
			$new_array_gst['nature'] = "gst";
            $new_array_gst['particular_db'] = isset($credit_head->debit_head_det) ? ($credit_head->debit_head_det->name) : '-';
            $new_array_gst['debit'] = $credit_head->rate_inclusive_tax;
            $new_array_gst['credit'] = 0;
            array_push($array_details, $new_array_gst);
            }
            }
			else {
			 $debit_heads= SaleEntryItem::join('sale_entries','sale_entry_items.p_no','=','sale_entries.p_no')
                             ->select('sale_entries.s_no','sale_entry_items.rate_exclusive_tax','sale_entry_items.rate_inclusive_tax','sale_entry_items.remaining_qty','sale_entries.s_date');
            foreach($debit_heads as $debit_head){
			$new_array_debit = array();
            $new_array_debit['date'] = $debit_head->s_date;
			$new_array_debit['voucher_no'] = $debit_head->s_no;
			$new_array_debit['nature'] = "Sales";
            $new_array_debit['particular_db'] = isset($debit_head->debit_head_det) ? ($debit_head->debit_head_det->name) : '-';
            $new_array_debit['debit'] = 0;
            $new_array_debit['credit'] = $debit_head->rate_exclusive_tax;
            array_push($array_details, $new_array_debit);
			
			$new_array_debit_gst = array();
			$new_array_debit_gst['date'] = $debit_head->s_date;
			$new_array_debit_gst['voucher_no'] = $debit_head->s_no;
			$new_array_debit_gst['nature'] = "Sales";
            $new_array_debit_gst['particular_db'] = isset($debit_head->debit_head_det) ? ($debit_head->debit_head_det->name) : '-';
            $new_array_debit_gst['debit'] = 0;
            $new_array_debit_gst['credit'] = $debit_head->rate_exclusive_tax;
            array_push($array_details, $new_array_debit_gst);
          }
		  }
		  }
          else
          {
            $new_array = array();
            $new_array['sno'] = '';
            $new_array['date'] = '';
			$new_array['voucher_no'] = '';
			$new_array['nature'] = '';
            $new_array['particular_db'] = '';
            $new_array['particular_cd'] = '';
            $new_array['debit'] = '';
            $new_array['credit'] ='';
            array_push($array_details, $new_array);
            
           }  
    
        return view('admin.daybook.report',compact('head','array_details'));
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
