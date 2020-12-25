<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PaymentRequest;
use App\Models\PaymentProcess;
use App\Models\PurchaseEntry;
use App\Models\AdvanceSettlementSupplier;
use App\Models\PaymentProcessAdjustments;

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
        $payment_process=PaymentProcess::orderBy('id','DESC')->get();
        return view('admin.payment_process.view',compact('payment_process'));
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
        $purchase_entry = PurchaseEntry::all();
        return view('admin.payment_process.add',compact('supplier','date','payment_req','purchase_entry'));
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
        $payment_process->voucher_date      =  $request->payment_date;
        $payment_process->supplier_id      = $request->supplier_id;
        $payment_process->payment_request_id      = $request->request_no;
        $payment_process->ledger = $request->nature;
        $payment_process->p_no =  $request->p_no;
        
        $payment_process->payment_mode =  $request->mode;
        if($request->mode==3){
        $payment_process->payment_amount =  $request->total_net_value;
        $payment_process->net_value =  $request->total_net_value;
        } else {
        $payment_process->payment_amount =  $request->bill_amount;
        $payment_process->net_value =  $request->bill_amount;    
        }

        $payment_process->remarks =  $request->remark;    
        $payment_process->active_status = 1;
        $payment_process->created_by = 0;
        $payment_process->updated_by = 0;
        $payment_process->save();
        $adv_array = isset($request->adv_id) ? ($request->adv_id) : 0;
        if($adv_array==0){
         $adv_id_cnt = 0;
        } else {
         $adv_id_cnt = count($request->adv_id);    
        }
        
       
        for($i=0;$i<$adv_id_cnt;$i++)
        {
        $payment_process_adjustments = new PaymentProcessAdjustments();
        $payment_process_adjustments->payment_process_id = $request->voucher_no;
        $payment_process_adjustments->advance_voucher_no = $request->adv_id[$i];
        $payment_process_adjustments->amount = $request->amount[$i];
        $payment_process_adjustments->active_status = "1";
        $payment_process_adjustments->created_by = 0;
        $payment_process_adjustments->updated_by = 0;
        $payment_process_adjustments->save();
        }
       
        if($payment_process) {
            return Redirect::back()->with('success', 'Successfully created');
        }
         else {
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

     public function advance_entry_det(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $purchaseentry_datas = AdvanceSettlementSupplier::where('supplier_id',$supplier_id)->get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){

            
         $paid_amount = PaymentProcessAdjustments::where('advance_voucher_no',$purchaseentry_data->voucher_no)->sum('amount'); 
         $pending_amount = $purchaseentry_data->advance_amount - $paid_amount;

            $result.='<tr><td>'.$purchaseentry_data->voucher_no.'</td><td>'.$purchaseentry_data->payment_date.'</td><td>'.$purchaseentry_data->advance_amount.'</td><td>'.$pending_amount.'</td><td><input type="hidden" name="adv_id[]" class="adv_id" id="adv_id" value='.$purchaseentry_data->voucher_no.'><input type="text" name="amount[]" value="0" class="amount" onkeyup="myfunction(this.value)"></td></tr>'; 
        }
       

        echo json_encode($result);exit;
    }

    public function purchase_entry_det(Request $request)
    {
        $p_no = $request->p_no;
        $purchaseentry_datas = PurchaseEntry::where('p_no',$p_no)->get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){
         $paid_amount = PaymentProcess::where('p_no',$purchaseentry_data->p_no)->sum('payment_amount'); 
         $pending_amount = $purchaseentry_data->total_net_value - $paid_amount;
            
            $result.='<tr id="single_row"><td>'.$purchaseentry_data->p_no.'</td><td>'.$purchaseentry_data->p_date.'</td><td>'.$purchaseentry_data->total_net_value.'</td><td>'.$paid_amount.'</td><td>'.$pending_amount.'</td></tr>'; 
        }
       

        echo json_encode($result);exit;
    }
}
