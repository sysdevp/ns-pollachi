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
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\SaleOrder;
use App\Models\SaleOrderItem;
use App\Models\SaleOrderExpense;
use App\Models\SaleEntry;
use App\Models\SaleEntryItem;
use App\Models\SaleEntryExpense;
use App\Models\SaleEntryTax;
use Illuminate\Support\Facades\Redirect;
use App\Models\CreditNote;
use App\Models\CreditNoteItem;
use App\Models\CreditNoteExpense;
use App\Models\CreditNoteTax;
use App\Models\RejectionIn;
use App\Models\RejectionInItem;
use App\Models\RejectionInExpense;
use App\Models\RejectionInTax;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $check_id = $id;
        $credit_note = CreditNote::where('active',1)->get();
        return view('admin.credit_note.view',compact('credit_note','check_id'));
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
        $estimation = Estimation::all();
        $sale_entry = SaleEntry::where('cancel_status',0)->get();
        $rejection_in = RejectionIn::where('cancel_status',0)->where('status',0)->get();
        $customer = Customer::all();
        $tax = Tax::all();
        $account_head = AccountHead::all();
        $location = Location::all();
         

        $voucher_num=CreditNote::orderBy('created_at','DESC')->select('id')->first();
        $append = "CN";
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

        return view('admin.credit_note.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','estimation','rejection_in','tax','sale_entry','customer','account_head','location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cn_no=CreditNote::orderBy('cn_no','DESC')
        //                    ->select('cn_no')
        //                    ->first();

        //  if ($cn_no == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$cn_no->cn_no;
        //      $voucher_no=$current_voucher_num+1;
        
        //  }

        $voucher_num=CreditNote::orderBy('created_at','DESC')->select('id')->first();
        $append = "CN";
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
         
         $voucher_date = $request->voucher_date;


    if($request->s_no != '')
    {

        CreditNote::where('s_no',$request->s_no)->update(['active' => 0]);
        CreditNoteItem::where('s_no',$request->s_no)->update(['active' => 0]);
        CreditNoteExpense::where('s_no',$request->s_no)->update(['active' => 0]);
        CreditNoteTax::where('s_no',$request->s_no)->update(['active' => 0]);

        foreach ($request->item_code as $key => $value) 
        {
            $sale_entry_item = SaleEntryItem::where('s_no',$request->s_no)->where('item_id',$value)->first();

            $sale_entry_item->remaining_qty = $request->quantity[$key];
            $sale_entry_item->credited_qty = $request->debited_qty[$key];

            $sale_entry_item->save();
   
        
        }
    }

    else if($request->r_in_no != '')
    {

        CreditNote::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        CreditNoteItem::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        CreditNoteExpense::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        CreditNoteTax::where('r_in_no',$request->r_in_no)->update(['active' => 0]);

        foreach ($request->item_code as $key => $value) 
        {
            $r_in_items = RejectionInItem::where('r_in_no',$request->r_in_no)->where('item_id',$value)->first();

            $sale_entry_item = SaleEntryItem::where('s_no',$r_in_items->s_no)->where('item_id',$value)->first();

                $r_in_items->r_in_credited_qty = $request->debited_qty[$key];
                $r_in_items->rejected_qty = $request->rejected_item_qty[$key];
                $r_in_items->save();

                $sale_entry_item->r_in_credited_qty = $request->debited_qty[$key];
                $sale_entry_item->rejected_qty = $request->rejected_item_qty[$key];
                $sale_entry_item->save();
  
        
        }
    }


         $credit_note = new CreditNote();

         $credit_note->cn_no = $voucher_no;
         $credit_note->cn_date = $voucher_date;
         $credit_note->s_no = $request->s_no;
         $credit_note->s_date = $request->s_date;
         $credit_note->r_in_no = $request->r_in_no;
         $credit_note->r_in_date = $request->r_in_date;
         $credit_note->customer_id = $request->customer_id;
         $credit_note->overall_discount = $request->overall_discount;
         $credit_note->total_net_value = $request->total_price;
         $credit_note->round_off = $request->round_off;
         $credit_note->location = $request->location;

         $credit_note->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
            $credit_note_items = new CreditNoteItem();

            $credit_note_items->cn_no = $voucher_no;
            $credit_note_items->cn_date = $voucher_date;
            $credit_note_items->s_no = $request->s_no;
            $credit_note_items->s_date = $request->s_date;
            $credit_note_items->r_in_no = $request->r_in_no;
            $credit_note_items->r_in_date = $request->r_in_date;
            $credit_note_items->item_sno = $request->invoice_sno[$i];
            $credit_note_items->item_id = $request->item_code[$i];
            $credit_note_items->mrp = $request->mrp[$i];
            $credit_note_items->gst = $request->tax_rate[$i];
            $credit_note_items->rate_exclusive_tax = $request->exclusive[$i];
            $credit_note_items->rate_inclusive_tax = $request->inclusive[$i];
            // $credit_note_items->remaining_after_credit = $request->remaining_after_debit[$i];
            $credit_note_items->qty = $request->actual_quantity[$i];
            $credit_note_items->rejected_qty = $request->rejected_item_qty[$i];
            $credit_note_items->remaining_qty = $request->quantity[$i];
            $credit_note_items->credited_qty = $request->debited_qty[$i]; 
            $credit_note_items->uom_id = $request->uom[$i];
            $credit_note_items->actual_purchase_qty = $request->actual_purchase_quantity[$i];
            $credit_note_items->discount = $request->discount[$i];

            $credit_note_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count == 0)
            {

            }
            else
            {
                $credit_note_expense = new CreditNoteExpense();

                $credit_note_expense->cn_no = $voucher_no;
                $credit_note_expense->cn_date = $voucher_date;
                $credit_note_expense->s_no = $request->s_no;
                $credit_note_expense->s_date = $request->s_date;
                $credit_note_expense->r_in_no = $request->r_in_no;
                $credit_note_expense->r_in_date = $request->r_in_date;
                $credit_note_expense->expense_type = $request->expense_type[$j];
                $credit_note_expense->expense_amount = $request->expense_amount[$j];

                $credit_note_expense->save();
            }
           
            
        }

        $tax = Tax::all();

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

               $tax_details = new CreditNoteTax;

               $tax_details->cn_no = $voucher_no;
               $tax_details->cn_date = $voucher_date;
               $tax_details->s_no = $request->s_no;
               $tax_details->s_date = $request->s_date;
               $tax_details->r_in_no = $request->r_in_no;
               $tax_details->r_in_date = $request->r_in_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }


        $credit_note_no = $credit_note->cn_no;
        
        $credit_note_print_data = CreditNote::where('cn_no',$credit_note_no)->first();
        $address = AddressDetails::where('address_ref_id',$credit_note_print_data->customer_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $credit_note_item_print_data = CreditNoteItem::where('cn_no',$credit_note_no)
                                                    ->get();

        $credit_note_expense_print_data = CreditNoteExpense::where('cn_no',$credit_note_no)->get(); 

        $amnt = $credit_note_print_data->total_net_value;

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
            return view('admin.credit_note.print',compact('credit_note_print_data','address','credit_note_item_print_data','credit_note_expense_print_data','result','points'));
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
        $credit_note = CreditNote::where('cn_no',$id)->first();
        $credit_note_items = CreditNoteItem::where('cn_no',$id)->get();
        $credit_note_expense = CreditNoteExpense::where('cn_no',$id)->get();

        //echo "<pre>"; print_r($purchase_entry_items);exit;

        $item_row_count = count($credit_note_items);
        $expense_row_count = count($credit_note_expense);


        if(isset($credit_note->customer->name) && !empty($credit_note->customer->name))
        {
            $customer_id = $credit_note->customer->id;

            $address_details = AddressDetails::where('address_ref_id',$customer_id)
                                            ->where('address_table','=','Cus')
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
             $address.="GST Number :".$address_details->customer->gst_no;
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
        foreach($credit_note_items as $key => $value)  
        {
            $item_amount[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

            $item_data = CreditNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('cn_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value[] = $amount + $gst_rs - $item_data->discount;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.credit_note.show',compact('credit_note','credit_note_items','credit_note_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst'));
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
        $sale_entry = SaleEntry::where('cancel_status',0)->get();
        $rejection_in = RejectionIn::where('cancel_status',0)->where('status',0)->get();
        $customer = Customer::all();
        $account_head = AccountHead::all();
        $location = Location::all();

        $credit_note = CreditNote::where('cn_no',$id)->where('active',1)->first();
        $credit_note_items = CreditNoteItem::where('cn_no',$id)->where('active',1)->get();
        $credit_note_expense = CreditNoteExpense::where('cn_no',$id)->where('active',1)->get();
        $tax = CreditNoteTax::where('cn_no',$id)->where('active',1)->get();

        $item_row_count = count($credit_note_items);
        $expense_row_count = count($credit_note_expense);


        if(isset($credit_note->customer->name) && !empty($credit_note->customer->name))
        {
            $customer_id = $credit_note->customer->id;

            $address_details = AddressDetails::where('address_ref_id',$customer_id)
                                            ->where('address_table','=','Cus')
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
             $address.="GST Number :".$address_details->customer->gst_no;
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
        foreach($credit_note_items as $key => $value)  
        {
            $item_amount[] = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

            $item_data = CreditNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('cn_date','DESC')
                                    ->first();

            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value[] = $amount + $gst_rs - $item_data->discount;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.credit_note.edit',compact('date','rejection_in','customer','categories','supplier','agent','brand','expense_type','item','estimation','credit_note','sale_entry','credit_note_items','credit_note_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax','expense_row_count','item_row_count','account_head','location'));
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
        $credit_note_data = CreditNote::where('cn_no',$id)->where('active',1);
        $credit_note_data->delete();

        $credit_note_item_data = CreditNoteItem::where('cn_no',$id)->where('active',1);
        $credit_note_item_data->delete();

        $credit_note_expense_data = CreditNoteExpense::where('cn_no',$id)->where('active',1);
        $credit_note_expense_data->delete();

        $credit_note_tax = CreditNoteTax::where('cn_no',$id)->where('active',1);
        $credit_note_tax->delete();

        $voucher_date = $request->voucher_date;
        $voucher_no = $request->voucher_no;

    if($request->s_no != '')
    {

        // CreditNote::where('s_no',$request->s_no)->update(['active' => 0]);
        // CreditNoteItem::where('s_no',$request->s_no)->update(['active' => 0]);
        // CreditNoteExpense::where('s_no',$request->s_no)->update(['active' => 0]);
        // CreditNoteTax::where('s_no',$request->s_no)->update(['active' => 0]);

        foreach ($request->item_code as $key => $value) 
        {
            $sale_entry_item = SaleEntryItem::where('s_no',$request->s_no)->where('item_id',$value)->first();

            $sale_entry_item->remaining_qty = $request->quantity[$key];
            $sale_entry_item->credited_qty = $request->debited_qty[$key];

            $sale_entry_item->save();
   
        
        }
    }

    else if($request->r_in_no != '')
    {

        // CreditNote::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        // CreditNoteItem::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        // CreditNoteExpense::where('r_in_no',$request->r_in_no)->update(['active' => 0]);
        // CreditNoteTax::where('r_in_no',$request->r_in_no)->update(['active' => 0]);

        foreach ($request->item_code as $key => $value) 
        {
            $r_in_items = RejectionInItem::where('r_in_no',$request->r_in_no)->where('item_id',$value)->first();

            $sale_entry_item = SaleEntryItem::where('s_no',$r_in_items->s_no)->where('item_id',$value)->first();

                $r_in_items->r_in_credited_qty = $request->debited_qty[$key];
                $r_in_items->rejected_qty = $request->rejected_item_qty[$key];
                $r_in_items->save();

                $sale_entry_item->r_in_credited_qty = $request->debited_qty[$key];
                $sale_entry_item->rejected_qty = $request->rejected_item_qty[$key];
                $sale_entry_item->save();
  
        
        }
    }

         $credit_note = new CreditNote();

         $credit_note->cn_no = $voucher_no;
         $credit_note->cn_date = $voucher_date;
         $credit_note->s_no = $request->s_no;
         $credit_note->s_date = $request->s_date;
         $credit_note->r_in_no = $request->r_in_no;
         $credit_note->r_in_date = $request->r_in_date;
         $credit_note->customer_id = $request->customer_id;
         $credit_note->overall_discount = $request->overall_discount;
         $credit_note->total_net_value = $request->total_price;
         $credit_note->round_off = $request->round_off;
         $credit_note->location = $request->location;

         $credit_note->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;
         // if($expense_count == 0)
         // {
         //    $expense_count =1;
         // }

         for($i=0;$i<$items_count;$i++)

        {
            $credit_note_items = new CreditNoteItem();

            $credit_note_items->cn_no = $voucher_no;
            $credit_note_items->cn_date = $voucher_date;
            $credit_note_items->s_no = $request->s_no;
            $credit_note_items->s_date = $request->s_date;
            $credit_note_items->r_in_no = $request->r_in_no;
            $credit_note_items->r_in_date = $request->r_in_date;
            $credit_note_items->item_sno = $request->invoice_sno[$i];
            $credit_note_items->item_id = $request->item_code[$i];
            $credit_note_items->mrp = $request->mrp[$i];
            $credit_note_items->gst = $request->tax_rate[$i];
            $credit_note_items->rate_exclusive_tax = $request->exclusive[$i];
            $credit_note_items->rate_inclusive_tax = $request->inclusive[$i];
            // $credit_note_items->remaining_after_credit = $request->remaining_after_debit[$i];
            $credit_note_items->qty = $request->actual_quantity[$i];
            $credit_note_items->rejected_qty = $request->rejected_item_qty[$i];
            $credit_note_items->remaining_qty = $request->quantity[$i];
            $credit_note_items->credited_qty = $request->debited_qty[$i]; 
            $credit_note_items->uom_id = $request->uom[$i];
            $credit_note_items->actual_purchase_qty = $request->actual_purchase_quantity[$i];
            $credit_note_items->discount = $request->discount[$i];

            $credit_note_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count == 0)
            {

            }
            else
            {
                $credit_note_expense = new CreditNoteExpense();

                $credit_note_expense->cn_no = $voucher_no;
                $credit_note_expense->cn_date = $voucher_date;
                $credit_note_expense->s_no = $request->s_no;
                $credit_note_expense->s_date = $request->s_date;
                $credit_note_expense->r_in_no = $request->r_in_no;
                $credit_note_expense->r_in_date = $request->r_in_date;
                $credit_note_expense->expense_type = $request->expense_type[$j];
                $credit_note_expense->expense_amount = $request->expense_amount[$j];

                $credit_note_expense->save();
            }
           
            
        }

        $tax = Tax::all();

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

               $tax_details = new CreditNoteTax;

               $tax_details->cn_no = $voucher_no;
               $tax_details->cn_date = $voucher_date;
               $tax_details->s_no = $request->s_no;
               $tax_details->s_date = $request->s_date;
               $tax_details->r_in_no = $request->r_in_no;
               $tax_details->r_in_date = $request->r_in_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }


        $credit_note_no = $credit_note->cn_no;
        
        $credit_note_print_data = CreditNote::where('cn_no',$credit_note_no)->first();
        $address = AddressDetails::where('address_ref_id',$credit_note_print_data->customer_id)
                                 ->where('address_table','=','Supplier')
                                 ->first();

        $credit_note_item_print_data = CreditNoteItem::where('cn_no',$credit_note_no)
                                                    ->get();

        $credit_note_expense_print_data = CreditNoteExpense::where('cn_no',$credit_note_no)->get(); 

        $amnt = $credit_note_print_data->total_net_value;

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
            return view('admin.credit_note.print',compact('credit_note_print_data','address','credit_note_item_print_data','credit_note_expense_print_data','result','points'));
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
        $credit_note_data = CreditNote::where('cn_no',$id)->where('active',1);
        $credit_note_item_data = CreditNoteItem::where('cn_no',$id)->where('active',1);
        $credit_note_expense_data = CreditNoteExpense::where('cn_no',$id)->where('active',1);
        $credit_note_tax = CreditNoteTax::where('cn_no',$id)->where('active',1);

        $credit_note = CreditNote::where('cn_no',$id)->where('active',1)->first();

        $s_no = $credit_note->s_no;
        $r_in_no = $credit_note->r_in_no;


        $sales_entry_item = SaleEntryItem::where('s_no',$s_no)->get();
        foreach ($sales_entry_item as $key => $value) 
        {
            $qty = $value->credited_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            SaleEntryItem::where('s_no',$s_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'credited_qty' => 0]);

        }

        $r_in_item = RejectionInItem::where('r_in_no',$r_in_no)->get();
        foreach ($r_in_item as $key => $value) 
        {
            $qty = $value->r_in_credited_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            RejectionInItem::where('r_in_no',$r_in_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'r_in_credited_qty' => 0]);

        }
        
        if($credit_note_data)
        {
            $credit_note_data->update(['active' => 0]);
        }
        if($credit_note_item_data)
        {
        $credit_note_item_data->update(['active' => 0]);
        }

        if($credit_note_expense_data)
        {
        $credit_note_expense_data->update(['active' => 0]);
        } 
        if($credit_note_tax)
        {
            $credit_note_tax->update(['active' => 0]);
        }    
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function address_details(Request $request)
    {
       $customer_id = $request->customer_id;

       $getdata = AddressDetails::where('address_details.address_table','=','Cus')
       ->where('address_details.address_ref_id','=',$customer_id)
       ->first();

       $filter = SaleEntry::where('customer_id',$customer_id)
                            ->select('s_no','s_date')
                            ->get();
       $r_in_filter = RejectionIn::where('customer_id',$customer_id)
                            ->select('r_in_no','r_in_date')
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
         $address.="GST Number :".$getdata->customer->gst_no;

         $options = "";
         $r_in_options = "";

         foreach ($filter as $key => $value) {
             $options .= '<option value="'.$value->s_no.'">Sale Entry No:'.$value->s_no.' - Date:'.$value->s_date.'</option>';
         }
         foreach ($r_in_filter as $key => $value) {
             $r_in_options .= '<option value="'.$value->r_in_no.'">Rejection In No:'.$value->r_in_no.' - Date:'.$value->r_in_date.'</option>';
         }

         $result = array('address' => $address, 'options' => $options, 'r_in_options' => $r_in_options);
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

            $sum = $tax_value + $items->category->gst_no;                            
            $data[] = array('igst' => $sum);
            
            
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

            $data[] = array('igst' => $tax_value);    

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

        $item_details = CreditNoteItem::where('cn_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.credit_note.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = CreditNoteExpense::where('cn_no',$id)->get();
        return view('admin.credit_note.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = CreditNoteItem::where('item_id',$id)
                                    ->orderBy('cn_date','DESC')
                                    ->first();

        $amount = $item_data->qty * $item_data->rate_exclusive_tax;
        $gst_rs = $amount * $item_data->gst / 100;
        $net_value = $amount + $gst_rs - $item_data->discount; 

        return $net_value;                          
    }

    public function s_details(Request $request)
    {
        $s_no = $request->s_no;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = AccountHead::all();
        $estimation =Estimation::all();

        // $voucher_num=PurchaseEntry::orderBy('p_no','DESC')
        //                    ->select('p_no')
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

        $sale_entry = SaleEntry::where('s_no',$s_no)->first();
        $sale_entry_item = SaleEntryItem::where('s_no',$s_no)->get();
        $sale_entry_expense = SaleEntryExpense::where('s_no',$s_no)->get();
        $sale_entry_tax = SaleEntryTax::where('s_no',$s_no)->get();

        $round_off = $sale_entry->round_off;
        $overall_discount = $sale_entry->overall_discount;
         $total_net_value = $sale_entry->total_net_value;
         $date_sale_entry = $sale_entry->s_date;

        $item_row_count = count($sale_entry_item);
        $expense_row_count = count($sale_entry_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($sale_entry_item as $key => $value)  
        {

            // $sum = $value->rejected_qty + $value->credited_qty;
            // $remaining_qty = $value->actual_qty - $sum;

            $actual_quantity = $value->credited_qty + $value->remaining_qty;
            $debited_qty = $value->credited_qty + $value->r_in_credited_qty;

            $status++;
            $i++;
            
            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            $item_data = SaleEntryItem::where('item_id',$value->item_id)
                                    ->orderBy('s_date','DESC')
                                    ->first();
                                    
            $item_sum = $item_data->rejected_qty + $item_data->credited_qty;
            $item_remaining_qty = $item_data->actual_qty - $item_sum;
                                    
            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><font class="font_purchase_quantity'.$i.'">'.$value['actual_qty'].'</font><input type="hidden" class="actual_qty" name="actual_qty[]" value="'.$value['actual_qty'].'"></td><td><font class="font_rejected_qty'.$i.'">'.$value['rejected_qty'].'</font><input type="hidden" class="rejected_quantity" name="rejected_item_qty[]" id="rejected_quantity'.$i.'" value="'.$value['rejected_qty'].'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font><input type="hidden" class="actual_quantity" id="actual_quantity'.$i.'" value="'.$actual_quantity.'" name="actual_quantity[]"><input type="hidden" class="actual_purchase_quantity" id="actual_purchase_quantity'.$i.'" value="'.$value['actual_qty'].'" name="actual_purchase_quantity[]"><input type="hidden" class="remaining_qty" id="remaining_qty'.$i.'" value="'.$value['remaining_qty'].'" name="remaining_qty[]"></div></div></td><td><font class="font_debited_qty'.$i.'">'.$value['credited_qty'].'</font><input type="hidden" class="debited_qty" value="'.$value['credited_qty'].'" name="debited_qty[]" id="debited_qty'.$i.'"><input type="hidden" class="r_out_debited_qty" value="'.$value['r_in_credited_qty'].'" name="r_out_debited_qty[]" id="r_out_debited_qty'.$i.'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

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
        foreach($sale_entry_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" readonly name="expense_type[]">@if(isset($value->expense_types->name) && !empty($value->expense_types->name))<option value="'.$value->expense_types->id.'">'.$value->expense_types->name.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" readonly pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br></div></div>' ;
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
    foreach ($sale_entry_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_sale_entry'=>$date_sale_entry,'expense_cnt'=>$expense_cnt,'tax_append'=>$tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }


    public function rejection_in_details(Request $request)
    {
        $r_in_no = $request->r_in_no;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = AccountHead::all();
        $estimation =Estimation::all();

        // $voucher_num=PurchaseEntry::orderBy('p_no','DESC')
        //                    ->select('p_no')
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

        $rejection_in = RejectionIn::where('r_in_no',$r_in_no)->first();
        $rejection_in_item = RejectionInItem::where('r_in_no',$r_in_no)->get();
        $rejection_in_expense = RejectionInExpense::where('r_in_no',$r_in_no)->get();
        $rejection_in_tax = RejectionInTax::where('r_in_no',$r_in_no)->get();

        $round_off = $rejection_in->round_off;
        $overall_discount = $rejection_in->overall_discount;
         $total_net_value = $rejection_in->total_net_value;
         $date_rejection_in = $rejection_in->r_in_date;

        $item_row_count = count($rejection_in_item);
        $expense_row_count = count($rejection_in_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($rejection_in_item as $key => $value)  
        {

            // $rejected_qty = $value->rejected_qty - $value->credited_qty;

            $status++;
            $i++;
            
            $item_amount = $value->rejected_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            $item_data = RejectionInItem::where('item_id',$value->item_id)
                                    ->orderBy('r_in_date','DESC')
                                    ->first();


            $last_purchase_amount = $item_data->rejected_qty - $item_data->credited_qty;
                                    
            $amount = $item_data->rejected_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><font class="font_purchase_quantity'.$i.'">'.$value['actual_qty'].'</font><input type="hidden" class="actual_qty" name="actual_qty[]" value="'.$value['actual_qty'].'"></td><td><font class="font_rejected_qty'.$i.'">'.$value['rejected_qty'].'</font><input type="hidden" class="rejected_quantity" name="rejected_item_qty[]" id="rejected_quantity'.$i.'" value="'.$value['rejected_qty'].'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font><input type="hidden" class="actual_quantity" id="actual_quantity'.$i.'" value="'.$value['rejected_qty'].'" name="actual_quantity[]"><input type="hidden" class="actual_purchase_quantity" id="actual_purchase_quantity'.$i.'" value="'.$value['qty'].'" name="actual_purchase_quantity[]"><input type="hidden" class="remaining_qty" id="remaining_qty'.$i.'" value="'.$value['remaining_qty'].'" name="remaining_qty[]"></div></div></td><td><font class="font_debited_qty'.$i.'">'.$value['r_in_credited_qty'].'</font><input type="hidden" class="debited_qty" value="'.$value['r_in_credited_qty'].'" name="debited_qty[]" id="debited_qty'.$i.'"></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

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
        foreach($rejection_in_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" readonly name="expense_type[]">@if(isset($value->expense_types->name) && !empty($value->expense_types->name))<option value="'.$value->expense_types->id.'">'.$value->expense_types->name.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->name.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ route("account_head.create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" readonly pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br></div></div>' ;
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
    foreach ($rejection_in_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_rejection_in'=>$date_rejection_in,'expense_cnt'=>$expense_cnt,'tax_append'=>$tax_append,'overall_discount' => $overall_discount);
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

        $credit_note_data = CreditNote::where('cn_no',$id)->where('active',1);
        $credit_note_item_data = CreditNoteItem::where('cn_no',$id)->where('active',1);
        $credit_note_expense_data = CreditNoteExpense::where('cn_no',$id)->where('active',1);
        $credit_note_tax = CreditNoteTax::where('cn_no',$id)->where('active',1);

        $credit_note = CreditNote::where('cn_no',$id)->where('active',1)->first();

        $s_no = $credit_note->s_no;
        $r_in_no = $credit_note->r_in_no;


        $sales_entry_item = SaleEntryItem::where('s_no',$s_no)->get();
        foreach ($sales_entry_item as $key => $value) 
        {
            $qty = $value->credited_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            SaleEntryItem::where('s_no',$s_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'credited_qty' => 0]);

        }

        $r_in_item = RejectionInItem::where('r_in_no',$r_in_no)->get();
        foreach ($r_in_item as $key => $value) 
        {
            $qty = $value->r_in_credited_qty + $value->remaining_qty;
            $item_id = $value->item_id;
            RejectionInItem::where('r_in_no',$r_in_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'r_in_credited_qty' => 0]);

        }

        $credit_notes = CreditNote::where('cn_no',$id)->first();

        $credit_notes->cancel_status = 1;
        $credit_notes->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {

        $credit_note_data = CreditNote::where('cn_no',$id)->where('active',1);
        $credit_note_item_data = CreditNoteItem::where('cn_no',$id)->where('active',1);
        $credit_note_expense_data = CreditNoteExpense::where('cn_no',$id)->where('active',1);
        $credit_note_tax = CreditNoteTax::where('cn_no',$id)->where('active',1);

        $credit_note_items = CreditNoteItem::where('cn_no',$id)->where('active',1)->get();

        $credit_note = CreditNote::where('cn_no',$id)->where('active',1)->first();

        $s_no = $credit_note->s_no;
        $r_in_no = $credit_note->r_in_no;

        foreach ($credit_note_items as $key => $value) 
        {
            $credited_qty[] = $value->credited_qty;
        }


        $sales_entry_item = SaleEntryItem::where('s_no',$s_no)->get();
        foreach ($sales_entry_item as $key => $value) 
        {
            $qty = $value->remaining_qty - $credited_qty[$key];
            $item_id = $value->item_id;
            SaleEntryItem::where('s_no',$s_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'credited_qty' => $credited_qty[$key]]);

        }

        $r_in_item = RejectionInItem::where('r_in_no',$r_in_no)->get();
        foreach ($r_in_item as $key => $value) 
        {
            $qty = $value->remaining_qty - $credited_qty[$key];
            $item_id = $value->item_id;
            RejectionInItem::where('r_in_no',$r_in_no)->where('item_id',$item_id)->update(['remaining_qty' => $qty, 'r_in_credited_qty' => $credited_qty[$key]]);

        }

        $credit_notes = CreditNote::where('cn_no',$id)->first();

        $credit_notes->cancel_status = 0;
        $credit_notes->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

}
