<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\ReceiptProcess;
use App\Models\ReceiptRequest;
use App\Models\SaleEntry;
use App\Models\AdvanceSettlementCustomer;
use App\Models\ReceiptProcessAdjustments;
use App\Models\ReceiptVoucherType;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $customer = Customer::all();
        $receipt_req = ReceiptRequest::all();
        $sale_entry = SaleEntry::all();
        $type = ReceiptVoucherType::where('name','Receipt Process')->get();
        return view('admin.receipt_process.add',compact('customer','date','receipt_req','sale_entry','type'));
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
        $receipt_process->voucher_date      =  $request->receipt_date;
        $receipt_process->customer_id      = $request->customer_id;
        $receipt_process->receipt_request_id      = $request->request_no;
        $receipt_process->ledger = $request->nature;
        $receipt_process->s_no =  $request->s_no;
        
        $receipt_process->payment_mode =  $request->mode;
        if($request->mode==3){
        $receipt_process->receipt_amount =  $request->total_net_value;
        $receipt_process->net_value =  $request->total_net_value;
        } else {
        $receipt_process->receipt_amount =  $request->bill_amount;
        $receipt_process->net_value =  $request->bill_amount;    
        }

        $receipt_process->remarks =  $request->remark;    
        $receipt_process->active_status = 1;
        $receipt_process->created_by = 0;
        $receipt_process->updated_by = 0;
        $receipt_process->save();
        $adv_array = isset($request->adv_id) ? ($request->adv_id) : 0;
        if($adv_array==0){
         $adv_id_cnt = 0;
        } else {
         $adv_id_cnt = count($request->adv_id);    
        }
        
       
        for($i=0;$i<$adv_id_cnt;$i++)
        {
        $receipt_process_adjustments = new ReceiptProcessAdjustments();
        $receipt_process_adjustments->receipt_process_id = $request->receipt_no;
        $receipt_process_adjustments->advance_receipt_no = $request->adv_id[$i];
        $receipt_process_adjustments->amount = $request->amount[$i];
        $receipt_process_adjustments->active_status = "1";
        $receipt_process_adjustments->created_by = 0;
        $receipt_process_adjustments->updated_by = 0;
        $receipt_process_adjustments->save();
        }
         if($receipt_process) {

            $voucher_type = $request->voucher_type;

        $voucher_num = ReceiptVoucherType::where('id',$request->voucher_type)->first();

        $digits = $voucher_num->no_digits;  
        $updated_no = $voucher_num->updated_no; 
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=ReceiptProcess::orderBy('created_at','DESC')->first();                  

         if($voucher_num->updated_no == null && $vouchers != null) 
         {
            @$voucher_num->updated_no == null ? $next_no = 1 : $next_no = $voucher_num->updated_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
              
         }                  
         else if($voucher_num->updated_no != null && $vouchers == null)
         {
            $next_no=$updated_no+1;

            if($numlength >= $voucher_num->no_digits) 
            {
                $current_voucher_num = $next_no;
            }
            else
            {
                $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
                
            }
          

          $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
        
         }
         else 
         {

            @$voucher_num->updated_no == null ? $next_no = 1 : $next_no = $voucher_num->updated_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
         } 

            ReceiptVoucherType::where('id',$request->voucher_type)
                        ->update(['updated_no' => $current_voucher_num]);

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

    public function voucher_type(Request $request)
    {
        $voucher_num = ReceiptVoucherType::where('id',$request->voucher_type)->first();

        $digits = $voucher_num->no_digits;  
        $updated_no = $voucher_num->updated_no; 
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=ReceiptProcess::orderBy('created_at','DESC')->first();                  

         if($voucher_num->updated_no == null && $vouchers != null) 
         {
            @$voucher_num->updated_no == null ? $next_no = 1 : $next_no = $voucher_num->updated_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
              
         }                  
         else if($voucher_num->updated_no != null && $vouchers == null)
         {
            $next_no=$updated_no+1;

            if($numlength >= $voucher_num->no_digits) 
            {
                $current_voucher_num = $next_no;
            }
            else
            {
                $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
                
            }
          

          $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
        
         }
         else 
         {

            @$voucher_num->updated_no == null ? $next_no = 1 : $next_no = $voucher_num->updated_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
         }

        return $voucher_no;
    }

     public function advance_entry_det(Request $request)
    {
        $customer_id = $request->customer_id;
        $purchaseentry_datas = AdvanceSettlementCustomer::where('customer_id',$customer_id)->get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){

            
         $paid_amount = ReceiptProcessAdjustments::where('advance_receipt_no',$purchaseentry_data->voucher_no)->sum('amount'); 
         $pending_amount = $purchaseentry_data->advance_amount - $paid_amount;

            $result.='<tr><td>'.$purchaseentry_data->voucher_no.'</td><td>'.$purchaseentry_data->receipt_date.'</td><td>'.$purchaseentry_data->advance_amount.'</td><td>'.$pending_amount.'</td><td><input type="hidden" name="adv_id[]" class="adv_id" id="adv_id" value='.$purchaseentry_data->voucher_no.'><input type="text" name="amount[]" value="0" class="receipt_amount" onkeyup="myfunction(this.value)" id="receipt_amount"></td></tr>'; 
        }
       

        echo json_encode($result);exit;
    }

    public function sale_entry_det(Request $request)
    {
        $s_no = $request->s_no;
        $purchaseentry_datas = SaleEntry::where('s_no',$s_no)->get();
        $paid_amount = 0;
        $remaining_value =0;
        $result = '';
        foreach($purchaseentry_datas as $purchaseentry_data){
         $paid_amount = ReceiptProcess::where('s_no',$purchaseentry_data->s_no)->sum('receipt_amount'); 
         $pending_amount = $purchaseentry_data->total_net_value - $paid_amount;
            
            $result.='<tr id="single_row"><td>'.$purchaseentry_data->s_no.'</td><td>'.$purchaseentry_data->p_date.'</td><td>'.$purchaseentry_data->total_net_value.'</td><td>'.$paid_amount.'</td><td>'.$pending_amount.'</td></tr>'; 
        }
       

        echo json_encode($result);exit;
    }
}
