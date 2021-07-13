<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Estimation;
use App\Models\Estimation_Item;
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
use App\Models\VoucherNumbering;
use App\Models\Purchase_Order;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderExpense;
use App\Models\PurchaseEntry;
use App\Models\PurchaseEntryBeta;
use App\Models\PurchaseEntryBetaItem;
use App\Models\PurchaseEntryTax;
use App\Models\PurchaseEntryBetaTax;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntryBlackItem;
use App\Models\PurchaseEntryExpense;
use App\Models\PurchaseEntryBetaExpense;
use Illuminate\Support\Facades\Redirect;
use App\Models\RejectionOut;
use App\Models\RejectionOutBeta;
use App\Models\RejectionOutItem;
use App\Models\RejectionOutBetaItem;
use App\Models\RejectionOutTax;
use App\Models\RejectionOutBetaTax;
use App\Models\RejectionOutExpense;
use App\Models\RejectionOutBetaExpense;
use App\Models\ReceiptNote;
use App\Models\ReceiptNoteBeta;
use App\Models\ReceiptNoteTax;
use App\Models\ReceiptNoteBetaTax;
use App\Models\ReceiptNoteItem;
use App\Models\ReceiptNoteBetaItem;
use App\Models\ReceiptNoteExpense;
use App\Models\ReceiptNoteBetaExpense;
use App\Models\DebitNote;
use App\Models\DebitNoteBeta;
use App\Models\DebitNoteItem;
use App\Models\DebitNoteBetaItem;
use App\Models\DebitNoteExpense;
use App\Models\DebitNoteBetaExpense;
use App\Models\DebitNoteTax;
use App\Models\DebitNoteBetaTax;
use App\Models\PurchaseVoucherType;
use App\Models\UploadDocument;

