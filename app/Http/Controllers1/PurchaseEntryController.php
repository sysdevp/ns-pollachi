<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Estimation;
use App\Models\Estimation_Item;
use App\Models\EstimationTax;
use App\Models\Estimation_Expense;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\Agent;
use App\Models\Brand;
use App\Models\AddressDetails;
use App\Models\ItemTaxDetails;
use App\Models\ItemBracodeDetails;
use App\Models\ExpenseType;
use App\Models\Tax;
use App\Models\Location;
use App\Models\AccountHead;
use Carbon\Carbon;
use App\Models\Purchase_Order;
use App\Models\PurchaseOrderBeta;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderBetaItem;
use App\Models\PurchaseOrderTax;
use App\Models\PurchaseOrderBetaTax;
use App\Models\PurchaseOrderBetaExpense;
use App\Models\PurchaseOrderExpense;
use App\Models\PurchaseEntry;
use App\Models\PurchaseEntryBeta;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntryBetaItem;
use App\Models\PurchaseEntryTax;
use App\Models\PurchaseEntryBetaTax;
use App\Models\PurchaseEntryExpense;
use App\Models\PurchaseEntryBetaExpense;
use App\Models\ReceiptNote;
use App\Models\ReceiptNoteBeta;
use App\Models\ReceiptNoteItem;
use App\Models\ReceiptNoteBetaItem;
use App\Models\ReceiptNoteTax;
use App\Models\ReceiptNoteBetaTax;
use App\Models\ReceiptNoteExpense;
use App\Models\ReceiptNoteBetaExpense;
use App\Models\RejectionOut;
use App\Models\RejectionOutBeta;
use App\Models\RejectionOutItem;
use App\Models\RejectionOutBetaItem;
use App\Models\RejectionOutExpense;
use App\Models\RejectionOutBetaExpense;
use App\Models\RejectionOutBetaTax;
use App\Models\RejectionOutTax;
use App\Models\DebitNote;
use App\Models\DebitNoteBeta;
use App\Models\DebitNoteItem;
use App\Models\DebitNoteBetaItem;
use App\Models\DebitNoteExpense;
use App\Models\DebitNoteBetaExpense;
use App\Models\DebitNoteTax;
use App\Models\DebitNoteBetaTax;
use Illuminate\Support\Facades\Redirect;
use App\Models\PaymentProcessAdjustments;
use App\Models\PaymentProcess;

class PurchaseEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $check_id = $id;

        /*Alpha*/
        $purchase_entry = PurchaseEntry::orderBy('p_no','ASC')->get();

        if(count($purchase_entry) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($purchase_entry as $key => $datas) 
        {
            $purchase_entry_items = PurchaseEntryItem::where('p_no',$datas->p_no)->get();

            $purchase_entry_expense = PurchaseEntryExpense::where('p_no',$datas->p_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($purchase_entry_items as $j => $value) 
            {

            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($purchase_entry_expense as $k => $values) 
            {
                $total_expense += $values->expense_amount;

            }

            $taxable_value[] =  $item_amount_total;
            $tax_value[] = $item_gst_rs_total;
            $total[] = $item_net_value_total;
            $expense_total[] = $total_expense;
            $total_discount[] = $discount;

        }
    }

    /*Beta*/

    $purchase_entry_beta = PurchaseEntryBeta::orderBy('p_no','ASC')->get();

        if(count($purchase_entry_beta) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($purchase_entry_beta as $key => $datas) 
        {
            $purchase_entry_items = PurchaseEntryBetaItem::where('p_no',$datas->p_no)->get();

            $purchase_entry_expense = PurchaseEntryBetaExpense::where('p_no',$datas->p_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($purchase_entry_items as $j => $value) 
            {

            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($purchase_entry_expense as $k => $values) 
            {
                $total_expense += $values->expense_amount;

            }

            $taxable_value_beta[] =  $item_amount_total;
            $tax_value_beta[] = $item_gst_rs_total;
            $total_beta[] = $item_net_value_total;
            $expense_total_beta[] = $total_expense;
            $total_discount_beta[] = $discount;

        }
    }
        $supplier = Supplier::all();
    $location = Location::all();

        return view('admin.purchase_entry.view',compact('purchase_entry','purchase_entry_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','supplier','location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::where('status',0)->get();
        $receipt_note = ReceiptNote::where('status',0)->get();
        $purchaseorder = Purchase_Order::where('status',0)->get();
        $purchase_entry = PurchaseEntry::all();
        $tax = Tax::all();
        $account_head = AccountHead::all();  
        $location = Location::all();      

        // $voucher_num=PurchaseEntry::orderBy('p_no','DESC')
        //                    ->select('p_no')
        //                    ->first();

        //  if ($voucher_num == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->p_no;
        //      $voucher_no=$current_voucher_num+1;
        
         
        //  }

        $voucher_num=PurchaseEntry::orderBy('created_at','DESC')->select('id')->first();
        $append = "PE";
        if ($voucher_num == null) 
         {
             $voucher_no=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_no = $append.$next_no;
        
         
         }
        // $voucher_no = str_random(6);

        return view('admin.purchase_entry.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','estimation','receipt_note','purchaseorder','tax','account_head','location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $p_no=PurchaseEntry::orderBy('p_no','DESC')
        //                    ->select('p_no')
        //                    ->first();

        //  if ($p_no == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$p_no->p_no;
        //      $voucher_no=$current_voucher_num+1;
        
        //  }
        if($request->has('check'))
        {
            $voucher_num=PurchaseEntryBeta::orderBy('created_at','DESC')->select('id')->first();
        }
        else
        {
            $voucher_num=PurchaseEntry::orderBy('created_at','DESC')->select('id')->first();
        }
      
      $tax = Tax::all();
        $append = "PE";
        if ($voucher_num == null) 
         {
             $voucher_no=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_no = $append.$next_no;
        
         
         }
         // $voucher_no = str_random(6);
         $voucher_date = $request->voucher_date;
         $estimation_date = $request->estimation_date;

        if($request->receipt_no)
        {
            $receipt_tag = 1;
            $receipt_note = ReceiptNote::where('rn_no',$request->receipt_no)->where('status',0)->update(['receipt_tag' => $receipt_tag]);
        }
        else
        {
            $receipt_tag = 0;
        }

        
        if($request->has('check'))
        {
            $purchase_entry = new PurchaseEntryBeta();
        }
        else
        {
            $purchase_entry = new PurchaseEntry();
        }


         

         $purchase_entry->p_no = $voucher_no;
         $purchase_entry->p_date = $voucher_date;
         $purchase_entry->po_no = $request->po_no;
         $purchase_entry->po_date = $request->po_date;
         $purchase_entry->estimation_no = $request->p_estimation_no;
         $purchase_entry->estimation_date = $request->p_estimation_date;
         $purchase_entry->rn_no = $request->receipt_no;
         $purchase_entry->rn_date = $request->receipt_date;
         $purchase_entry->receipt_tag = $receipt_tag;
         $purchase_entry->supplier_id = $request->supplier_id;
         $purchase_entry->overall_discount = $request->overall_discount;
         $purchase_entry->total_net_value = $request->total_price;
         $purchase_entry->round_off = $request->round_off;
         $purchase_entry->location = $request->location;

         $purchase_entry->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
        if($request->has('check'))
        {
            $purchase_entry_items = new PurchaseEntryBetaItem();
        }
        else
        {
            $purchase_entry_items = new PurchaseEntryItem();
        }

                $purchase_entry_items->p_no = $voucher_no;
                $purchase_entry_items->p_date = $voucher_date;
                $purchase_entry_items->po_no = $request->po_no;
                $purchase_entry_items->po_date = $request->po_date;
                $purchase_entry_items->estimation_no = $request->p_estimation_no;
                $purchase_entry_items->estimation_date = $request->p_estimation_date;
                $purchase_entry_items->rn_no = $request->receipt_no;
                $purchase_entry_items->rn_date = $request->receipt_date;
                $purchase_entry_items->item_sno = $request->invoice_sno[$i];
                $purchase_entry_items->item_id = $request->item_code[$i];
                $purchase_entry_items->actual_item_id = $request->item_code[$i];
                $purchase_entry_items->mrp = $request->mrp[$i];
                $purchase_entry_items->gst = $request->tax_rate[$i];
                $purchase_entry_items->rate_exclusive_tax = $request->exclusive[$i];
                $purchase_entry_items->rate_inclusive_tax = $request->inclusive[$i];
                $purchase_entry_items->qty = $request->quantity[$i];
                $purchase_entry_items->actual_qty = $request->quantity[$i];
                $purchase_entry_items->remaining_qty = $request->quantity[$i];
                $purchase_entry_items->remaining_after_debit = $request->quantity[$i];
                $purchase_entry_items->rejected_qty = 0;
                $purchase_entry_items->debited_qty = 0;
                $purchase_entry_items->r_out_debited_qty = 0;
                $purchase_entry_items->uom_id = $request->uom[$i];
                $purchase_entry_items->discount = $request->discount[$i];
                $purchase_entry_items->overall_disc = $request->overall_disc[$i];
                $purchase_entry_items->expenses = $request->expenses[$i];
                // $purchase_entry_items->b_or_w = $request->black_or_white[$i];

                $purchase_entry_items->save();

            
            
        }
         


         for($j=0;$j < $expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {

                if($request->has('check'))
                {
                    $purchase_entry_expense = new PurchaseEntryBetaExpense();
                }
                else
                {
                    $purchase_entry_expense = new PurchaseEntryExpense();
                }
                

                $purchase_entry_expense->p_no = $voucher_no;
                $purchase_entry_expense->p_date = $voucher_date;
                $purchase_entry_expense->po_no = $request->po_no;
                $purchase_entry_expense->po_date = $request->po_date;
                $purchase_entry_expense->estimation_no = $request->p_estimation_no;
                $purchase_entry_expense->estimation_date = $request->p_estimation_date;
                $purchase_entry_expense->rn_no = $request->receipt_no;
                $purchase_entry_expense->rn_date = $request->receipt_date;

                $purchase_entry_expense->expense_type = $request->expense_type[$j];
                $purchase_entry_expense->expense_amount = $request->expense_amount[$j];

                $purchase_entry_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

            if($request->has('check'))
            {
                $tax_details = new PurchaseEntryBetaTax;
            }
            else
            {
               $tax_details = new PurchaseEntryTax;
            }

               

               $tax_details->p_no = $voucher_no;
               $tax_details->p_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }



        $purchase_entry_no = $purchase_entry->p_no;

        if($request->has('check'))
        {
            $purchase_entry_print_data = PurchaseEntryBeta::where('p_no',$purchase_entry_no)->first();
        $address = AddressDetails::where('address_ref_id',$purchase_entry_print_data->supplier_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $purchase_entry_item_print_data = PurchaseEntryBetaItem::where('p_no',$purchase_entry_no)
                                                    ->get();

        $purchase_entry_expense_print_data = PurchaseEntryBetaExpense::where('p_no',$purchase_entry_no)->get(); 

        $amnt = $purchase_entry_print_data->total_net_value;
        }
        else
        {
           $purchase_entry_print_data = PurchaseEntry::where('p_no',$purchase_entry_no)->first();
        $address = AddressDetails::where('address_ref_id',$purchase_entry_print_data->supplier_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $purchase_entry_item_print_data = PurchaseEntryItem::where('p_no',$purchase_entry_no)
                                                    ->get();

        $purchase_entry_expense_print_data = PurchaseEntryExpense::where('p_no',$purchase_entry_no)->get(); 

        $amnt = $purchase_entry_print_data->total_net_value;
        }
        
        

        //amount in words

          $number = $amnt;
          $no = floor($number);
          $point = round($number - $no, 2) * 100;
          $hundred = null;
          $digits_1 = strlen($no);
          $i = 0;
          $str = array();
          $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
        " " . $digits[$counter] . $plural . " " . $hundred
        :
        $words[floor($number / 10) * 10]
        . " " . $words[$number % 10] . " "
        . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
        "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';

        //amount in words ends here
        //payment save coding
         $payment_process = new PaymentProcess();
        $payment_process->voucher_no       = $voucher_no;
        $payment_process->voucher_date      =  $voucher_date;
        $payment_process->supplier_id      = $request->supplier_id;
        $payment_process->p_no =  $voucher_no;
        
        $payment_process->payment_mode =  $request->mode;
        if($request->mode==3){
        $payment_process->payment_amount =  $request->total_net_value;
        $payment_process->net_value =  $request->total_net_value;
        }
        else if($request->mode==2 || $request->mode==4 || $request->mode==5) {
        $payment_process->payment_amount =  $request->bill_amount;
        $payment_process->net_value =  $request->bill_amount;
        $payment_process->payment_date =  $request->payment_date;
        $payment_process->reference_no =  $request->reference_no;
        $payment_process->remarks =  $request->remarks;
        }
        else {
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
                         

        if($request->save == 1)
        {
            return view('admin.purchase_entry.print',compact('purchase_entry_print_data','address','purchase_entry_item_print_data','purchase_entry_expense_print_data','result','points'));
        }



        return Redirect::back()->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase_entry = PurchaseEntry::where('p_no',$id)->first();
        $purchase_entry_items = PurchaseEntryItem::where('p_no',$id)->get();
        $purchase_entry_expense = PurchaseEntryExpense::where('p_no',$id)->get();
        $tax = ReceiptNoteTax::where('rn_no',$id)->get();

        //echo "<pre>"; print_r($purchase_entry_items);exit;

        $item_row_count = count($purchase_entry_items);
        $expense_row_count = count($purchase_entry_expense);


        if(isset($purchase_entry->supplier->name) && !empty($purchase_entry->supplier->name))
        {
            $supplier_id = $purchase_entry->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($purchase_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                $item_net_value[] = 0;
                $item_amount[] = 0;
                $item_gst_rs[] = 0;
            }  
            else
            {
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
            }


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;


            $item_data = PurchaseEntryItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            if($item_data->remaining_qty == 0)
            {
                $net_value[] = 0;
            }   
            else
            {
                $amount = ($item_data->remaining_qty + $item_data->rejected_qty) * $item_data->rate_exclusive_tax;
                $gst_rs = $amount * $item_data->gst / 100;
                $total_discount = $item_data->discount + $item_data->overall_disc;
                $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

                $net_value[] = $sum / $item_data->remaining_qty;
            }

        }  

        // $total_netvalue = $item_net_value_sum + $total_expense;

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.purchase_entry.show',compact('purchase_entry','purchase_entry_items','purchase_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax'));
    }

    public function show_beta($id)
    {
        $purchase_entry = PurchaseEntryBeta::where('p_no',$id)->first();
        $purchase_entry_items = PurchaseEntryBetaItem::where('p_no',$id)->get();
        $purchase_entry_expense = PurchaseEntryBetaExpense::where('p_no',$id)->get();
        $tax = ReceiptNoteBetaTax::where('rn_no',$id)->get();

        //echo "<pre>"; print_r($purchase_entry_items);exit;

        $item_row_count = count($purchase_entry_items);
        $expense_row_count = count($purchase_entry_expense);


        if(isset($purchase_entry->supplier->name) && !empty($purchase_entry->supplier->name))
        {
            $supplier_id = $purchase_entry->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($purchase_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                $item_net_value[] = 0;
                $item_amount[] = 0;
                $item_gst_rs[] = 0;
            }  
            else
            {
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
            }


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;


            $item_data = PurchaseEntryBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            if($item_data->remaining_qty == 0)
            {
                $net_value[] = 0;
            }   
            else
            {
                $amount = ($item_data->remaining_qty + $item_data->rejected_qty) * $item_data->rate_exclusive_tax;
                $gst_rs = $amount * $item_data->gst / 100;
                $total_discount = $item_data->discount + $item_data->overall_disc;
                $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

                $net_value[] = $sum / $item_data->remaining_qty;
            }

        }  

        // $total_netvalue = $item_net_value_sum + $total_expense;

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.purchase_entry.show',compact('purchase_entry','purchase_entry_items','purchase_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beta_checking_value = 0;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::where('status',0)->get();
        $receipt_notes = ReceiptNote::where('status',0)->get();
        $purchaseorder = Purchase_Order::where('status',0)->get();
        $account_head = AccountHead::all();
        $location = Location::all();

        $purchase_entry = PurchaseEntry::where('p_no',$id)->first();
        $purchase_entry_items = PurchaseEntryItem::where('p_no',$id)
                                                ->get();
        $purchase_entry_expense = PurchaseEntryExpense::where('p_no',$id)->get();
        $tax = PurchaseEntryTax::where('p_no',$id)->get();
        $payment_process = PaymentProcess::where('p_no',$id)->first();

        $item_row_count = count($purchase_entry_items);
        $expense_row_count = count($purchase_entry_expense);

        $total_expense = $purchase_entry_expense->sum('expense_amount');

        $po_no = $purchase_entry->po_no;

        $rn_no = $purchase_entry->rn_no;
        $purchase_type = '';

        if ($po_no != '') 
        {
            $purchaseorder_details = Purchase_Order::where('po_no',$po_no)->first();
            
            $purchaseorder_type = $purchaseorder_details->purchase_type;

            if($purchaseorder_type == 1)
            {
               $purchase_type = 'Cash Purchase';
            }
            else
            {

                $purchase_type = 'Credit Purchase';
            }

        }

        else
        {

        }
        // echo $purchase_type;exit();
        if ($rn_no != '') 
        {
            $receipt_note = ReceiptNote::where('rn_no',$rn_no)->first();
            $po_no = $receipt_note->po_no;
            if ($po_no != '') 
            {
                $purchaseorder_details = Purchase_Order::where('po_no',$po_no)->first();
                $purchaseorder_type = $purchaseorder_details->purchase_type;

                if($purchaseorder_type == 1)
                {
                   $purchase_type = 'Cash Purchase';
                }
                else
                {
                    $purchase_type = 'Credit Purchase';
                }

            }
            
        }
        else
        {

        }


        if(isset($purchase_entry->supplier->name) && !empty($purchase_entry->supplier->name))
        {
            $supplier_id = $purchase_entry->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($purchase_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                $item_net_value[] = 0;
                $item_amount[] = 0;
                $item_gst_rs[] = 0;
            }  
            else
            {
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
            }


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;


            $item_data = PurchaseEntryItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            if($item_data->remaining_qty == 0)
            {
                $net_value[] = 0;
            }   
            else
            {
                $amount = ($item_data->remaining_qty + $item_data->rejected_qty) * $item_data->rate_exclusive_tax;
                $gst_rs = $amount * $item_data->gst / 100;
                $total_discount = $item_data->discount + $item_data->overall_disc;
                $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

                $net_value[] = $sum / $item_data->remaining_qty;
            }

        }  

        $total_netvalue = $item_net_value_sum + $total_expense;

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.purchase_entry.edit',compact('date','receipt_notes','categories','supplier','agent','brand','expense_type','item','estimation','purchaseorder','purchase_entry','purchase_entry_items','purchase_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','purchase_type','total_netvalue','tax','account_head','location','total_discount','beta_checking_value','payment_process'));
    }

    public function edit_beta($id)
    {
        $beta_checking_value = 1;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::where('status',0)->get();
        $receipt_notes = ReceiptNoteBeta::where('status',0)->get();
        $purchaseorder = PurchaseOrderBeta::where('status',0)->get();
        $account_head = AccountHead::all();
        $location = Location::all();

        $purchase_entry = PurchaseEntryBeta::where('p_no',$id)->first();
        $purchase_entry_items = PurchaseEntryBetaItem::where('p_no',$id)
                                                ->get();
        $purchase_entry_expense = PurchaseEntryBetaExpense::where('p_no',$id)->get();
        $tax = PurchaseEntryBetaTax::where('p_no',$id)->get();
        $payment_process = PaymentProcess::where('p_no',$id)->first();

        $item_row_count = count($purchase_entry_items);
        $expense_row_count = count($purchase_entry_expense);

        $total_expense = $purchase_entry_expense->sum('expense_amount');

        $po_no = $purchase_entry->po_no;

        $rn_no = $purchase_entry->rn_no;
        $purchase_type = '';

        if ($po_no != '') 
        {
            $purchaseorder_details = PurchaseOrderBeta::where('po_no',$po_no)->first();
            
            $purchaseorder_type = $purchaseorder_details->purchase_type;

            if($purchaseorder_type == 1)
            {
               $purchase_type = 'Cash Purchase';
            }
            else
            {

                $purchase_type = 'Credit Purchase';
            }

        }

        else
        {

        }
        // echo $purchase_type;exit();
        if ($rn_no != '') 
        {
            $receipt_note = ReceiptNoteBeta::where('rn_no',$rn_no)->first();
            $po_no = $receipt_note->po_no;
            if ($po_no != '') 
            {
                $purchaseorder_details = PurchaseOrderBeta::where('po_no',$po_no)->first();
                $purchaseorder_type = $purchaseorder_details->purchase_type;

                if($purchaseorder_type == 1)
                {
                   $purchase_type = 'Cash Purchase';
                }
                else
                {
                    $purchase_type = 'Credit Purchase';
                }

            }
            
        }
        else
        {

        }


        if(isset($purchase_entry->supplier->name) && !empty($purchase_entry->supplier->name))
        {
            $supplier_id = $purchase_entry->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($purchase_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                $item_net_value[] = 0;
                $item_amount[] = 0;
                $item_gst_rs[] = 0;
            }  
            else
            {
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
            }


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;


            $item_data = PurchaseEntryBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            if($item_data->remaining_qty == 0)
            {
                $net_value[] = 0;
            }   
            else
            {
                $amount = ($item_data->remaining_qty + $item_data->rejected_qty) * $item_data->rate_exclusive_tax;
                $gst_rs = $amount * $item_data->gst / 100;
                $total_discount = $item_data->discount + $item_data->overall_disc;
                $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

                $net_value[] = $sum / $item_data->remaining_qty;
            }

        }  

        $total_netvalue = $item_net_value_sum + $total_expense;

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.purchase_entry.edit',compact('date','receipt_notes','categories','supplier','agent','brand','expense_type','item','estimation','purchaseorder','purchase_entry','purchase_entry_items','purchase_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','purchase_type','total_netvalue','tax','account_head','location','total_discount','beta_checking_value','payment_process'));

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
        // $purchase_entries = PurchaseEntryItem::where('p_no',$id)->get();

        // foreach ($request->item_code as $key => $value) {
           
        //    $purchase_entry_item = PurchaseEntryItem::where('p_no',$request->p_no)->where('item_id',$value)->first();

        //    $remaining_qty[] = $purchase_entry_item->remaining_qty;
        //    $remaining_qty[] = $purchase_entry_item->rejected_qty;

        // }
        if($request->beta_checking_value == 1)
        {
            $purchase_entry_data = PurchaseEntryBeta::where('p_no',$id);
            $purchase_entry_data->delete();

            $purchase_entry_tax_data = PurchaseEntryBetaTax::where('p_no',$id);
            $purchase_entry_tax_data->delete();

            $purchase_entry_item_data = PurchaseEntryBetaItem::where('p_no',$id);
            $purchase_entry_item_data->delete();

            $purchase_entry_expense_data = PurchaseEntryBetaExpense::where('p_no',$id);
            $purchase_entry_expense_data->delete();

            $purchase_entry_payment_data = PaymentProcess::where('voucher_no',$id); 
            $purchase_entry_payment_data->delete(); 
        }
        else
        {
            $purchase_entry_data = PurchaseEntry::where('p_no',$id);
            $purchase_entry_data->delete();

            $purchase_entry_tax_data = PurchaseEntryTax::where('p_no',$id);
            $purchase_entry_tax_data->delete();

            $purchase_entry_item_data = PurchaseEntryItem::where('p_no',$id);
            $purchase_entry_item_data->delete();

            $purchase_entry_expense_data = PurchaseEntryExpense::where('p_no',$id);
            $purchase_entry_expense_data->delete();  

            $purchase_entry_payment_data = PaymentProcess::where('voucher_no',$id); 
            $purchase_entry_payment_data->delete();
        }
        

        // $purchase_entry_item_details = PurchaseEntryItem::where('p_no',$id)->get();
        // $purchase_entry_item_count = count($purchase_entry_item_details);
        // foreach ($purchase_entry_item_details as $key => $value) {
        //     $remaining_qty[] = $value->remaining_qty;
        // }

        

        $voucher_date = $request->voucher_date;
        $voucher_no = $request->voucher_no;

        if($request->receipt_no)
        {
            if($request->beta_checking_value == 1)
            {
                $receipt_tag = 1;
            $receipt_note = ReceiptNoteBeta::where('rn_no',$request->receipt_no)->where('status',0)->update(['receipt_tag' => $receipt_tag]);
            }
            else
            {
                $receipt_tag = 1;
            $receipt_note = ReceiptNote::where('rn_no',$request->receipt_no)->where('status',0)->update(['receipt_tag' => $receipt_tag]);
            }
            
        }
        else
        {
            $receipt_tag = 0;
        }

        $tax = Tax::all();


        // $debit_item = DebitNoteItem::where('p_no',$request->p_no)->get();
        // $debit_count = count($debit_item);
        // if($debit_count != 0 || $debit_count != '')
        // {
        //     foreach ($request->item_code as $key => $value) 
        //     {
        //         $debit_note_item = DebitNoteItem::where('p_no',$id)->where('item_id',$value)->latest()->first();

        //         $debit_note_item->actual_purchase_qty = $request->quantity[$key];
        //         $debit_note_item->save();
        
        //     }
        // }
        


        if($request->beta_checking_value == 1)
        {
           $purchase_entry = new PurchaseEntryBeta(); 
        }
        else
        {
            $purchase_entry = new PurchaseEntry();
        }
         

         $purchase_entry->p_no = $voucher_no;
         $purchase_entry->p_date = $voucher_date;
         $purchase_entry->po_no = $request->po_no;
         $purchase_entry->po_date = $request->po_date;
         $purchase_entry->estimation_no = $request->p_estimation_no;
         $purchase_entry->estimation_date = $request->p_estimation_date;
         $purchase_entry->rn_no = $request->receipt_no;
         $purchase_entry->rn_date = $request->receipt_date;
         $purchase_entry->receipt_tag = $receipt_tag;
         $purchase_entry->supplier_id = $request->supplier_id;
         $purchase_entry->overall_discount = $request->overall_discount;
         $purchase_entry->total_net_value = $request->total_price;
         $purchase_entry->round_off = $request->round_off;
         $purchase_entry->location = $request->location;


         $purchase_entry->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;
         if($expense_count == 0)
         {
            $expense_count =1;
         }

         for($i=0;$i<$items_count;$i++)

        {

                if($request->beta_checking_value == 1)
                {
                    $purchase_entry_items = new PurchaseEntryBetaItem();
                }
                else
                {
                    $purchase_entry_items = new PurchaseEntryItem();
                }

                

                $purchase_entry_items->p_no = $voucher_no;
                $purchase_entry_items->p_date = $voucher_date;
                $purchase_entry_items->po_no = $request->po_no;
                $purchase_entry_items->po_date = $request->po_date;
                $purchase_entry_items->estimation_no = $request->p_estimation_no;
                $purchase_entry_items->estimation_date = $request->p_estimation_date;
                $purchase_entry_items->rn_no = $request->receipt_no;
                $purchase_entry_items->rn_date = $request->receipt_date;
                $purchase_entry_items->item_sno = $request->invoice_sno[$i];
                $purchase_entry_items->item_id = $request->item_code[$i];
                $purchase_entry_items->actual_item_id = $request->item_code[$i];
                $purchase_entry_items->mrp = $request->mrp[$i];
                $purchase_entry_items->gst = $request->tax_rate[$i];
                $purchase_entry_items->rate_exclusive_tax = $request->exclusive[$i];
                $purchase_entry_items->rate_inclusive_tax = $request->inclusive[$i];
                $purchase_entry_items->qty = $request->quantity[$i];
                $purchase_entry_items->actual_qty = $request->quantity[$i];
                $purchase_entry_items->remaining_qty = $request->quantity[$i];
                $purchase_entry_items->remaining_after_debit = $request->quantity[$i];
                $purchase_entry_items->rejected_qty = 0;
                $purchase_entry_items->debited_qty = 0;
                $purchase_entry_items->r_out_debited_qty = 0;
                $purchase_entry_items->uom_id = $request->uom[$i];
                $purchase_entry_items->discount = $request->discount[$i];
                $purchase_entry_items->overall_disc = $request->overall_disc[$i];
                $purchase_entry_items->expenses = $request->expenses[$i];
                // $purchase_entry_items->b_or_w = $request->black_or_white[$i];

                $purchase_entry_items->save();

            
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                if($request->beta_checking_value == 1)
                {
                    $purchase_entry_expense = new PurchaseEntryBetaExpense();
                }
                else
                {
                    $purchase_entry_expense = new PurchaseEntryExpense();
                }
                

                $purchase_entry_expense->p_no = $voucher_no;
                $purchase_entry_expense->p_date = $voucher_date;
                $purchase_entry_expense->po_no = $request->po_no;
                $purchase_entry_expense->po_date = $request->po_date;
                $purchase_entry_expense->estimation_no = $request->p_estimation_no;
                $purchase_entry_expense->estimation_date = $request->p_estimation_date;
                $purchase_entry_expense->rn_no = $request->receipt_no;
                $purchase_entry_expense->rn_date = $request->receipt_date;
                $purchase_entry_expense->expense_type = $request->expense_type[$j];
                $purchase_entry_expense->expense_amount = $request->expense_amount[$j];

                $purchase_entry_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';


            if($request->beta_checking_value == 1)
            {
                $tax_details = new PurchaseEntryBetaTax;
            }
            else
            {
                $tax_details = new PurchaseEntryTax;
            }
               

               $tax_details->p_no = $voucher_no;
               $tax_details->p_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }


        $purchase_entry_no = $purchase_entry->p_no;

        if($request->beta_checking_value == 1)
        {
            $purchase_entry_print_data = PurchaseEntryBeta::where('p_no',$purchase_entry_no)->first();
            $address = AddressDetails::where('address_ref_id',$purchase_entry_print_data->supplier_id)
                                     ->where('address_table','=','Supplier')
                                     ->first();

            $purchase_entry_item_print_data = PurchaseEntryBetaItem::where('p_no',$purchase_entry_no)
                                                        ->get();

            $purchase_entry_expense_print_data = PurchaseEntryBetaExpense::where('p_no',$purchase_entry_no)->get(); 

            $amnt = $purchase_entry_print_data->total_net_value;
        }
        else
        {
            $purchase_entry_print_data = PurchaseEntry::where('p_no',$purchase_entry_no)->first();
            $address = AddressDetails::where('address_ref_id',$purchase_entry_print_data->supplier_id)
                                     ->where('address_table','=','Supplier')
                                     ->first();

            $purchase_entry_item_print_data = PurchaseEntryItem::where('p_no',$purchase_entry_no)
                                                        ->get();

            $purchase_entry_expense_print_data = PurchaseEntryExpense::where('p_no',$purchase_entry_no)->get(); 

            $amnt = $purchase_entry_print_data->total_net_value;
        }
        
        

        //amount in words

          $number = $amnt;
          $no = floor($number);
          $point = round($number - $no, 2) * 100;
          $hundred = null;
          $digits_1 = strlen($no);
          $i = 0;
          $str = array();
          $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
        " " . $digits[$counter] . $plural . " " . $hundred
        :
        $words[floor($number / 10) * 10]
        . " " . $words[$number % 10] . " "
        . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
        "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';

        //amount in words ends here

        //payment save coding
         $payment_process = new PaymentProcess();
        $payment_process->voucher_no       = $voucher_no;
        $payment_process->voucher_date      =  $voucher_date;
        $payment_process->supplier_id      = $request->supplier_id;
        $payment_process->p_no =  $voucher_no;
        
        $payment_process->payment_mode =  $request->mode;
        if($request->mode==3){
        $payment_process->payment_amount =  $request->total_net_value;
        $payment_process->net_value =  $request->total_net_value;
        }
        else if($request->mode==2 || $request->mode==4 || $request->mode==5) {
        $payment_process->payment_amount =  $request->bill_amount;
        $payment_process->net_value =  $request->bill_amount;
        $payment_process->payment_date =  $request->payment_date;
        $payment_process->reference_no =  $request->reference_no;
        $payment_process->remarks =  $request->remarks;
        }
        else {
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
        
       
        // for($i=0;$i<$adv_id_cnt;$i++)
        // {
        // $payment_process_adjustments = new PaymentProcessAdjustments();
        // $payment_process_adjustments->payment_process_id = $request->voucher_no;
        // $payment_process_adjustments->advance_voucher_no = $request->adv_id[$i];
        // $payment_process_adjustments->amount = $request->amount[$i];
        // $payment_process_adjustments->active_status = "1";
        // $payment_process_adjustments->created_by = 0;
        // $payment_process_adjustments->updated_by = 0;
        // $payment_process_adjustments->save();
        // }
                         

        if($request->save == 1)
        {
            return view('admin.purchase_entry.print',compact('purchase_entry_print_data','address','purchase_entry_item_print_data','purchase_entry_expense_print_data','result','points'));
        }


        return Redirect::back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase_entry_data = PurchaseEntry::where('p_no',$id);
        $purchase_entry_item_data = PurchaseEntryItem::where('p_no',$id);
        $purchase_entry_expense_data = PurchaseEntryExpense::where('p_no',$id);
        $purchase_entry_tax_data = PurchaseEntryTax::where('p_no',$id);
        $purchase_entry_payment_data = PaymentProcess::where('voucher_no',$id);

        $rejection_out = RejectionOut::where('p_no',$id);
        $rejection_out_item = RejectionOutItem::where('p_no',$id);
        $rejection_out_expense = RejectionOutExpense::where('p_no',$id);
        $rejection_out_tax = RejectionOutTax::where('p_no',$id);

        $debit_note = DebitNote::where('p_no',$id);
        $debit_note_item = DebitNoteItem::where('p_no',$id);
        $debit_note_expense = DebitNoteExpense::where('p_no',$id);
        $debit_note_tax = DebitNoteTax::where('p_no',$id);
        
        if($purchase_entry_data)
        {
            $purchase_entry_data->delete();
            $rejection_out->delete();
            $debit_note->delete();
            $purchase_entry_payment_data->delete();
        }
         if($purchase_entry_item_data)
         {
            $purchase_entry_item_data->delete();
            $rejection_out_item->delete();
            $debit_note_item->delete();
         }

         if($purchase_entry_expense_data)
         {
            $purchase_entry_expense_data->delete();
            $rejection_out_expense->delete();
            $debit_note_expense->delete();
         }
         if($purchase_entry_tax_data)
         {
            $purchase_entry_tax_data->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function delete_beta($id)
    {
        $purchase_entry_data = PurchaseEntryBeta::where('p_no',$id);
        $purchase_entry_item_data = PurchaseEntryBetaItem::where('p_no',$id);
        $purchase_entry_expense_data = PurchaseEntryBetaExpense::where('p_no',$id);
        $purchase_entry_tax_data = PurchaseEntryBetaTax::where('p_no',$id);

        $rejection_out = RejectionOutBeta::where('p_no',$id);
        $rejection_out_item = RejectionOutBetaItem::where('p_no',$id);
        $rejection_out_expense = RejectionOutBetaExpense::where('p_no',$id);
        $rejection_out_tax = RejectionOutBetaTax::where('p_no',$id);

        $debit_note = DebitNoteBeta::where('p_no',$id);
        $debit_note_item = DebitNoteBetaItem::where('p_no',$id);
        $debit_note_expense = DebitNoteBetaExpense::where('p_no',$id);
        $debit_note_tax = DebitNoteBetaTax::where('p_no',$id);
        
        if($purchase_entry_data)
        {
            $purchase_entry_data->delete();
            $rejection_out->delete();
            $debit_note->delete();
        }
         if($purchase_entry_item_data)
         {
            $purchase_entry_item_data->delete();
            $rejection_out_item->delete();
            $debit_note_item->delete();
         }

         if($purchase_entry_expense_data)
         {
            $purchase_entry_expense_data->delete();
            $rejection_out_expense->delete();
            $debit_note_expense->delete();
         }
         if($purchase_entry_tax_data)
         {
            $purchase_entry_tax_data->delete();
            $rejection_out_tax->delete();
            $debit_note_tax->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function address_details(Request $request)
    {
       $supplier_id = $request->supplier_id;

       $getdata = AddressDetails::
       join('suppliers','suppliers.id','=','address_details.address_ref_id')
       ->where('address_details.address_table','=','Supplier')
       ->where('address_details.address_ref_id','=',$supplier_id)
       ->first();


        $po_filter = Purchase_Order::where('supplier_id',$supplier_id)
                            ->select('po_date','po_no')
                            ->get();

        $estimation_filter = Estimation::where('supplier_id',$supplier_id)
                            ->select('estimation_date','estimation_no')
                            ->get();

        $receipt_filter = ReceiptNote::where('supplier_id',$supplier_id)
                            ->select('rn_date','rn_no')
                            ->get();


$count=0;

       $address="";
      
          if(isset($getdata->address_line_1) && !empty($getdata->address_line_1)){
            $address.=$getdata->address_line_1.", \n";
            
          }

          if(isset($getdata->address_line_2) && !empty($getdata->address_line_2)){
            $address.=$getdata->address_line_2.",  \n ";
            
          }


         if(isset($getdata->city->name)  || isset($getdata->district->name)){

            if(!empty($getdata->city->name)){
                $address.=$getdata->city->name." ,";
               
            }
           

            if(!empty($getdata->district->name)){
                $address.=$getdata->district->name." ,";
                $data[] = $getdata->district->id;
            }
            

            $address.="\n";

         }



         if(isset($getdata->state->name)  && !empty($getdata->state->name)){
             $address.=$getdata->state->name." -";
             
        if(isset($getdata->postal_code) && !empty($getdata->postal_code)){
            // $address.=" - ";
            $address.=$getdata->postal_code.',';
            
        }
             
             $address.="\n";
         }
         $address.="GST Number :".$getdata->gst_no;


         $po_options="";
         $receipt_options="";
         $estimation_options="";
         foreach ($estimation_filter as $key => $value) 
         {
            $estimation_options .= '<option value="'.$value->estimation_no.'">Estimation No:'.$value->estimation_no.' - Date:'.$value->estimation_date.'</option>';
         }
         foreach ($po_filter as $key => $value) 
         {
            $po_options .= '<option value="'.$value->po_no.'">PO No:'.$value->po_no.' - Date:'.$value->po_date.'</option>';
         }
         foreach ($receipt_filter as $key => $value) 
         {
            $receipt_options .= '<option value="'.$value->rn_no.'">PO No:'.$value->rn_no.' - Date:'.$value->rn_date.'</option>';
         }
         
         
         $result = array('address' => $address, 'po_options' => $po_options,'estimation_options' => $estimation_options,'receipt_options' => $receipt_options);
         echo json_encode($result);exit;


   return $address;   
        
    }


    public function getdata(Request $request,$id)
    {
        $id=$request->id;
        $items=Item::where('id',$id)->first();

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc')
                    ->first();

        if(isset($items->category->gst_no) && $items->category->gst_no != '' && $items->category->gst_no != 0)
        {
            $tax_master_cgst = Tax::where('name','cgst')->first();
            $tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',$tax_master_sgst->id)
                                        ->first('valid_from');
                                        // return $tax_date; exit;

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->where('tax_master_id','!=',$tax_master_cgst->id)
                                ->where('tax_master_id','!=',$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */                    
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->get();

            foreach ($tax_view as $key => $value) 
            {
              $tax_val[] = $value->value;
              $tax_master[] = $value->tax_master_id;
            }      

            $cnt = count($tax_master);               

            /* end dynamic tax value */                    

            $sum = $tax_value + $items->category->gst_no;                            
            $data[] = array('igst' => $sum,'tax_val' => $tax_val,'tax_master' =>$tax_master,'cnt' => $cnt);
            
            
        }  
        else
        {
            $tax_master_cgst = Tax::where('name','cgst')->first();
            $tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->where('tax_master_id','!=',$tax_master_cgst->id)
                                ->where('tax_master_id','!=',$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */                    
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->get();

            foreach ($tax_view as $key => $value) 
            {
              $tax_val[] = $value->value;
              $tax_master[] = $value->tax_master_id;
            }      

            $cnt = count($tax_master);               

            /* end dynamic tax value */                    

            $data[] = array('igst' => $tax_value,'tax_val' => $tax_val,'tax_master' =>$tax_master, 'cnt' => $cnt);     

        }          
         
        $data[] =ItemBracodeDetails::where('item_id','=',$id)
                                    ->select('barcode')
                                    ->first();
        if($data[1]=='')  
        {
            $data[1]=0;
        } 
        else if($data[2]=='')  
        {
            $data[2]='';
        }  

        //return $items->item_type;

        if($items->item_type != 'Parent')
        {
        $item_id=$this->get_parent_item_id($id);
          //dd($item_id);
        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_id'=>$value->id);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;                              
        return $data;
        }
        else
        {
        $item_id=$this->get_item_id($id);

        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_id'=>$value->id);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;                              
        return $data;
    }
    }

    public function remove_data(Request $request,$id)
    {

        $id = $request->data_val;

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc')
                    ->first();

        if(isset($items->category->gst_no) && $items->category->gst_no != '' && $items->category->gst_no != 0)
        {
            $tax_master_cgst = Tax::where('name','cgst')->first();
            $tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->where('tax_master_id','!=',$tax_master_cgst->id)
                                ->where('tax_master_id','!=',$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */                    
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->get();

            foreach ($tax_view as $key => $value) 
            {
              $tax_val[] = $value->value;
              $tax_master[] = $value->tax_master_id;
            }      

            $cnt = count($tax_master);               

            /* end dynamic tax value */                  

            $sum = $tax_value + $items->category->gst_no;                            
            $data[] = array('igst' => $sum,'tax_val' => $tax_val,'tax_master' =>$tax_master,'cnt' => $cnt);
            
            
        }  
        else
        {
            $tax_master_cgst = Tax::where('name','cgst')->first();
            $tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->where('tax_master_id','!=',$tax_master_cgst->id)
                                ->where('tax_master_id','!=',$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */      
                          
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',$tax_date->valid_from)
                                ->get();

            foreach ($tax_view as $key => $value) 
            {
              $tax_val[] = $value->value;
              $tax_master[] = $value->tax_master_id;
            }   

            $cnt = count($tax_master);                  

            /* end dynamic tax value */                    

            $data[] = array('igst' => $tax_value,'tax_val' => $tax_val,'tax_master' =>$tax_master, 'cnt' => $cnt);    

        }

        return $data;
        
    }


    function child_category($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->childCategories)>0)
             {
                $test=$this->child_category($value->childCategories);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_category_id($category_id)
   {
    $category=category::with('childCategories')->where('id',$category_id)->get();
    $output_array=[];
    foreach($category as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->childCategories)>0)
        {
            $result=$this->child_category($value->childCategories);
            array_push($output_array,$result);
        }  
    }

    $result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }
    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
   }

   public function browse_item(Request $request,$id)
   {
    $browse_item = $request->browse_item;

    $data = Item::where('name',$browse_item)->get();
    $result ="";
    foreach ($data as $key => $value) 
    {
        if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
        $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';
        
    }
    return $result;
   }

    public function change_items(Request $request,$id)
    {
        $categories=$request->categories;
        $category_id=$this->get_category_id($categories);
        $brand=$request->brand;
        $result="";
        $item=array();
        if($categories !="" && $brand == "no_val"){
             $item=Item::whereIn('category_id',$category_id)->get();
        }else if($categories !="" && $brand != "" && $brand != "no_val" ){
            $item=Item::whereIn('category_id',$category_id)->where('brand_id',$brand)->get();
        }
       
        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';

             // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }
         return $result;
        





        
        // if($brand != 'no_val')
        // {
        //     $items = Item::join('brands','brands.id','=','items.brand_id')
        //              ->join('categories','categories.id','=','items.category_id')
        //              ->where('items.category_id','=',$categories)
        //              ->where('items.brand_id','=',$brand)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','brands.id as brand_id','brands.name as brand_name','items.ptc','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        // foreach ($items as $key => $value) {
        //      $item_id=$value->item_id;

        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        //          }  

        //      $data[] = $items;
        // }
        // else
        // {
        //     $items = Item::join('categories','categories.id','=','items.category_id')
        //              ->where('items.category_id','=',$categories)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','items.brand_id','items.ptc','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        //              $items_1 = Item::all();
        //             // ->select('items.id as item_id','items.code as item_code','items.name as item_name','items.brand_id','items.ptc','categories.id as categories_id','categories.name as category_name')
                    

        //              print_r($items_1); exit;


        // // foreach ($items as $key => $values) {
        // //                   if(isset($value->brand->name)  && !empty($value->brand->name)){
        // //      $data[]=$value->brand->name;
        // //     }
        // //              }             

        // foreach ($items as $key => $value) {
        //      $item_id=$value->item_id;

        //     //  if(isset($value->brand->name)  && !empty($value->brand->name)){
        //     //  $brand_name=$value->brand->name;
        //     // }
        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        //         // $data[$key]=$brand_name;
        //          }  

        //      $data[] = $items;
        // }
        
          
                   

        //   return $data;

    }

    public function brand_filter(Request $request)
    {
        
        $brand=$request->brand;
        $result="";
        $item=array();
        $item=Item::where('brand_id',$brand)->get();

        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_brand"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';

             // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }
         return $result;
        
        // $items = Item::join('brands','brands.id','=','items.brand_id')
        //              ->join('categories','categories.id','=','items.category_id')
        //              ->where('items.brand_id','=',$brand)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','brands.id as brand_id','brands.name as brand_name','items.ptc','items.mrp','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        // foreach ($items as $key => $value) 
        // {
        //      $item_id=$value->item_id;

        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        // }  

        // $data[] = $items;      
        

        // return $data;
          

    }

    // function uom_selection($item_id)
    // {
    //     $uoms = Item::where('id',$item_id)->select('uom_for_repack_item','uom_id')->first();
    //     if($uoms->uom_for_repack_item == '')
    //                {
    //                 return $uoms;
    //                }
    //                else
    //                {
    //                 $parent_id=$uoms->id;
    //                 $uoms = Item::where('id',$parent_id)->select('uom_for_repack_item','uom_id')->first();
    //                 uom_selection($parent_id);
    //                }
    // }

    function parentItem($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->parentItem)>0)
             {
                $test=$this->parentItem($value->parentItem);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_parent_item_id($item_id)
   {
    //return $item_id;

     $item=item::with('parentItem')->where('id',$item_id)->get();
   
    $output_array=[];
    foreach($item as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->parentItem)>0)
        {
            $result=$this->parentItem($value->parentItem);
            array_push($output_array,$result);
        } 

    }
$result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }

    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
}

    function childItem($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->childItem)>0)
             {
                $test=$this->childItem($value->childItem);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_item_id($item_id)
   {

     $item=item::with('childItem')->where('id',$item_id)->get();
   
    $output_array=[];
    foreach($item as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->childItem)>0)
        {
            $result=$this->childItem($value->childItem);
            $result_val=$this->parentItem($value->childItem);
            array_push($output_array,$result,$result_val);
        } 

    }

    $result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }

    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
   }

    public function getdata_item(Request $request,$id)
    {
        $id=$request->id;

        $item = Item::join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('*','items.id as item_id')
                    ->get();

                    $cnt=count($item);
                    foreach ($item as $key => $value) 
                    {
                        $item_id= $value->item_id;
                    }
                   
                   // $data[] = $this->uom_selection($item_id);
                   
                   

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name') 
                    ->first();
                    

        $data[] =ItemTaxDetails::where('item_id','=',$item_id)
                                ->orderBy('valid_from','DESC')
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->select('igst')
                                ->first();

        if($data[1]=='')  
        {
            $data[1]=0;
        }         


        $item_id=$this->get_item_id($item_id);
          //dd($item_id);
        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_code'=>$value->code);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;
        $data[]=$cnt;
                                
        return $data;
    }

    public function same_items(Request $request,$id)
    {

        $id = $request->id;
              $result="";  
        $item = Item::join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('*','item_bracode_details.barcode as item_barcode','items.id as item_id','items.code as item_code','items.name as item_name','mrp','hsn','ptc','code')
                    //->groupBy('item_bracode_details.item_id')
                    ->get();
                    //return count($item);
        foreach($item as $key=>$value){

            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";
            

            $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_append_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->item_id.'" class="item_id'.$key.'"><input type="hidden" value="1" class="append_value'.$key.'"><input type="hidden" value="'.$value->item_code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->item_code.'</font></td><td><input type="hidden" value="'.$value->item_name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->item_name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name.'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name.'</font></td><td><input type="hidden" value="'.$value->item_barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->item_barcode.'</font></td></tr>'; 

            // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }        

        return $result;

    }
    
    public function item_details($id)
    {

        $item_details = PurchaseEntryItem::where('p_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.purchase_entry.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function item_beta_details($id)
    {

        $item_details = PurchaseEntryBetaItem::where('p_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.purchase_entry.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = PurchaseEntryExpense::where('p_no',$id)->get();
        return view('admin.purchase_entry.expense_details',compact('expense_details'));
    }

    public function expense_beta_details($id)
    {
        $expense_details = PurchaseEntryBetaExpense::where('p_no',$id)->get();
        return view('admin.purchase_entry.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = PurchaseEntryItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

        if($item_data == '')
        {
            $value = 0;
            return $value; 
        }   
        else
        {
            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $net_value = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $value = $net_value / $item_data->remaining_qty;
            return $value; 
        }    
                              
    }


    function po_alpha_beta(Request $request)
    {  

      $po_no = "";
      $rn_no = "";
      if($request->id == 1)
      {

        $voucher_num=PurchaseEntryBeta::orderBy('created_at','DESC')->select('id')->first();
        $append = "PE";
        if ($voucher_num == null) 
         {
             $voucher_no=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_no = $append.$next_no;
        
         
         }

        $purchaseorder = PurchaseOrderBeta::where('status',0)->get();

        $receipt_note = ReceiptNoteBeta::where('status',0)->get();

        foreach ($purchaseorder as $key => $value) {
         $po_no.= "<option value=".$value->po_no.">".$value->po_no."</option>";
        }

        foreach ($receipt_note as $key => $value) {
         $rn_no.= "<option value=".$value->rn_no.">".$value->rn_no."</option>";
        }
        

        $result_array = array('po_no' => $po_no, 'rn_no' => $rn_no, 'voucher_no' => $voucher_no);
      }
      else
      {

        $voucher_num=PurchaseEntry::orderBy('created_at','DESC')->select('id')->first();
        $append = "PE";
        if ($voucher_num == null) 
         {
             $voucher_no=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_no = $append.$next_no;
        
         
         }

        $purchaseorder = Purchase_Order::where('status',0)->get();

        $receipt_note = ReceiptNote::where('status',0)->get();

        foreach ($purchaseorder as $key => $value) {
         $po_no.= "<option value=".$value->po_no.">".$value->po_no."</option>";
        }

        foreach ($receipt_note as $key => $value) {
         $rn_no.= "<option value=".$value->rn_no.">".$value->rn_no."</option>";
        }
        

        $result_array = array('po_no' => $po_no, 'rn_no' => $rn_no, 'voucher_no' => $voucher_no);
      }

      echo json_encode($result_array); exit();


    }



    public function estimation_details(Request $request)
    {
        $estimation_no = $request->p_estimation_no;

        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = AccountHead::all();
        $estimation =Estimation::all();

        // $voucher_num=ReceiptNote::orderBy('rn_no','DESC')
        //                    ->select('rn_no')
        //                    ->first();

        //  if ($voucher_num == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->o_no;
        //      $voucher_no=$current_voucher_num+1;
        
         
        //  }

        $estimation = Estimation::where('estimation_no',$estimation_no)->first();
        $estimation_item = Estimation_Item::where('estimation_no',$estimation_no)->get();
        $estimation_expense = Estimation_Expense::where('estimation_no',$estimation_no)->get();
        $estimation_tax = EstimationTax::where('estimation_no',$estimation_no)->get();

        $round_off = $estimation->round_off;
        $overall_discount = $estimation->overall_discount;
         $total_net_value = $estimation->total_net_value;
         $date_estimation = $estimation->estimation_date;
         $estimation_no = $estimation->estimation_no;

        $item_row_count = count($estimation_item);
        $expense_row_count = count($estimation_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($estimation_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;


            $item_data = Estimation_Item::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->qty;
            // $net_value = $amount + $gst_rs - $item_data->discount;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="1" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        $expense_typess="";
        $expense_cnt=0;
        foreach($estimation_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]">@if(isset($value->expense_types->name) && !empty($value->expense_types->name))<option value="'.$value->expense_types->id.'">'.$value->expense_types->name.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    if($expense_cnt == 0)
    {
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>';
        foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
        $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    $tax_append = "";
    foreach ($estimation_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_estimation'=>$date_estimation,'estimation_no'=>$estimation_no,'expense_cnt'=>$expense_cnt,'tax_append' => $tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }


    public function po_details(Request $request)
    {
        $po_no = $request->po_no;
        $alpha_beta = $request->alpha_beta;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = AccountHead::all();
        $estimation =Estimation::all();

        $voucher_num=PurchaseEntry::orderBy('p_no','DESC')
                           ->select('p_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->o_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

         if($alpha_beta == 1)
         {
          $purchaseorder = PurchaseOrderBeta::where('po_no',$po_no)->first();
          $purchaseorder_item = PurchaseOrderBetaItem::where('po_no',$po_no)
                                                  ->get();
          $purchaseorder_expense = PurchaseOrderBetaExpense::where('po_no',$po_no)->get();
          $purchaseorder_tax = PurchaseOrderBetaTax::where('po_no',$po_no)->get();
         }
         else
         {

          $purchaseorder = Purchase_Order::where('po_no',$po_no)->first();
          $purchaseorder_item = PurchaseOrderItem::where('po_no',$po_no)
                                                  ->get();
          $purchaseorder_expense = PurchaseOrderExpense::where('po_no',$po_no)->get();
          $purchaseorder_tax = PurchaseOrderTax::where('po_no',$po_no)->get();

         }

        

        $round_off = $purchaseorder->round_off;
        $overall_discount = $purchaseorder->overall_discount;
         $total_net_value = $purchaseorder->total_net_value;
         $purchase_type = $purchaseorder->purchase_type;
         $date_purchaseorder = $purchaseorder->po_date;
         $date_estimation = $purchaseorder->estimation_date;
         $estimation_no = $purchaseorder->estimation_no;

        $item_row_count = count($purchaseorder_item);
        $expense_row_count = count($purchaseorder_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($purchaseorder_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;

            if($alpha_beta == 1)
            {
              $item_data = PurchaseOrderBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            else
            {
              $item_data = PurchaseOrderItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->qty;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        $expense_typess="";
        $expense_cnt=0;
        foreach($purchaseorder_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]">@if(isset($value->expense_types->name) && !empty($value->expense_types->name))<option value="'.$value->expense_types->id.'">'.$value->expense_types->name.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    if($expense_cnt == 0)
    {
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>';
        foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
        $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    $tax_append = "";
    foreach ($purchaseorder_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_purchaseorder'=>$date_purchaseorder,'purchase_type'=>$purchase_type,'date_estimation'=>$date_estimation,'estimation_no'=>$estimation_no,'expense_cnt'=>$expense_cnt,'tax_append' =>$tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }


    public function receipt_details(Request $request)
    {
        $receipt_no = $request->receipt_no;
        $alpha_beta = $request->alpha_beta;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = AccountHead::all();
        $estimation =Estimation::all();

        // $voucher_num=ReceiptNote::orderBy('rn_no','DESC')
        //                    ->select('rn_no')
        //                    ->first();

        //  if ($voucher_num == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->o_no;
        //      $voucher_no=$current_voucher_num+1;
        
         
        //  }

        if($alpha_beta == 1)
        {
          $receipt_note = ReceiptNoteBeta::where('rn_no',$receipt_no)->first();
          $receipt_note_item = ReceiptNoteBetaItem::where('rn_no',$receipt_no)
                                              ->get();
          $receipt_note_expense = ReceiptNoteBetaExpense::where('rn_no',$receipt_no)->get();
          $receipt_note_tax = ReceiptNoteBetaTax::where('rn_no',$receipt_no)->get();
        }
        else
        {
          $receipt_note = ReceiptNote::where('rn_no',$receipt_no)->first();
          $receipt_note_item = ReceiptNoteItem::where('rn_no',$receipt_no)
                                              ->get();
          $receipt_note_expense = ReceiptNoteExpense::where('rn_no',$receipt_no)->get();
          $receipt_note_tax = ReceiptNoteTax::where('rn_no',$receipt_no)->get();
        }

        

        $total_expense = $receipt_note_expense->sum('expense_amount');

        // return $total_expense; exit;

        $round_off = $receipt_note->round_off;
        $overall_discount = $receipt_note->overall_discount;
         $total_net_value = $receipt_note->total_net_value;
         $po_date = $receipt_note->po_date;
         $po_no = $receipt_note->po_no;
         $estimation_no = $receipt_note->estimation_no;
         $estimation_date = $receipt_note->estimation_date;
         $receipt_note_date = $receipt_note->rn_date;

         // $purchase_type = Purchase_Order::where('po_no',$po_no)
         //                                ->select('purchase_type')
         //                                ->first();
                                        // return $purchase_type;exit();

        $item_row_count = count($receipt_note_item);
        $expense_row_count = count($receipt_note_expense);
        $purchase_type = '';

        if ($po_no != '') 
        {
            $purchaseorder_details = Purchase_Order::where('po_no',$po_no)->first();
            $purchase_type = $purchaseorder_details->purchase_type;

        }


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($receipt_note_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;

            if($alpha_beta == 1)
            {
              $item_data = ReceiptNoteBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            else
            {
              $item_data = ReceiptNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }

            

            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->qty;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        $expense_typess="";
        $expense_cnt=0;
        foreach($receipt_note_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]">@if(isset($value->expense_types->name) && !empty($value->expense_types->name))<option value="'.$value->expense_types->id.'">'.$value->expense_types->name.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    if($expense_cnt == 0)
    {
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>';
        foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
        $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

    $tax_append = "";
    foreach ($receipt_note_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

    $total_sum = $item_net_value_sum + $total_expense;

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_estimation'=>$estimation_date,'estimation_no'=>$estimation_no,'po_no'=>$po_no,'po_date'=>$po_date,'expense_cnt'=>$expense_cnt,'purchase_type'=>$purchase_type,'receipt_note_date'=>$receipt_note_date,'total_sum',$total_sum,'tax_append' => $tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }

    public function cancel($id)
    {
        $purchase_entry = PurchaseEntry::where('p_no',$id)->first();

        $purchase_entry->cancel_status = 1;
        $purchase_entry->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function cancel_beta($id)
    {
        $purchase_entry = PurchaseEntryBeta::where('p_no',$id)->first();

        $purchase_entry->cancel_status = 1;
        $purchase_entry->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {
        $purchase_entry = PurchaseEntry::where('p_no',$id)->first();

        $purchase_entry->cancel_status = 0;
        $purchase_entry->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function retrieve_beta($id)
    {
        $purchase_entry = PurchaseEntryBeta::where('p_no',$id)->first();

        $purchase_entry->cancel_status = 0;
        $purchase_entry->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    
 public function report(Request $request)
    {
        $cond = [];
        if(isset($request->supplier_id)){$cond['supplier_id'] = $request->supplier_id; }
        if(isset($request->from)) {$from = date('Y-m-d',strtotime($request->from)); }           
        if(isset($request->to)) {$to = date('Y-m-d',strtotime($request->to)); }
        if(isset($request->location)) {$cond['location'] = $request->location;}
        $check_id = "";
        $purchase_entry = PurchaseEntry::where($cond)->whereBetween('p_date',[$from,$to])->orderBy('p_no','ASC')->get();


        if(count($purchase_entry) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($purchase_entry as $key => $datas) 
        {
            $purchase_entry_items = PurchaseEntryItem::where('p_no',$datas->p_no)->get();

            $purchase_entry_expense = PurchaseEntryExpense::where('p_no',$datas->p_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($purchase_entry_items as $j => $value) 
            {

            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($purchase_entry_expense as $k => $values) 
            {
                $total_expense += $values->expense_amount;

            }

            $taxable_value[] =  $item_amount_total;
            $tax_value[] = $item_gst_rs_total;
            $total[] = $item_net_value_total;
            $expense_total[] = $total_expense;
            $total_discount[] = $discount;

        }
    }

    /*Beta*/

    $purchase_entry_beta = PurchaseEntryBeta::orderBy('p_no','ASC')->get();

        if(count($purchase_entry_beta) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($purchase_entry_beta as $key => $datas) 
        {
            $purchase_entry_items = PurchaseEntryBetaItem::where('p_no',$datas->p_no)->get();

            $purchase_entry_expense = PurchaseEntryBetaExpense::where('p_no',$datas->p_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($purchase_entry_items as $j => $value) 
            {

            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($purchase_entry_expense as $k => $values) 
            {
                $total_expense += $values->expense_amount;

            }

            $taxable_value_beta[] =  $item_amount_total;
            $tax_value_beta[] = $item_gst_rs_total;
            $total_beta[] = $item_net_value_total;
            $expense_total_beta[] = $total_expense;
            $total_discount_beta[] = $discount;

        }
    }
        $supplier = Supplier::all();
    $location = Location::all();

        return view('admin.purchase_entry.view',compact('purchase_entry','purchase_entry_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','supplier','location','cond','from','to'));
    }


}