class RejectionOutController extends Controller
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
        $rejection_out = RejectionOut::where('status',0)->where('active',1)->get();

        if(count($rejection_out) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($rejection_out as $key => $datas) 
        {
            $rejection_out_items = RejectionOutItem::where('r_out_no',$datas->r_out_no)->get();

            $rejection_out_expense = RejectionOutExpense::where('r_out_no',$datas->r_out_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($rejection_out_items as $j => $value) 
            {

            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($rejection_out_expense as $k => $values) 
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

    $rejection_out_beta = RejectionOutBeta::where('status',0)->where('active',1)->get();

        if(count($rejection_out_beta) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($rejection_out_beta as $key => $datas) 
        {
            $rejection_out_items = RejectionOutItem::where('r_out_no',$datas->r_out_no)->get();

            $rejection_out_expense = RejectionOutExpense::where('r_out_no',$datas->r_out_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($rejection_out_items as $j => $value) 
            {

            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($rejection_out_expense as $k => $values) 
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
        
        
        return view('admin.rejection_out.view',compact('rejection_out','rejection_out_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','supplier','location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dfd=PurchaseEntry::join('purchase_entry_items','purchase_entries.p_no','=','purchase_entry_items.p_no')->select('purchase_entries.p_no')->groupBy('purchase_entries.p_no')->havingRaw('sum(purchase_entry_items.remaining_qty)> 0')->get();

        //  echo "<pre>";print_r($dfd);exit;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::where('status',0)->get();
        $purchase_entry = PurchaseEntry::where('cancel_status',0)->get();
        $receipt_note = ReceiptNote::where('status',0)->get();
        $tax = Tax::all();
        $account_head = AccountHead::all();
        $location = Location::all();
        $voucher_type = PurchaseVoucherType::where('name','Rejection Out')->get();

        // $voucher_num=RejectionOut::orderBy('r_out_no','DESC')
        //                    ->select('r_out_no')
        //                    ->first();

         // if ($voucher_num == null) 
         // {
         //     $voucher_no=1;

                             
         // }                  
         // else
         // {
             // $current_voucher_num=$voucher_num->r_out_no;
             // $voucher_no=$current_voucher_num;
        
         
         // }

        // $voucher_num=RejectionOut::orderBy('created_at','DESC')->select('id')->first();
        // $append = "RO";
        // if ($voucher_num == null) 
        //  {
        //      $voucher_no=$append.'1';

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->id;
        //      $next_no=$current_voucher_num+1;

        //      $voucher_no = $append.$next_no;
        
         
        //  }
        // $voucher_no = str_random(6);

        $voucher_num=VoucherNumbering::where('id',5)
                           ->first();


        $digits = $voucher_num->digits;  
        $starting_no = $voucher_num->starting_no;   
        $numlength = strlen((string)$voucher_num->starting_no);   

        $vouchers=RejectionOut::orderBy('created_at','DESC')->select('voucher_no')->first();                  

         if($voucher_num->starting_no == null && $vouchers != null) 
         {
            @$vouchers->voucher_no == null ? $next_no = 1 : $next_no = $vouchers->voucher_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
              
         }                  
         else if($voucher_num->starting_no != null && $vouchers == null)
         {
            $next_no=$starting_no+1;

            if($numlength >= $voucher_num->digits) 
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

            @$vouchers->voucher_no == null ? $next_no = 1 : $next_no = $vouchers->voucher_no+1;
            $current_voucher_num = str_pad($next_no, $digits, '0', STR_PAD_LEFT);
            $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
         }


        return view('admin.rejection_out.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','receipt_note','estimation','purchase_entry','tax','account_head','location','voucher_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $r_out_no=RejectionOut::orderBy('r_out_no','DESC')
        //                    ->select('r_out_no')
        //                    ->first();

        //  if ($r_out_no == null) 
        //  {
        //      $voucher_no=1;
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$r_out_no->r_out_no;
        //      $voucher_no=$current_voucher_num+1;
        //  }
        if($request->has('check'))
        {
            // $voucher_num=RejectionOutBeta::orderBy('created_at','DESC')->select('id')->first();
            $vouchers=RejectionOutBeta::orderBy('created_at','DESC')->select('voucher_no')->first();
        }
        else
        {
            // $voucher_num=RejectionOut::orderBy('created_at','DESC')->select('id')->first();
            $vouchers=RejectionOut::orderBy('created_at','DESC')->select('voucher_no')->first();
        }
        
        $tax = Tax::all();

        $voucher_type = $request->voucher_type;


        $voucher_num=PurchaseVoucherType::where('id',$voucher_type)
                                        ->first();


        $digits = $voucher_num->digits;  
        $updated_no = $voucher_num->updated_no;   
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=RejectionOut::orderBy('created_at','DESC')->select('voucher_no')->first();                  

         if($voucher_num->updated_no == null && $voucher_num != null) 
         {
             $current_voucher_num=1;
             $voucher_no = $voucher_num->prefix.$current_voucher_num.$voucher_num->suffix;
              
         }                  
         else if($voucher_num->updated_no != null && $voucher_num == null)
         {
            $next_no=$updated_no+1;

            if($numlength >= $voucher_num->digits) 
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

          PurchaseVoucherType::where('id',$voucher_type)
                             ->update(['updated_no' => $current_voucher_num]);

        // $append = "RO";
        // if ($voucher_num == null) 
        //  {
        //      $voucher_val=$append.'1';

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->id;
        //      $next_no=$current_voucher_num+1;

        //      $voucher_val = $append.$next_no;
        
         
        //  }
         $voucher_date = $request->voucher_date;
         $estimation_date = $request->estimation_date;
         // echo $request->rn_no;exit;

         if($request->receipt_no == '')
         {

            foreach ($request->old_item_code as $key => $value) 
            {
                // $purchase_entry_black_item = PurchaseEntryBetaItem::where('p_no',$request->p_no)->where('item_id',$value);
                if($request->has('check'))
                {
                    $purchase_entry_item = PurchaseEntryBetaItem::where('p_no',$request->p_no)->where('item_id',$value)->first();
                }
                else
                {
                    $purchase_entry_item = PurchaseEntryItem::where('p_no',$request->p_no)->where('item_id',$value)->first();
                }

                


            if($purchase_entry_item->actual_item_id != $request->item_code[$key])
            {

                $child_unit = $purchase_entry_item->item->child_unit;
                $total_qty = $purchase_entry_item->remaining_qty * $child_unit;

                $subtracted_quantity = $total_qty - $request->rejected_item_qty[$key];

                $divided_value = $subtracted_quantity / $child_unit;

                $no_of_parents = intval($divided_value);
                $rejected_parents = $purchase_entry_item->actual_qty - $no_of_parents;

                $no_of_opened_qty = $rejected_parents * $child_unit;
                $remaining_quantity = $no_of_opened_qty - $request->rejected_item_qty[$key];


                if($no_of_parents != 0)
                {
                    $purchase_entry_old_items = new PurchaseEntryItem();    
            
                $purchase_entry_old_items->p_no = $purchase_entry_item->p_no;
                $purchase_entry_old_items->p_date = $purchase_entry_item->p_date;
                $purchase_entry_old_items->po_no = $purchase_entry_item->po_no;
                $purchase_entry_old_items->po_date = $purchase_entry_item->po_date;
                $purchase_entry_old_items->estimation_no = $purchase_entry_item->estimation_no;
                $purchase_entry_old_items->estimation_date = $purchase_entry_item->estimation_date;
                $purchase_entry_old_items->rn_no = $purchase_entry_item->rn_no;
                $purchase_entry_old_items->rn_date = $purchase_entry_item->rn_date;
                $purchase_entry_old_items->r_out_no = $purchase_entry_item->r_out_no;
                $purchase_entry_old_items->r_out_date = $purchase_entry_item->r_out_date;
                $purchase_entry_old_items->item_sno = $request->old_invoice_sno[$key];
                $purchase_entry_old_items->item_id = $request->old_item_code[$key];
                $purchase_entry_old_items->actual_item_id = $request->old_item_code[$key];
                $purchase_entry_old_items->mrp = $request->old_mrp[$key];
                $purchase_entry_old_items->gst = $request->old_tax_rate[$key];
                $purchase_entry_old_items->rate_exclusive_tax = $request->old_exclusive[$key];
                $purchase_entry_old_items->rate_inclusive_tax = $request->old_inclusive[$key];
                $purchase_entry_old_items->qty = $purchase_entry_item->qty;
                $purchase_entry_old_items->actual_qty = $purchase_entry_item->actual_qty;
                $purchase_entry_old_items->remaining_qty = $no_of_parents;
                $purchase_entry_old_items->rejected_qty = $rejected_parents;
                $purchase_entry_old_items->remarks = $request->old_remarks_val[$key];
                $purchase_entry_old_items->debited_qty = $request->old_debited_qty[$key];
                $purchase_entry_old_items->r_out_debited_qty =$request->old_r_out_debited_qty[$key];
                $purchase_entry_old_items->uom_id = $request->old_uom[$key];   
                // $purchase_entry_old_items->discount = $request->discount[$i];
                // $purchase_entry_old_items->overall_disc = $request->overall_disc[$i];
                // $purchase_entry_old_items->expenses = $request->expenses[$i];

                $purchase_entry_old_items->save();
                }
                

                $purchase_entry_items = new PurchaseEntryItem();    
            
                $purchase_entry_items->p_no = $purchase_entry_item->p_no;
                $purchase_entry_items->p_date = $purchase_entry_item->p_date;
                $purchase_entry_items->po_no = $purchase_entry_item->po_no;
                $purchase_entry_items->po_date = $purchase_entry_item->po_date;
                $purchase_entry_items->estimation_no = $purchase_entry_item->estimation_no;
                $purchase_entry_items->estimation_date = $purchase_entry_item->estimation_date;
                $purchase_entry_items->rn_no = $purchase_entry_item->rn_no;
                $purchase_entry_items->rn_date = $purchase_entry_item->rn_date;
                $purchase_entry_items->r_out_no = $purchase_entry_item->r_out_no;
                $purchase_entry_items->r_out_date = $purchase_entry_item->r_out_date;
                $purchase_entry_items->item_sno = $request->invoice_sno[$key];
                $purchase_entry_items->item_id = $request->item_code[$key];
                $purchase_entry_items->actual_item_id = $request->item_code[$key];
                $purchase_entry_items->mrp = $request->mrp[$key];
                $purchase_entry_items->gst = $request->tax_rate[$key];
                $purchase_entry_items->rate_exclusive_tax = $request->exclusive[$key];
                $purchase_entry_items->rate_inclusive_tax = $request->inclusive[$key];
                $purchase_entry_items->qty = $no_of_opened_qty;
                $purchase_entry_items->actual_qty = $no_of_opened_qty;
                $purchase_entry_items->remaining_qty = $remaining_quantity;
                $purchase_entry_items->rejected_qty = $request->rejected_item_qty[$key];
                $purchase_entry_items->remarks = $request->remarks_val[$key];
                $purchase_entry_items->debited_qty = $request->debited_qty[$key];
                $purchase_entry_items->r_out_debited_qty =$request->r_out_debited_qty[$key];
                $purchase_entry_items->uom_id = $request->uom[$key];   
                // $purchase_entry_items->discount = $request->discount[$i];
                // $purchase_entry_items->overall_disc = $request->overall_disc[$i];
                // $purchase_entry_items->expenses = $request->expenses[$i];

                $purchase_entry_items->save();

                $purchase_entry_item->active = 0;   
                $purchase_entry_item->save();

            }

            else
            {
                if($request->has('check'))
                {
                PurchaseEntryBetaItem::where('p_no',$request->p_no)->where('item_id',$value)->update(['remaining_qty' => $request->quantity[$key], 'rejected_qty' => $request->rejected_item_qty[$key], 'remarks' => $request->remarks_val[$key]]);
                }
                
                else
                {
                PurchaseEntryItem::where('p_no',$request->p_no)->where('item_id',$value)->update(['remaining_qty' => $request->quantity[$key], 'rejected_qty' => $request->rejected_item_qty[$key], 'remarks' => $request->remarks_val[$key]]); 
                }

            }
        
            }
         }
         else
         {
            foreach ($request->item_code as $key => $value) 
            {
            if($request->has('check'))
            {
            ReceiptNoteBetaItem::where('rn_no',$request->receipt_no)->where('item_id',$value)->update(['remaining_qty' => $request->quantity[$key], 'rejected_qty' => $request->rejected_item_qty[$key], 'remarks' => $request->remarks_val[$key]]);
            }
            else
            {
            ReceiptNoteItem::where('rn_no',$request->receipt_no)->where('item_id',$value)->update(['remaining_qty' => $request->quantity[$key], 'rejected_qty' => $request->rejected_item_qty[$key], 'remarks' => $request->remarks_val[$key]]);
            }
            
        
            }
         }


         $purchase_no = $request->p_no;
         $receipt_note_no = $request->receipt_no;

         // $purchase_details = PurchaseEntry::where('p_no',$purchase_no)->where('active',1)->update(['active' => 0]);

         if($request->has('check'))
         {
            $rejection_outs=RejectionOutBeta::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->count();

            if($rejection_outs > 0)
             {
                $update = RejectionOutBeta::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);

                // $update_black_items = RejectionOutBetaItem::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);

                $update_items = RejectionOutBetaItem::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);
             }

         }
         else
         {
            $rejection_outs=RejectionOut::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->count();

            if($rejection_outs > 0)
             {
                $update = RejectionOut::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);

                // $update_black_items = RejectionOutBetaItem::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);

                $update_items = RejectionOutItem::where('p_no',$purchase_no)->where('rn_no',$receipt_note_no)->update(['status' => 1]);
             }

         }
         

         
         /*Document Upload*/

        if($files=$request->file('document')){
            foreach($files as $key => $file){
                $name=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).date('Y-m-d').time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/documents/',$name);

                $upload_document = new UploadDocument(); 

               $upload_document->voucher_no = $voucher_no;
               $upload_document->voucher_date = $voucher_date;
               $upload_document->document_name = $request->documentname[$key];
               $upload_document->document = $name;

               $upload_document->save();
            }
        }        

        /*Document Upload*/
        
        if($request->has('check'))
        {
            $rejection_out = new RejectionOutBeta();
        }
        else
        {
          $rejection_out = new RejectionOut();  
        }

         
        $rejection_out->voucher_no = $current_voucher_num;
         $rejection_out->r_out_no = $voucher_val;
         $rejection_out->r_out_date = $voucher_date;
         $rejection_out->p_no = $request->p_no;
         $rejection_out->p_date = $request->p_date;
         $rejection_out->rn_no = $request->receipt_no;
         $rejection_out->rn_date = $request->receipt_date;
         $rejection_out->supplier_id = $request->supplier_id;
         $rejection_out->overall_discount = $request->overall_discount;
         $rejection_out->total_net_value = $request->total_price;
         $rejection_out->round_off = $request->round_off;
         $rejection_out->location = $request->location;

         $rejection_out->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
                if($request->has('check'))
                {
                    $rejection_out_items = new RejectionOutBetaItem();
                }
                else
                {
                  $rejection_out_items = new RejectionOutItem();  
                }

                $rejection_out_items->r_out_no = $voucher_val;
                $rejection_out_items->r_out_date = $voucher_date;
                $rejection_out_items->p_no = $request->p_no;
                $rejection_out_items->p_date = $request->p_date;
                $rejection_out_items->rn_no = $request->receipt_no;
                $rejection_out_items->rn_date = $request->receipt_date;
                $rejection_out_items->item_sno = $request->invoice_sno[$i];
                $rejection_out_items->item_id = $request->item_code[$i];
                $rejection_out_items->mrp = $request->mrp[$i];
                $rejection_out_items->gst = $request->tax_rate[$i];
                $rejection_out_items->rate_exclusive_tax = $request->exclusive[$i];
                $rejection_out_items->rate_inclusive_tax = $request->inclusive[$i];
                $rejection_out_items->actual_qty = $request->actual_quantity[$i];
                $rejection_out_items->qty = $request->actual_quantity[$i];
                $rejection_out_items->remaining_qty = $request->rejected_item_qty[$i];
                $rejection_out_items->rejected_qty = $request->rejected_item_qty[$i];
                $rejection_out_items->actual_rejected_qty = $request->rejected_item_qty[$i];
                $rejection_out_items->debited_qty = 0;
                $rejection_out_items->r_out_debited_qty = @$request->r_out_debited_qty[$i];
                // $rejection_out_items->remaining_after_debit = $request->rejected_item_qty[$i];
                $rejection_out_items->remarks = $request->remarks_val[$i];
                $rejection_out_items->uom_id = $request->uom[$i];
                $rejection_out_items->discount = $request->discount[$i];
                $rejection_out_items->overall_disc = $request->overall_disc[$i];
                $rejection_out_items->expenses = $request->expenses[$i];
                // $rejection_out_items->b_or_w = $request->black_or_white[$i];

                $rejection_out_items->save();

            
            
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count == 0)
            {

            }
            else
            {

                if($request->has('check'))
                {
                   $rejection_out_expense = new RejectionOutBetaExpense();
                }
                else
                {
                    $rejection_out_expense = new RejectionOutExpense();
                }
                

                $rejection_out_expense->r_out_no = $voucher_val;
                $rejection_out_expense->r_out_date = $voucher_date;
                $rejection_out_expense->p_no = $request->p_no;
                $rejection_out_expense->p_date = $request->p_date;
                $rejection_out_expense->rn_no = $request->receipt_no;
                $rejection_out_expense->rn_date = $request->receipt_date;
                $rejection_out_expense->expense_type = $request->expense_type[$j];
                $rejection_out_expense->expense_amount = $request->expense_amount[$j];

                $rejection_out_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

                if($request->has('check'))
                {
                   $tax_details = new RejectionOutBetaTax;
                }
                else
                {
                    $tax_details = new RejectionOutTax;
                }

               

               $tax_details->r_out_no = $voucher_val;
               $tax_details->r_out_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;
               $tax_details->p_no = $request->p_no;
               $tax_details->p_date = $request->p_date;
               $tax_details->rn_no = $request->receipt_no;
               $tax_details->rn_date = $request->receipt_date;

               $tax_details->save();

            }

        $rejection_out_no = $rejection_out->r_out_no;

        if($request->has('check'))
        {
           $rejection_out_print_data = RejectionOutBeta::where('r_out_no',$rejection_out_no)->first();
        $address = AddressDetails::where('address_ref_id',$rejection_out_print_data->supplier_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $rejection_out_item_print_data = RejectionOutBetaItem::where('r_out_no',$rejection_out_no)
                                                    // ->union($rejection_out_black_item_print_data)
                                                    ->get();

        $rejection_out_expense_print_data = RejectionOutBetaExpense::where('r_out_no',$rejection_out_no)->get(); 

        $amnt = $rejection_out_print_data->total_net_value;
        }

        else
        {
            $rejection_out_print_data = RejectionOut::where('r_out_no',$rejection_out_no)->first();
        $address = AddressDetails::where('address_ref_id',$rejection_out_print_data->supplier_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $rejection_out_item_print_data = RejectionOutItem::where('r_out_no',$rejection_out_no)
                                                    // ->union($rejection_out_black_item_print_data)
                                                    ->get();

        $rejection_out_expense_print_data = RejectionOutExpense::where('r_out_no',$rejection_out_no)->get(); 

        $amnt = $rejection_out_print_data->total_net_value;
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
                         

        if($request->save == 1)
        {
            return view('admin.rejection_out.print',compact('rejection_out_print_data','address','rejection_out_item_print_data','rejection_out_expense_print_data','result','points'));
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
        $rejection_out = RejectionOut::where('r_out_no',$id)->first();
        $rejection_out_items = RejectionOutItem::where('r_out_no',$id)->get();
        $rejection_out_expense = RejectionOutExpense::where('r_out_no',$id)->get();
        $upload = UploadDocument::where('voucher_no',$id)->get();
        //echo "<pre>"; print_r($rejection_out_items);exit;

        $item_row_count = count($rejection_out_items);
        $expense_row_count = count($rejection_out_expense);


        if(isset($rejection_out->supplier->name) && !empty($rejection_out->supplier->name))
        {
            $supplier_id = $rejection_out->supplier->id;

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
        foreach($rejection_out_items as $key => $value)  
        {
            $item_amount[] = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;

            $item_data = RejectionOutItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->rejected_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value[] = $sum / $item_data->rejected_qty;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.rejection_out.show',compact('rejection_out','rejection_out_items','rejection_out_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','upload'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::all();
        $location = Location::all();
        // $purchase_entry = PurchaseEntry::all();

        $purchase_entry=PurchaseEntry::join('purchase_entry_items','purchase_entries.p_no','=','purchase_entry_items.p_no')->select('purchase_entries.p_no')->groupBy('purchase_entries.p_no')->havingRaw('sum(purchase_entry_items.remaining_qty)> 0')->get();

        $rejection_out = RejectionOut::where('r_out_no',$id)->first();
        $rejection_out_items = RejectionOutItem::where('r_out_no',$id)->get();
        $rejection_out_expense = RejectionOutExpense::where('r_out_no',$id)->get();

        $item_row_count = count($rejection_out_items);
        $expense_row_count = count($rejection_out_expense);


        if(isset($rejection_out->supplier->name) && !empty($rejection_out->supplier->name))
        {
            $supplier_id = $rejection_out->supplier->id;

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
        foreach($rejection_out_items as $key => $value)  
        {
            $item_amount[] = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

            $item_data = RejectionOutItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value[] = $amount + $gst_rs - $item_data->discount;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.rejection_out.edit',compact('date','categories','supplier','agent','brand','expense_type','item','estimation','purchase_entry','rejection_out','rejection_out_items','rejection_out_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','location'));
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
        $rejection_out_data = RejectionOut::where('r_out_no',$id);
        $rejection_out_data->delete();

        $rejection_out_item_data = RejectionOutItem::where('r_out_no',$id);
        $rejection_out_item_data->delete();

        $rejection_out_expense_data = RejectionOutExpense::where('r_out_no',$id);
        $rejection_out_expense_data->delete();

        $voucher_date = $request->voucher_date;
        $voucher_no = $request->voucher_no;

        if($request->rn_no == '')
        {
        foreach ($request->item_code as $key => $value) 
            {
            $purchase_entry_item = PurchaseEntryItem::where('p_no',$request->p_no)->where('item_id',$value)->first();
            
            $purchase_entry_item->r_out_no = $voucher_no;
            $purchase_entry_item->r_out_date = $voucher_date;
            $purchase_entry_item->remaining_qty = $request->quantity[$key];
            $purchase_entry_item->rejected_qty = $request->rejected_item_qty[$key];
            $purchase_entry_item->remarks = $request->remarks_val[$key];
            $purchase_entry_item->save();
            
            }
        }
        else
        {
            foreach ($request->item_code as $key => $value) 
            {
                $receipt_note_item = ReceiptNoteItem::where('rn_no',$request->rn_no)->where('item_id',$value)->first();

                $receipt_note_item->r_out_no = $voucher_no;
                $receipt_note_item->r_out_date = $voucher_date;
                $receipt_note_item->remaining_qty = $request->quantity[$key];
                $receipt_note_item->rejected_qty = $request->rejected_item_qty[$key];
                $receipt_note_item->remarks = $request->remarks_val[$key];
                $receipt_note_item->save();
        
            }
        }
        

         $rejection_out = new RejectionOut();

         $rejection_out->r_out_no = $voucher_no;
         $rejection_out->r_out_date = $voucher_date;
         $rejection_out->p_no = $request->p_no;
         $rejection_out->p_date = $request->p_date;
         $rejection_out->supplier_id = $request->supplier_id;
         $rejection_out->overall_discount = $request->overall_discount;
         $rejection_out->total_net_value = $request->total_price;
         $rejection_out->round_off = $request->round_off;

         $rejection_out->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;
         if($expense_count == 0)
         {
            $expense_count =1;
         }

         for($i=0;$i<$items_count;$i++)

        {
            $rejection_out_items = new RejectionOutItem();

            $rejection_out_items->r_out_no = $voucher_no;
            $rejection_out_items->r_out_date = $voucher_date;
            $rejection_out_items->p_no = $request->p_no;
            $rejection_out_items->p_date = $request->p_date;
            $rejection_out_items->item_sno = $request->invoice_sno[$i];
            $rejection_out_items->item_id = $request->item_code[$i];
            $rejection_out_items->mrp = $request->mrp[$i];
            $rejection_out_items->gst = $request->tax_rate[$i];
            $rejection_out_items->rate_exclusive_tax = $request->exclusive[$i];
            $rejection_out_items->rate_inclusive_tax = $request->inclusive[$i];
            $rejection_out_items->qty = $request->actual_quantity[$i];
            $rejection_out_items->remaining_qty = $request->quantity[$i];
            $rejection_out_items->rejected_qty = $request->rejected_item_qty[$i];
            $rejection_out_items->remarks = $request->remarks_val[$i];
            $rejection_out_items->uom_id = $request->uom[$i];
            $rejection_out_items->discount = $request->discount[$i];

            $rejection_out_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                $rejection_out_expense = new RejectionOutExpense();

                $rejection_out_expense->r_out_no = $voucher_no;
                $rejection_out_expense->r_out_date = $voucher_date;
                $rejection_out_expense->p_no = $request->p_no;
                $rejection_out_expense->p_date = $request->p_date;
                $rejection_out_expense->expense_type = $request->expense_type[$j];
                $rejection_out_expense->expense_amount = $request->expense_amount[$j];

                $rejection_out_expense->save();
            }
           
            
        }
        return Redirect::back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$r_out)
    {


      $rejection_out_data = RejectionOut::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->where('status',0);
      $rejection_out_item_data = RejectionOutItem::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->where('status',0);
      $rejection_out_expense_data = RejectionOutExpense::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1);
      $rejection_out_tax_data = RejectionOutTax::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1);

        $rejection_out_items_data = RejectionOutItem::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->get();

        foreach ($rejection_out_items_data as $key => $value) 
        {
            $r_out_no = $value->r_out_no;
        }

        $debit_note = DebitNote::where('r_out_no',$r_out_no)->get();

        if($debit_note != '')
        {
            DebitNote::where('r_out_no',$r_out_no)->delete();
            DebitNoteItem::where('r_out_no',$r_out_no)->delete();
            DebitNoteExpense::where('r_out_no',$r_out_no)->delete();
            DebitNoteTax::where('r_out_no',$r_out_no)->delete(); 
        }
        
        else
        {
            
        }

      

        $purchase_entry_item = PurchaseEntryItem::where('p_no',$id)->get();
        foreach ($purchase_entry_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            // $debited_qty = $value->rejected_qty - $value->remaining_rejected_qty;
            // $total_debited_qty = $debited_qty + $value->debited_qty;
            $item_id = $value->item_id;
            PurchaseEntryItem::where('p_no',$id)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $receipt_note_item = ReceiptNoteItem::where('rn_no',$id)->get();
        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            ReceiptNoteItem::where('rn_no',$id)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        
        
        if($rejection_out_data)
        {
            $rejection_out_data->update(['active' => 0]);
        }
         if($rejection_out_item_data)
         {
            $rejection_out_item_data->update(['active' => 0]);
         }

         if($rejection_out_expense_data)
         {
            $rejection_out_expense_data->update(['active' => 0]);
         }
         if($rejection_out_tax_data)
         {
            $rejection_out_tax_data->update(['active' => 0]);
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function delete_beta($id,$r_out)
    {


      $rejection_out_data = RejectionOutBeta::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->where('status',0);
      $rejection_out_item_data = RejectionOutBetaItem::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->where('status',0);
      $rejection_out_expense_data = RejectionOutBetaExpense::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1);
      $rejection_out_tax_data = RejectionOutBetaTax::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1);


        $rejection_out_items_data = RejectionOutBetaItem::where('p_no',$id)->orWhere('rn_no',$id)->where('active',1)->get();

        foreach ($rejection_out_items_data as $key => $value) 
        {
            $r_out_no = $value->r_out_no;
        }

        $debit_note = DebitNoteBeta::where('r_out_no',$r_out_no)->get();

        if($debit_note != '')
        {
            DebitNoteBeta::where('r_out_no',$r_out_no)->delete();
            DebitNoteBetaItem::where('r_out_no',$r_out_no)->delete();
            DebitNoteBetaExpense::where('r_out_no',$r_out_no)->delete();
            DebitNoteBetaTax::where('r_out_no',$r_out_no)->delete(); 
        }
        
        else
        {
            
        }

      

        $purchase_entry_item = PurchaseEntryBetaItem::where('p_no',$id)->get();
        foreach ($purchase_entry_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            // $debited_qty = $value->rejected_qty - $value->remaining_rejected_qty;
            // $total_debited_qty = $debited_qty + $value->debited_qty;
            $item_id = $value->item_id;
            PurchaseEntryBetaItem::where('p_no',$id)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $receipt_note_item = ReceiptNoteBetaItem::where('rn_no',$id)->get();
        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            ReceiptNoteBetaItem::where('rn_no',$id)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }
        
        
        if($rejection_out_data)
        {
            $rejection_out_data->update(['active' => 0]);
        }
         if($rejection_out_item_data)
         {
            $rejection_out_item_data->update(['active' => 0]);
         }

         if($rejection_out_expense_data)
         {
            $rejection_out_expense_data->update(['active' => 0]);
         }
         if($rejection_out_tax_data)
         {
            $rejection_out_tax_data->update(['active' => 0]);
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }


    public function voucher_type(Request $request)
    {
        $voucher_num = PurchaseVoucherType::where('id',$request->voucher_type)->first();

        $digits = $voucher_num->no_digits;  
        $updated_no = $voucher_num->updated_no; 
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=RejectionOut::orderBy('created_at','DESC')->select('voucher_no')->first();                  

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



    public function address_details(Request $request)
    {
       $supplier_id = $request->supplier_id;

       $getdata = AddressDetails::
       join('suppliers','suppliers.id','=','address_details.address_ref_id')
       ->where('address_details.address_table','=','Supplier')
       ->where('address_details.address_ref_id','=',$supplier_id)
       ->first();


       $filter = PurchaseEntry::where('supplier_id',$supplier_id)
                            ->select('p_no','p_date')
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

         $options = "";

         foreach ($filter as $key => $value) {
             $options .= '<option value="'.$value->p_no.'">Purchase Entry No:'.$value->p_no.' - Date:'.$value->p_date.'</option>';
         }

         $result = array('options' => $options, 'address' => $address);
         echo json_encode($result);exit();

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

        // if($items->item_type != 'Parent')
        // {
        // $item_id=$this->get_parent_item_id($id);
        //   //dd($item_id);
        // $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        // $uom=array();
        // $count=0;
        // foreach($item_uom as $value){
        // if(isset($value->uom->name) && !empty($value->uom->name))
        // {
        //     $count++;
        //     $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_id'=>$value->id);
        //         //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        // }

        // }

        // $result = array_unique($uom, SORT_REGULAR);

        // $data[]=$result;                              
        // return $data;
        // }
        // else
        // {
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
    // }
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
            // $result_val=$this->parentItem($value->childItem);
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

        $item_details = RejectionOutItem::where('r_out_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->rejected_qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.rejection_out.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function item_beta_details($id)
    {

        $item_details = RejectionOutBetaItem::where('r_out_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->rejected_qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.rejection_out.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = RejectionOutExpense::where('r_out_no',$id)->get();
        return view('admin.rejection_out.expense_details',compact('expense_details'));
    }

    public function expense_beta_details($id)
    {
        $expense_details = RejectionOutBetaExpense::where('r_out_no',$id)->get();
        return view('admin.rejection_out.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = RejectionOutItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
        if($item_data == '')
        {
            $net_value = 0;
            return $net_value;
        }  
        else
        {
            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount; 

            return $net_value;
        }                                  

                                  
    }


    function po_alpha_beta(Request $request)
    {

      $p_no = "";
      $rn_no = "";
      if($request->id == 1)
      {

        $voucher_num=RejectionOutBeta::orderBy('created_at','DESC')->select('id')->first();
        $append = "RO";
        if ($voucher_num == null) 
         {
             $voucher_val=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_val = $append.$next_no;
        
         
         }

        $purchaseorder = PurchaseEntryBeta::where('cancel_status',0)->get();

        $receipt_note = ReceiptNoteBeta::where('status',0)->get();

        foreach ($purchaseorder as $key => $value) {
         $p_no.= "<option value=".$value->p_no.">".$value->p_no."</option>";
        }

        foreach ($receipt_note as $key => $value) {
         $rn_no.= "<option value=".$value->rn_no.">".$value->rn_no."</option>";
        }
        

        $result_array = array('p_no' => $p_no, 'rn_no' => $rn_no, 'voucher_no' => $voucher_no);
      }
      else
      {

        $voucher_num=RejectionOut::orderBy('created_at','DESC')->select('id')->first();
        $append = "RO";
        if ($voucher_num == null) 
         {
             $voucher_val=$append.'1';

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $next_no=$current_voucher_num+1;

             $voucher_val = $append.$next_no;
        
         
         }

        $purchaseorder = PurchaseEntry::where('cancel_status',0)->get();

        $receipt_note = ReceiptNote::where('status',0)->get();

        foreach ($purchaseorder as $key => $value) {
         $p_no.= "<option value=".$value->p_no.">".$value->p_no."</option>";
        }

        foreach ($receipt_note as $key => $value) {
         $rn_no.= "<option value=".$value->rn_no.">".$value->rn_no."</option>";
        }
        

        $result_array = array('p_no' => $p_no, 'rn_no' => $rn_no, 'voucher_no' => $voucher_no);
      }

      echo json_encode($result_array); exit();

    }


    public function p_details(Request $request)
    {
        $p_no = $request->p_no;
        $alpha_beta = $request->alpha_beta;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation =Estimation::all();

        
        if($alpha_beta == 1)
        {
            $purchase_entry = PurchaseEntryBeta::where('p_no',$p_no)->first();
            $purchase_entry_item = PurchaseEntryBetaItem::where('p_no',$p_no)
                                                    ->get();
            $purchase_entry_expense = PurchaseEntryBetaExpense::where('p_no',$p_no)->get();
            $purchase_entry_Tax = PurchaseEntryBetaTax::where('p_no',$p_no)->get();
        }
        else
        {
            $purchase_entry = PurchaseEntry::where('p_no',$p_no)->first();
            $purchase_entry_item = PurchaseEntryItem::where('p_no',$p_no)
                                                    ->get();
            $purchase_entry_expense = PurchaseEntryExpense::where('p_no',$p_no)->get();
            $purchase_entry_Tax = PurchaseEntryTax::where('p_no',$p_no)->get();
        }
        

        $location = @$purchase_entry->locations->name;
        $location_id = @$purchase_entry->location;

        $round_off = $purchase_entry->round_off;
        $overall_discount = $purchase_entry->overall_discount;
         $total_net_value = $purchase_entry->total_net_value;
         $date_purchaseorder = $purchase_entry->po_date;
         $purchase_entry_date = $purchase_entry->p_date;

        $item_row_count = count($purchase_entry_item);
        $expense_row_count = count($purchase_entry_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($purchase_entry_item as $key => $value)  
        {

            // if($value->remaining_qty == '')
            // {
            //     $remaining_qty = $value->qty;
            // }
            // else
            // {
            //     $remaining_qty = $value->remaining_qty;
            // }

            // if($value->rejected_qty == '' || $value->rejected_qty > $value->qty)
            // {
            //     $remaining_qty = $value->qty;
            //     $value->rejected_qty = 0;
            // }
            // else
            // {
            //     $remaining_qty = $value->qty - $value->rejected_qty;
            // }

            // $sum = $value->rejected_qty + $value->debited_qty + $value->r_out_debited_qty;
            // $remaining_qty = $value->actual_qty - $sum;

            $actual_quantity = $value->rejected_qty + $value->remaining_qty;
            $debited_qty = $value->debited_qty + $value->r_out_debited_qty;

            $status++;
            $i++;
            
            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            if($alpha_beta == 1)
            {
                $item_data = PurchaseEntryBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            else
            {
                $item_data = PurchaseEntryItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            

            $amount = $item_data->rejected_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;

            $child_unit = $item_data->item->child_unit;

            // return $child_unit; exit();

            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><input type="hidden" value="'.$value['item_sno'].'" name="old_invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="child_unit'.$i.'" value="'.$child_unit.'" name="child_unit[]"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><input type="hidden" value="'.$value['item_id'].'" name="old_item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><input type="hidden" value="'.$value->item['name'].'" name="old_item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><input type="hidden" value="'.$value->item['hsn'].'" name="old_hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><input type="hidden" value="'.$value['mrp'].'" name="old_mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><input type="hidden" value="'.$value['rate_exclusive_tax'].'" name="old_exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"><input type="hidden" value="'.$value['rate_inclusive_tax'].'" name="old_inclusive[]"></div></div></td><td><font class="font_purchase_quantity'.$i.'">'.$value['actual_qty'].'</font><input type="hidden" value="'.$value['actual_qty'].'" name="actual_qty[]"><input type="hidden" value="'.$value['actual_qty'].'" name="old_actual_qty[]"></td><td><font class="font_rejected_qty'.$i.'">'.$value['rejected_qty'].'</font><input type="hidden" class="rejected_quantity" name="rejected_item_qty[]" id="rejected_quantity'.$i.'" value="'.$value['rejected_qty'].'"><input type="hidden" name="old_rejected_item_qty[]" value="'.$value['rejected_qty'].'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><input type="hidden" value="'.$value['remaining_qty'].'" name="old_quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font><input type="hidden" class="actual_quantity" id="actual_quantity'.$i.'" value="'.$actual_quantity.'" name="actual_quantity[]"><input type="hidden" value="'.$actual_quantity.'" name="old_actual_quantity[]"><input type="hidden" class="remaining_qty" id="remaining_qty'.$i.'" value="'.$value['remaining_qty'].'" name="remaining_qty[]"><input type="hidden" value="'.$value['remaining_qty'].'" name="old_remaining_qty[]"></div></div></td><td><font class="font_debited_qty'.$i.'">'.$debited_qty.'</font><input type="hidden" class="debited_qty" value="'.$value['debited_qty'].'" name="debited_qty[]" id="debited_qty'.$i.'"><input type="hidden" value="'.$value['debited_qty'].'" name="old_debited_qty[]"><input type="hidden" class="r_out_debited_qty" value="'.$value['r_out_debited_qty'].'" name="r_out_debited_qty[]" id="r_out_debited_qty'.$i.'"><input type="hidden" value="'.$value['r_out_debited_qty'].'" name="old_r_out_debited_qty[]"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><input type="hidden" value="'.$value['uom_id'].'" name="old_uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" value="'.$item_gst_rs.'" name="old_gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><input type="hidden" value="'.$value['gst'].'" name="old_tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td><font class="font_remarks'.$i.'">'.$value['remarks'].'</font><input type="hidden" class="remarks_val" name="remarks_val[]" id="remarks_val'.$i.'" value="'.$value['remarks'].'"><input type="hidden" name="old_remarks_val[]" value="'.$value['remarks'].'"></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        $expense_typess="";
        $expense_cnt=0;
        foreach($purchase_entry_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" readonly name="expense_type[]">@if(isset($value->expense_types->type) && !empty($value->expense_types->type))<option value="'.$value->expense_types->id.'">'.$value->expense_types->type.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->type.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" readonly class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br></div></div>' ;
    }

    // if($expense_cnt == 0)
    // {
    //     $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>';
    //     foreach($expense_type as $expense_types){
    //                 $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->type.'</option>';
    //             }
    //     $expense_typess.='</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    // }

    $tax_append = "";
    foreach ($purchase_entry_Tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_purchaseorder'=>$date_purchaseorder,'expense_cnt'=>$expense_cnt,'purchase_entry_date'=>$purchase_entry_date,'tax_append' => $tax_append,'location' => $location,'location_id' => $location_id,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }

    public function Get_Location_Details(Request $request)
    {
        $purchase_no = $request->p_no;
        $purchase_entry = PurchaseEntry::where('p_no',$purchase_no)->first();
        $location_master = Location::all();
        $option="<option value=''>Choose Location</option>";
        foreach ($location_master as $key => $value) {
            $selected = @$value['id'] == @$purchase_entry->location ? "selected" : "";
            $option.="<option value='".$value['id']."'  '".$selected."'>".$value['name']."</option>";

        }

        echo json_encode(array('option'=>$option));exit;
    }

    public function receipt_details(Request $request)
    {
        
        $receipt_no = $request->receipt_no;
        $alpha_beta = $request->alpha_beta;
        $purchase_entry = PurchaseEntry::where('rn_no',$receipt_no)->count();

        // foreach ($purchase_entry as $key => $value) {
        //     if($value->rn_no == $receipt_no)
        //     {
        //         $val = 1;
        //     }
        //     else
        //     {
        //         $val = 0;
        //     }
        // }

        // if($val == 1)
        // {
        //     return 1;
        // }
        if($purchase_entry > 0)
        {
            return 1;
        }
        else
        {
           $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
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
            // if($value->remaining_qty == '')
            // {
            //     $remaining_qty = $value->qty;
            // }
            // else
            // {
            //     $remaining_qty = $value->remaining_qty;
            // }

            // if($value->rejected_qty == '' || $value->rejected_qty > $value->qty)
            // {
            //     $remaining_qty = $value->qty;
            //     $value->rejected_qty = 0;
            // }
            // else
            // {
            //     $remaining_qty = $value->qty - $value->rejected_qty;
            // }

            $actual_quantity = $value->rejected_qty + $value->remaining_qty;
            $debited_qty = $value->debited_qty + $value->r_out_debited_qty;

            $status++;
            $i++;
            
            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;

            // $item_black_data = ReceiptNoteBlackItem::where('item_id',$value->item_id)
                                    // ->orderBy('updated_at','DESC');

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
            

            $amount = $item_data->rejected_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;

            $child_unit = $item_data->item->child_unit;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><input type="hidden" value="'.$value['item_sno'].'" name="old_invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="child_unit'.$i.'" value="'.$child_unit.'" name="child_unit[]"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><input type="hidden" value="'.$value['item_id'].'" name="old_item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><input type="hidden" value="'.$value->item['name'].'" name="old_item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><input type="hidden" value="'.$value->item['hsn'].'" name="old_hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><input type="hidden" value="'.$value['mrp'].'" name="old_mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><input type="hidden" value="'.$value['rate_exclusive_tax'].'" name="old_exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"><input type="hidden" value="'.$value['rate_inclusive_tax'].'" name="old_inclusive[]"></div></div></td><td><font class="font_purchase_quantity'.$i.'">'.$value['qty'].'</font><input type="hidden" value="'.$value['qty'].'" name="actual_qty[]"><input type="hidden" value="'.$value['qty'].'" name="old_actual_qty[]"></td><td><font class="font_rejected_qty'.$i.'">'.$value['rejected_qty'].'</font><input type="hidden" class="rejected_quantity" name="rejected_item_qty[]" id="rejected_quantity'.$i.'" value="'.$value['rejected_qty'].'"><input type="hidden" name="old_rejected_item_qty[]" value="'.$value['rejected_qty'].'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><input type="hidden" value="'.$value['remaining_qty'].'" name="old_quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font><input type="hidden" class="actual_quantity" id="actual_quantity'.$i.'" value="'.$actual_quantity.'" name="actual_quantity[]"><input type="hidden" value="'.$actual_quantity.'" name="old_actual_quantity[]"><input type="hidden" class="remaining_qty" id="remaining_qty'.$i.'" value="'.$value['remaining_qty'].'" name="remaining_qty[]"><input type="hidden" value="'.$value['remaining_qty'].'" name="old_remaining_qty[]"></div></div></td><td><font class="font_debited_qty'.$i.'">'.$debited_qty.'</font><input type="hidden" class="debited_qty" value="'.$value['debited_qty'].'" name="debited_qty[]" id="debited_qty'.$i.'"><input type="hidden" value="'.$value['debited_qty'].'" name="old_debited_qty[]"><input type="hidden" class="r_out_debited_qty" value="'.$value['r_out_debited_qty'].'" name="r_out_debited_qty[]" id="r_out_debited_qty'.$i.'"><input type="hidden" value="'.$value['r_out_debited_qty'].'" name="old_r_out_debited_qty[]"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><input type="hidden" value="'.$value['uom_id'].'" name="old_uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" value="'.$item_gst_rs.'" name="old_gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><input type="hidden" value="'.$value['gst'].'" name="old_tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td><font class="font_remarks'.$i.'">'.$value['remarks'].'</font><input type="hidden" class="remarks_val" name="remarks_val[]" id="remarks_val'.$i.'" value="'.$value['remarks'].'"><input type="hidden" name="old_remarks_val[]" value="'.$value['remarks'].'"></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->rejected_qty * $value->rate_exclusive_tax;
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
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" readonly name="expense_type[]">@if(isset($value->expense_types->type) && !empty($value->expense_types->type))<option value="'.$value->expense_types->id.'">'.$value->expense_types->type.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->type.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount" readonly  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br></div></div>' ;
    }

    // if($expense_cnt == 0)
    // {
    //     $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>';
    //     foreach($expense_type as $expense_types){
    //                 $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->type.'</option>';
    //             }
    //     $expense_typess.='</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    // }

    $tax_append = "";
    foreach ($receipt_note_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_estimation'=>$estimation_date,'estimation_no'=>$estimation_no,'po_no'=>$po_no,'po_date'=>$po_date,'expense_cnt'=>$expense_cnt,'purchase_type'=>$purchase_type,'receipt_note_date'=>$receipt_note_date,'tax_append' =>$tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date')); 
        }

        
    }

    public function check_qty(Request $request)
    {
        $qty = $request->qty;
        $item_id = $request->item_id;
        $p_no = $request->p_no;


        $purchase_entry_item = PurchaseEntryItem::where('p_no',$p_no)
                                                ->where('item_id',$item_id)
                                                ->first();
        $quantity = $purchase_entry_item->qty;                                        
        if($qty == $purchase_entry_item->qty || $qty < $purchase_entry_item->qty)
        {
            // $remaining_qty = $quantity-$qty;
            // PurchaseEntryItem::where('p_no',$p_no)
            // ->where('item_id',$item_id)
            // ->update(['remaining_qty' => $remaining_qty]);
            
            return 0;

        }  
        else
        {

            return 1;
        }                                                                     
    }

    public function cancel($id)
    {

      $rejection_out_items = RejectionOut::where('r_out_no',$id)->where('active',1)->first();

      
          $p_no = $rejection_out_items->p_no;
          $rn_no = $rejection_out_items->rn_no;
    

        $purchase_entry_item = PurchaseEntryItem::where('p_no',$p_no)->get();


        foreach ($purchase_entry_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            PurchaseEntryItem::where('p_no',$p_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $receipt_note_item = ReceiptNoteItem::where('rn_no',$rn_no)->get();
        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            ReceiptNoteItem::where('rn_no',$rn_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $r_out = RejectionOut::where('r_out_no',$id)->first();

        $r_out->cancel_status = 1;
        $r_out->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function cancel_beta($id)
    {

      $rejection_out_items = RejectionOutBeta::where('r_out_no',$id)->where('active',1)->first();

      
          $p_no = $rejection_out_items->p_no;
          $rn_no = $rejection_out_items->rn_no;
    

        $purchase_entry_item = PurchaseEntryBetaItem::where('p_no',$p_no)->get();


        foreach ($purchase_entry_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            PurchaseEntryBetaItem::where('p_no',$p_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $receipt_note_item = ReceiptNoteBetaItem::where('rn_no',$rn_no)->get();
        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->rejected_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            ReceiptNoteBetaItem::where('rn_no',$rn_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => 0]);

        }

        $r_out = RejectionOutBeta::where('r_out_no',$id)->first();

        $r_out->cancel_status = 1;
        $r_out->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {

        $rejection_out_items = RejectionOutItem::where('r_out_no',$id)->where('active',1)->get();
        $rejection_outs = RejectionOutItem::where('r_out_no',$id)->where('active',1)->first();

        

        foreach ($rejection_out_items as $key => $value) 
        {
          $rejected_qty[] = $value->rejected_qty;
        }
        
        $p_no = $rejection_outs->p_no;
        $rn_no = $rejection_outs->rn_no;

        $purchase_entry_item = PurchaseEntryItem::where('p_no',$p_no)->get();

        foreach ($purchase_entry_item as $key => $value) {
            $qty =  $value->remaining_qty - $rejected_qty[$key];
            $item_id = $value->item_id;
            PurchaseEntryItem::where('p_no',$p_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => $rejected_qty[$key]]);

        }

        $receipt_note_item = ReceiptNoteItem::where('rn_no',$rn_no)->get();

        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->remaining_qty - $rejected_qty[$key];
            $item_id = $value->item_id;
            ReceiptNoteItem::where('rn_no',$rn_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => $rejected_qty[$key]]);

        }

        // echo "<pre>"; print_r($purchase_entry_item); exit();

        $r_out = RejectionOut::where('r_out_no',$id)->first();

        $r_out->cancel_status = 0;
        $r_out->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function retrieve_beta($id)
    {

        $rejection_out_items = RejectionOutBetaItem::where('r_out_no',$id)->where('active',1)->get();
        $rejection_outs = RejectionOutBetaItem::where('r_out_no',$id)->where('active',1)->first();

        

        foreach ($rejection_out_items as $key => $value) 
        {
          $rejected_qty[] = $value->rejected_qty;
        }
        
        $p_no = $rejection_outs->p_no;
        $rn_no = $rejection_outs->rn_no;

        $purchase_entry_item = PurchaseEntryBetaItem::where('p_no',$p_no)->get();

        foreach ($purchase_entry_item as $key => $value) {
            $qty =  $value->remaining_qty - $rejected_qty[$key];
            $item_id = $value->item_id;
            PurchaseEntryBetaItem::where('p_no',$p_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => $rejected_qty[$key]]);

        }

        $receipt_note_item = ReceiptNoteBetaItem::where('rn_no',$rn_no)->get();

        foreach ($receipt_note_item as $key => $value) {
            $qty = $value->remaining_qty - $rejected_qty[$key];
            $item_id = $value->item_id;
            ReceiptNoteBetaItem::where('rn_no',$rn_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'rejected_qty' => $rejected_qty[$key]]);

        }

        // echo "<pre>"; print_r($purchase_entry_item); exit();

        $r_out = RejectionOutBeta::where('r_out_no',$id)->first();

        $r_out->cancel_status = 0;
        $r_out->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function report(Request $request)
    {

        $cond = [];
        if(isset($request->supplier_id)){$cond['supplier_id'] = $request->supplier_id; }
        if(isset($request->from)) {$from = date('Y-m-d',strtotime($request->from)); }           
        if(isset($request->to)) {$to = date('Y-m-d',strtotime($request->to)); }
        if(isset($request->location)) {$cond['location'] = $request->location;}
           // print_r($cond);exit;
        $check_id = "";

        $rejection_out = RejectionOut::where($cond)->whereBetween('r_out_date',[$from,$to])->where('status',0)->where('active',1)->get();

        if(count($rejection_out) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($rejection_out as $key => $datas) 
        {
            $rejection_out_items = RejectionOutItem::where('r_out_no',$datas->r_out_no)->get();

            $rejection_out_expense = RejectionOutExpense::where('r_out_no',$datas->r_out_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($rejection_out_items as $j => $value) 
            {

            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($rejection_out_expense as $k => $values) 
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

    $rejection_out_beta = RejectionOutBeta::where('status',0)->where('active',1)->get();

        if(count($rejection_out) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($rejection_out_beta as $key => $datas) 
        {
            $rejection_out_items = RejectionOutItem::where('r_out_no',$datas->r_out_no)->get();

            $rejection_out_expense = RejectionOutExpense::where('r_out_no',$datas->r_out_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($rejection_out_items as $j => $value) 
            {

            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($rejection_out_expense as $k => $values) 
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
        
        
        return view('admin.rejection_out.view',compact('rejection_out','rejection_out_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','supplier','location','cond','from','to'));
    }

    

}
