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
use App\Models\PriceLevel;
use App\Models\ItemwiseOffer;
use DB;
use App\Models\VoucherNumbering;
use Carbon\Carbon;
use App\Models\PriceUpdation;
use App\Models\SellingPriceSetup;
use App\Models\PurchaseEntryItem;
use App\Models\SaleOrder;
use App\Models\SaleOrderBeta;
use App\Models\SaleOrderTax;
use App\Models\SaleOrderBetaTax;
use App\Models\SaleOrderItem;
use App\Models\SaleOrderBetaItem;
use App\Models\SaleOrderExpense;
use App\Models\SaleOrderBetaExpense;
use App\Models\SaleEntry;
use App\Models\SaleEntryBeta;
use App\Models\SalesMan;
use App\Models\SaleEntryTax;
use App\Models\SaleEntryBetaTax;
use App\Models\SaleEntryItem;
use App\Models\SaleEntryBetaItem;
use App\Models\SaleEntryExpense;
use App\Models\SaleEntryBetaExpense;
use App\Models\SaleEstimation;
use App\Models\SaleEstimationTax;
use App\Models\SaleEstimationExpense;
use App\Models\SaleEstimationItem;
use App\Models\StockChange;
use App\Models\DeliveryNote;
use App\Models\DeliveryNoteBeta;
use App\Models\DeliveryNoteTax;
use App\Models\DeliveryNoteBetaTax;
use App\Models\DeliveryNoteItem;
use App\Models\DeliveryNoteBetaItem;
use App\Models\DeliveryNoteExpense;
use App\Models\DeliveryNoteBetaExpense;
use App\Models\RejectionIn;
use App\Models\RejectionInItem;
use App\Models\RejectionInExpense;
use App\Models\RejectionInTax;
use App\Models\RejectionInBeta;
use App\Models\RejectionInBetaItem;
use App\Models\RejectionInBetaExpense;
use App\Models\RejectionInBetaTax;
use App\Models\CreditNote;
use App\Models\CreditNoteItem;
use App\Models\CreditNoteExpense;
use App\Models\CreditNoteTax;
use App\Models\CreditNoteBeta;
use App\Models\CreditNoteBetaItem;
use App\Models\CreditNoteBetaExpense;
use App\Models\CreditNoteBetaTax;
use App\Models\ReceiptProcessAdjustments;
use App\Models\ReceiptProcess;
use Illuminate\Support\Facades\Redirect;
use App\Models\SalesVoucherType;
use App\Models\UploadDocument;

class SalesEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $check_id = $id;
        /*alpha*/
        $sale_entry = SaleEntry::orderBy('s_no','ASC')->get();

        if(count($sale_entry) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($sale_entry as $key => $datas) 
        {
            $sale_entry_items = SaleEntryItem::where('s_no',$datas->s_no)->get();

            $sale_entry_expense = SaleEntryExpense::where('s_no',$datas->s_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_entry_items as $j => $value) 
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

            foreach ($sale_entry_expense as $k => $values) 
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

    $sale_entry_beta = SaleEntryBeta::orderBy('s_no','ASC')->get();

        if(count($sale_entry_beta) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($sale_entry_beta as $key => $datas) 
        {
            $sale_entry_items = SaleEntryBetaItem::where('s_no',$datas->s_no)->get();

            $sale_entry_expense = SaleEntryBetaExpense::where('s_no',$datas->s_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_entry_items as $j => $value) 
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

            foreach ($sale_entry_expense as $k => $values) 
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

    $customer = Customer::all();
    $sales_man = SalesMan::all();
    $location = Location::all();

        return view('admin.sales_entry.view',compact('sale_entry','sale_entry_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','customer','sales_man','location'));
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
        $saleorder = SaleOrder::where('cancel_status',0)->get();
        $sale_estimation = SaleEstimation::where('cancel_status',0)->get();
        $delivery_note = DeliveryNote::where('cancel_status',0)->get();
        $customer = Customer::all();
        $tax = Tax::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();
        $location = Location::all();
        $voucher_type = SalesVoucherType::where('name','Sales Entry')->get();

        // $voucher_num=SaleEntry::orderBy('s_no','DESC')
        //                    ->select('s_no')
        //                    ->first();

        //  if ($voucher_num == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->s_no;
        //      $voucher_no=$current_voucher_num+1;
        
         
        //  }

        // $voucher_num=SaleEntry::orderBy('created_at','DESC')->select('id')->first();
        // $append = "SE";
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

        $voucher_num=VoucherNumbering::where('id',10)
                           ->first();


        $digits = $voucher_num->digits;  
        $starting_no = $voucher_num->starting_no;   
        $numlength = strlen((string)$voucher_num->starting_no);   

        $vouchers=SaleEntry::orderBy('created_at','DESC')->select('voucher_no')->first();                  

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


        return view('admin.sales_entry.add',compact('date','categories','sale_estimation',
'delivery_note','voucher_no','supplier','item','agent','brand','expense_type','estimation','saleorder','customer','tax','sales_man','account_head','location','voucher_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $s_no=SaleEntry::orderBy('s_no','DESC')
        //                    ->select('s_no')
        //                    ->first();

        //  if ($s_no == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$s_no->s_no;
        //      $voucher_no=$current_voucher_num+1;
        
        //  }
        if($request->has('check'))
        {
            // $voucher_num=SaleEntryBeta::orderBy('created_at','DESC')->select('id')->first();
            $vouchers=SaleEntryBeta::orderBy('created_at','DESC')->select('voucher_no')->first();
        }
        else
        {
            // $voucher_num=SaleEntry::orderBy('created_at','DESC')->select('id')->first();
            $vouchers=SaleEntry::orderBy('created_at','DESC')->select('voucher_no')->first();
        }
        
        $tax = Tax::all();
        // $append = "SE";
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

        $voucher_type = $request->voucher_type;

        $voucher_num = SalesVoucherType::where('id',$request->voucher_type)->first();

        $digits = $voucher_num->no_digits;  
        $updated_no = $voucher_num->updated_no; 
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=SaleEntry::orderBy('created_at','DESC')->select('voucher_no')->first();                  

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
            
        SalesVoucherType::where('id',$voucher_type)
                        ->update(['updated_no' => $current_voucher_num]);

         $voucher_date = $request->voucher_date;
         $estimation_date = $request->estimation_date;

         if($request->d_no)
         {
            if($request->has('check'))
            {
                $delivery_tag = 1;
                $receipt_note = DeliveryNoteBeta::where('d_no',$request->d_no)->where('cancel_status',0)->update(['delivery_tag' => $delivery_tag]);
            }
            else
            {
                $delivery_tag = 1;
                $receipt_note = DeliveryNote::where('d_no',$request->d_no)->where('cancel_status',0)->update(['delivery_tag' => $delivery_tag]);
            }

            
         }
         else
         {
            $delivery_tag = 0;
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
            $sale_entry = new SaleEntryBeta();
         }
         else
         {
            $sale_entry = new SaleEntry();
         }

         
         $sale_entry->voucher_no = $current_voucher_num;
         $sale_entry->s_no = $voucher_no;
         $sale_entry->s_date = $voucher_date;
         $sale_entry->so_no = $request->so_no;
         $sale_entry->so_date = $request->so_date;
         $sale_entry->sale_estimation_no = $request->sale_estimation_no;
         $sale_entry->sale_estimation_date = $request->sale_estimation_date;
         $sale_entry->d_no = $request->d_no;
         $sale_entry->d_date = $request->d_date;
         $sale_entry->delivery_tag = $delivery_tag;
         $sale_entry->customer_id = $request->customer_id;
         $sale_entry->salesman_id = $request->salesmen_id;
         $sale_entry->overall_discount = $request->overall_discount;
         $sale_entry->total_net_value = $request->total_price;
         $sale_entry->round_off = $request->round_off;
         $sale_entry->location = $request->location;

         $sale_entry->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {

            if($request->has('check'))
             {
                $sale_entry_items = new SaleEntryBetaItem();
             }
             else
             {
                $sale_entry_items = new SaleEntryItem();
             }

                

                $sale_entry_items->s_no = $voucher_no;
                $sale_entry_items->s_date = $voucher_date;
                $sale_entry_items->so_no = $request->so_no;
                $sale_entry_items->so_date = $request->so_date;
                $sale_entry_items->sale_estimation_no = $request->sale_estimation_no;
                $sale_entry_items->sale_estimation_date = $request->sale_estimation_date;
                $sale_entry_items->d_no = $request->d_no;
                $sale_entry_items->d_date = $request->d_date;
                $sale_entry_items->item_sno = $request->invoice_sno[$i];
                $sale_entry_items->item_id = $request->item_code[$i];
                $sale_entry_items->actual_item_id = $request->item_code[$i];
                $sale_entry_items->mrp = $request->mrp[$i];
                $sale_entry_items->gst = $request->tax_rate[$i];
                $sale_entry_items->rate_exclusive_tax = $request->exclusive[$i];
                $sale_entry_items->rate_inclusive_tax = $request->inclusive[$i];
                $sale_entry_items->qty = $request->quantity[$i];
                $sale_entry_items->actual_qty = $request->quantity[$i];
                $sale_entry_items->remaining_qty = $request->quantity[$i];
                $sale_entry_items->remaining_after_credit = $request->quantity[$i];
                $sale_entry_items->rejected_qty = 0;
                $sale_entry_items->remaining_rejected_qty = 0;
                $sale_entry_items->credited_qty = 0;
                $sale_entry_items->r_in_credited_qty = 0;
                $sale_entry_items->uom_id = $request->uom[$i];
                $sale_entry_items->discount = $request->discount[$i];
                $sale_entry_items->overall_disc = $request->overall_disc[$i];
                $sale_entry_items->expenses = $request->expenses[$i];
                $sale_entry_items->free = $request->itemwiseoffer[$i];
                // $sale_entry_items->b_or_w = $request->black_or_white[$i];
                $sale_entry_items->save();

                 $item_name1 =  isset($request->item_name1[$i]) ? ($request->item_name1[$i]) : 0;
                 if($item_name1==0){ 
                $item_name1 = $request->item_code[$i];
                 } else {
                $item_name1 = $item_name1;
                 }
                 if($item_name1 != $request->item_code[$i]){
                 $stock_change = new StockChange();
                 $stock_change->location_id = $request->location;
                 $serial_id = StockChange::max('serial_id');
                 $stock_change->serial_id = $serial_id+1;
                 $uom_id_stock_change = Item::where('id',$item_name1)->select('uom_id', 'child_unit')->get();
                 $stock_change->uom_id = $uom_id_stock_change[0]->uom_id;
                 $stock_change->quantity = -1;
                 $stock_change->status = 1;
                 $stock_change->item_id = $item_name1;
                 $stock_change->save();

                 $stock_change_new = new StockChange();
                 $stock_change_new->location_id = $request->location;
                 $stock_change_new->serial_id = $serial_id+1;
                 $uom_id_stock_change_new = Item::where('id',$request->item_code[$i])->select('uom_id')->get();
                 $stock_change_new->uom_id = $uom_id_stock_change_new[0]->uom_id;
                 $stock_change_new->quantity = $uom_id_stock_change[0]->child_unit;
                 $stock_change_new->status = 1;
                 $stock_change_new->item_id = $request->item_code[$i];
                 $stock_change_new->save();
                 }

            
            
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {

                if($request->has('check'))
                 {
                     $sale_entry_expense = new SaleEntryBetaExpense();
                 }
                 else
                 {
                     $sale_entry_expense = new SaleEntryExpense();
                 }
               

                $sale_entry_expense->s_no = $voucher_no;
                $sale_entry_expense->s_date = $voucher_date;
                $sale_entry_expense->so_no = $request->so_no;
                $sale_entry_expense->so_date = $request->so_date;
                $sale_entry_expense->sale_estimation_no = $request->sale_estimation_no;
                $sale_entry_expense->sale_estimation_date = $request->sale_estimation_date;
                $sale_entry_expense->d_no = $request->d_no;
                $sale_entry_expense->d_date = $request->d_date;
                $sale_entry_expense->expense_type = $request->expense_type[$j];
                $sale_entry_expense->expense_amount = $request->expense_amount[$j];

                $sale_entry_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

            if($request->has('check'))
             {
                 $tax_details = new SaleEntryBetaTax;
             }
             else
             {
                 $tax_details = new SaleEntryTax;
             }

               

               $tax_details->s_no = $voucher_no;
               $tax_details->s_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }


        $sale_entry_no = $sale_entry->s_no;

        if($request->has('check'))
         {
             $sale_entry_print_data = SaleEntryBeta::where('s_no',$sale_entry_no)->first();
        $address = AddressDetails::where('address_ref_id',$sale_entry_print_data->customer_id)
                                 ->where('address_table','=','Cus')
                                 ->first();

        // $sale_entry_black_item_print_data = SaleEntryBlackItem::where('s_no',$sale_entry_no);                                    

        $sale_entry_item_print_data = SaleEntryBetaItem::where('s_no',$sale_entry_no)
                                                    // ->union($sale_entry_black_item_print_data)
                                                    ->get();

        $sale_entry_expense_print_data = SaleEntryBetaExpense::where('s_no',$sale_entry_no)->get(); 

        $amnt = $sale_entry_print_data->total_net_value;
         }
         else
         {
             $sale_entry_print_data = SaleEntry::where('s_no',$sale_entry_no)->first();
        $address = AddressDetails::where('address_ref_id',$sale_entry_print_data->customer_id)
                                 ->where('address_table','=','Cus')
                                 ->first();

        // $sale_entry_black_item_print_data = SaleEntryBlackItem::where('s_no',$sale_entry_no);                                    

        $sale_entry_item_print_data = SaleEntryItem::where('s_no',$sale_entry_no)
                                                    // ->union($sale_entry_black_item_print_data)
                                                    ->get();

        $sale_entry_expense_print_data = SaleEntryExpense::where('s_no',$sale_entry_no)->get(); 

        $amnt = $sale_entry_print_data->total_net_value;
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
        //receipt save coding
        $receipt_process = new ReceiptProcess();
        $receipt_process->voucher_no       = $voucher_no;
        $receipt_process->voucher_date      =  $voucher_date;
        $receipt_process->customer_id      = $request->customer_id;
        $receipt_process->payment_mode =  $request->mode;
        $receipt_process->s_no =  $voucher_no;
        if($request->mode==3){
        $receipt_process->receipt_amount =  $request->total_net_value;
        $receipt_process->net_value =  $request->total_net_value;
        } 
        else if($request->mode==2 || $request->mode==4 || $request->mode==5) {
        $receipt_process->receipt_amount =  $request->bill_amount;
        $receipt_process->net_value =  $request->bill_amount;
        $receipt_process->payment_date =  $request->payment_date;
        $receipt_process->reference_no =  $request->reference_no;
        $receipt_process->remarks =  $request->remarks;
        }
        else {
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

        if($request->save == 1)
        {
            return view('admin.sales_entry.print',compact('sale_entry_print_data','address','sale_entry_item_print_data','sale_entry_expense_print_data','result','points'));
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
        $sale_entry = SaleEntry::where('s_no',$id)->first();
        $sale_entry_items = SaleEntryItem::where('s_no',$id)->get();
        $sale_entry_expense = SaleEntryExpense::where('s_no',$id)->get();
        $tax = SaleEntryTax::where('s_no',$id)->get();
        $upload = UploadDocument::where('voucher_no',$id)->get();

        //echo "<pre>"; print_r($purchase_entry_items);exit;

        $item_row_count = count($sale_entry_items);
        $expense_row_count = count($sale_entry_expense);


        if(isset($sale_entry->customer->name) && !empty($sale_entry->customer->name))
        {
            $customer_id = $sale_entry->customer->id;

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
        foreach($sale_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                // $item_net_value[] = 0;
                // $item_amount[] = 0;
                // $item_gst_rs[] = 0;
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
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


            $item_data = SaleEntryItem::where('item_id',$value->item_id)
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

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_entry.show',compact('sale_entry','sale_entry_items','sale_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax','upload'));
    }


    public function show_beta($id)
    {
        $sale_entry = SaleEntryBeta::where('s_no',$id)->first();
        $sale_entry_items = SaleEntryBetaItem::where('s_no',$id)->get();
        $sale_entry_expense = SaleEntryBetaExpense::where('s_no',$id)->get();
        $tax = SaleEntryBetaTax::where('s_no',$id)->get();

        //echo "<pre>"; print_r($purchase_entry_items);exit;

        $item_row_count = count($sale_entry_items);
        $expense_row_count = count($sale_entry_expense);


        if(isset($sale_entry->customer->name) && !empty($sale_entry->customer->name))
        {
            $customer_id = $sale_entry->customer->id;

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
        foreach($sale_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                // $item_net_value[] = 0;
                // $item_amount[] = 0;
                // $item_gst_rs[] = 0;
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
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


            $item_data = SaleEntryBetaItem::where('item_id',$value->item_id)
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

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_entry.show',compact('sale_entry','sale_entry_items','sale_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax'));
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
        $estimation = Estimation::all();
        $saleorder = SaleOrder::where('cancel_status',0)->get();
        $sale_estimation = SaleEstimation::where('cancel_status',0)->get();
        $delivery_note = DeliveryNote::where('cancel_status',0)->get();
        $customer = Customer::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();
        $location = Location::all();

        $sale_entry = SaleEntry::where('s_no',$id)->first();
        $sale_entry_items = SaleEntryItem::where('s_no',$id)
                                        ->get();
        $sale_entry_expense = SaleEntryExpense::where('s_no',$id)->get();
        $tax = SaleEntryTax::where('s_no',$id)->get();
        $receipt_process = ReceiptProcess::where('s_no',$id)->first();
        $upload = UploadDocument::where('voucher_no',$id)->get();

        $item_row_count = count($sale_entry_items);
        $expense_row_count = count($sale_entry_expense);


        if(isset($sale_entry->customer->name) && !empty($sale_entry->customer->name))
        {
            $customer_id = $sale_entry->customer->id;

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
        foreach($sale_entry_items as $key => $value)  
        {

            if($value->remaining_qty == 0)
            {
                // $item_net_value[] = 0;
                // $item_amount[] = 0;
                // $item_gst_rs[] = 0;
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
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


            $item_data = SaleEntryItem::where('item_id',$value->item_id)
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

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_entry.edit',compact('date','customer','categories','supplier','agent','brand','expense_type','item','estimation','saleorder','sale_estimation','delivery_note','sale_entry','sale_entry_items','sale_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','tax','sales_man','account_head','location','beta_checking_value','receipt_process','upload'));
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
        $estimation = Estimation::all();
        $saleorder = SaleOrderBeta::where('cancel_status',0)->get();
        $sale_estimation = SaleEstimation::where('cancel_status',0)->get();
        $delivery_note = DeliveryNoteBeta::where('cancel_status',0)->get();
        $customer = Customer::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();
        $location = Location::all();

        $sale_entry = SaleEntryBeta::where('s_no',$id)->first();
        $sale_entry_items = SaleEntryBetaItem::where('s_no',$id)
                                        ->get();
        $sale_entry_expense = SaleEntryBetaExpense::where('s_no',$id)->get();
        $tax = SaleEntryBetaTax::where('s_no',$id)->get();
        $receipt_process = ReceiptProcess::where('s_no',$id)->first();
        $upload = UploadDocument::where('voucher_no',$id)->get();

        $item_row_count = count($sale_entry_items);
        $expense_row_count = count($sale_entry_expense);


        if(isset($sale_entry->customer->name) && !empty($sale_entry->customer->name))
        {
            $customer_id = $sale_entry->customer->id;

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
        foreach($sale_entry_items as $key => $value)  
        {
            if($value->remaining_qty == 0)
            {
                // $item_net_value[] = 0;
                // $item_amount[] = 0;
                // $item_gst_rs[] = 0;
                $item_amount[] = ($value->remaining_qty + $value->rejected_qty) * $value->rate_exclusive_tax;
                $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
                $item_discount = $value->discount + $value->overall_disc;
                $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;
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


            $item_data = SaleEntryBetaItem::where('item_id',$value->item_id)
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

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_entry.edit',compact('date','customer','categories','supplier','agent','brand','expense_type','item','estimation','saleorder','sale_estimation','delivery_note','sale_entry','sale_entry_items','sale_entry_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','tax','sales_man','account_head','location','beta_checking_value','receipt_process','upload'));
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
        if($request->beta_checking_value == 1)
        {
            $sale_entry_data = SaleEntryBeta::where('s_no',$id);
            $sale_entry_data->delete();

            $sale_entry_tax_data = SaleEntryBetaTax::where('s_no',$id);
            $sale_entry_tax_data->delete();

            $sale_entry_item_data = SaleEntryBetaItem::where('s_no',$id);
            $sale_entry_item_data->delete();

            $sale_entry_expense_data = SaleEntryBetaExpense::where('s_no',$id);
            $sale_entry_expense_data->delete();

            $sale_entry_receipt_data = ReceiptProcess::where('voucher_no',$id);
            $sale_entry_receipt_data->delete();

            $sale_entry_upload_data = UploadDocument::where('voucher_no',$id);
            $sale_entry_upload_data->delete();

        }
        else
        {
            $sale_entry_data = SaleEntry::where('s_no',$id);
            $sale_entry_data->delete();

            $sale_entry_tax_data = SaleEntryTax::where('s_no',$id);
            $sale_entry_tax_data->delete();

            $sale_entry_item_data = SaleEntryItem::where('s_no',$id);
            $sale_entry_item_data->delete();

            $sale_entry_expense_data = SaleEntryExpense::where('s_no',$id);
            $sale_entry_expense_data->delete();

            $sale_entry_receipt_data = ReceiptProcess::where('voucher_no',$id);
            $sale_entry_receipt_data->delete();

            $sale_entry_upload_data = UploadDocument::where('voucher_no',$id);
            $sale_entry_upload_data->delete();
        }
        

        $voucher_date = $request->voucher_date;
        $voucher_no = $request->voucher_no;

        if($request->doc_count >0)
        {
           foreach ($request->doc_name as $key => $value) {
            $upload_document = new UploadDocument(); 

               $upload_document->voucher_no = $request->voucher_no;
               $upload_document->voucher_date = $request->voucher_date;
               $upload_document->document_name = $request->doc_name[$key];
               $upload_document->document = $request->documents[$key];

               $upload_document->save();
        } 
        }
        

        /*Document Upload*/

        if($files=$request->file('document')){
            foreach($files as $key => $file){
                $name=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).date('Y-m-d').time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/documents/',$name);

                $upload_document = new UploadDocument(); 

               $upload_document->voucher_no = $request->voucher_no;
               $upload_document->voucher_date = $request->voucher_date;
               $upload_document->document_name = $request->documentname[$key];
               $upload_document->document = $name;

               $upload_document->save();
            }
        }        

        /*Document Upload*/

        if($request->d_no)
         {
            $delivery_tag = 1;
         }
         else
         {
            $delivery_tag = 0;
         }

        $tax = Tax::all();


        if($request->beta_checking_value == 1)
        {
            $sale_entry = new SaleEntryBeta();
        }
        else
        {
            $sale_entry = new SaleEntry();
        }
         
         $sale_entry->voucher_no = $request->voucher_number;
         $sale_entry->s_no = $voucher_no;
         $sale_entry->s_date = $voucher_date;
         $sale_entry->so_no = $request->so_no;
         $sale_entry->so_date = $request->so_date;
         $sale_entry->sale_estimation_no = $request->sale_estimation_no;
         $sale_entry->sale_estimation_date = $request->sale_estimation_date;
         $sale_entry->d_no = $request->d_no;
         $sale_entry->d_date = $request->d_date;
         $sale_entry->delivery_tag = $delivery_tag;
         $sale_entry->customer_id = $request->customer_id;
         $sale_entry->salesman_id = $request->salesmen_id;
         $sale_entry->overall_discount = $request->overall_discount;
         $sale_entry->total_net_value = $request->total_price;
         $sale_entry->round_off = $request->round_off;
         $sale_entry->location = $request->location;

         $sale_entry->save();

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
                    $sale_entry_items = new SaleEntryBetaItem();
                }
                else
                {
                    $sale_entry_items = new SaleEntryItem();
                }
                

                $sale_entry_items->s_no = $voucher_no;
                $sale_entry_items->s_date = $voucher_date;
                $sale_entry_items->so_no = $request->so_no;
                $sale_entry_items->so_date = $request->so_date;
                $sale_entry_items->sale_estimation_no = $request->sale_estimation_no;
                $sale_entry_items->sale_estimation_date = $request->sale_estimation_date;
                $sale_entry_items->d_no = $request->d_no;
                $sale_entry_items->d_date = $request->d_date;
                $sale_entry_items->item_sno = $request->invoice_sno[$i];
                $sale_entry_items->item_id = $request->item_code[$i];
                $sale_entry_items->actual_item_id = $request->item_code[$i];
                $sale_entry_items->mrp = $request->mrp[$i];
                $sale_entry_items->gst = $request->tax_rate[$i];
                $sale_entry_items->rate_exclusive_tax = $request->exclusive[$i];
                $sale_entry_items->rate_inclusive_tax = $request->inclusive[$i];
                $sale_entry_items->qty = $request->quantity[$i];
                $sale_entry_items->actual_qty = $request->quantity[$i];
                $sale_entry_items->remaining_qty = $request->quantity[$i];
                $sale_entry_items->remaining_after_credit = $request->quantity[$i];
                $sale_entry_items->remaining_rejected_qty = 0;
                $sale_entry_items->rejected_qty = 0;
                $sale_entry_items->credited_qty = 0;
                $sale_entry_items->r_in_credited_qty = 0;
                $sale_entry_items->uom_id = $request->uom[$i];
                $sale_entry_items->discount = $request->discount[$i];
                $sale_entry_items->overall_disc = $request->overall_disc[$i];
                $sale_entry_items->expenses = $request->expenses[$i];
                $sale_entry_items->free = $request->itemwiseoffer[$i];
                // $sale_entry_items->b_or_w = $request->black_or_white[$i];
                $sale_entry_items->save();

                 $item_name1 =  isset($request->item_name1[$i]) ? ($request->item_name1[$i]) : 0;
                 if($item_name1==0){ 
                $item_name1 = $request->item_code[$i];
                 } else {
                $item_name1 = $item_name1;
                 }
                 if($item_name1 != $request->item_code[$i]){
                 $stock_change = new StockChange();
                 $stock_change->location_id = $request->location;
                 $serial_id = StockChange::max('serial_id');
                 $stock_change->serial_id = $serial_id+1;
                 $uom_id_stock_change = Item::where('id',$item_name1)->select('uom_id', 'child_unit')->get();
                 $stock_change->uom_id = $uom_id_stock_change[0]->uom_id;
                 $stock_change->quantity = -1;
                 $stock_change->status = 1;
                 $stock_change->item_id = $item_name1;
                 $stock_change->save();

                 $stock_change_new = new StockChange();
                 $stock_change_new->location_id = $request->location;
                 $stock_change_new->serial_id = $serial_id+1;
                 $uom_id_stock_change_new = Item::where('id',$request->item_code[$i])->select('uom_id')->get();
                 $stock_change_new->uom_id = $uom_id_stock_change_new[0]->uom_id;
                 $stock_change_new->quantity = $uom_id_stock_change[0]->child_unit;
                 $stock_change_new->status = 1;
                 $stock_change_new->item_id = $request->item_code[$i];
                 $stock_change_new->save();
                 }

            

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
                    $sale_entry_expense = new SaleEntryBetaExpense();
                }
                else
                {
                    $sale_entry_expense = new SaleEntryExpense();
                }
                

                $sale_entry_expense->s_no = $voucher_no;
                $sale_entry_expense->s_date = $voucher_date;
                $sale_entry_expense->so_no = $request->so_no;
                $sale_entry_expense->so_date = $request->so_date;
                $sale_entry_expense->sale_estimation_no = $request->sale_estimation_no;
                $sale_entry_expense->sale_estimation_date = $request->sale_estimation_date;
                $sale_entry_expense->d_no = $request->d_no;
                $sale_entry_expense->d_date = $request->d_date;
                $sale_entry_expense->expense_type = $request->expense_type[$j];
                $sale_entry_expense->expense_amount = $request->expense_amount[$j];

                $sale_entry_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';

                if($request->beta_checking_value == 1)
                {
                    $tax_details = new SaleEntryBetaTax;
                }
                else
                {
                    $tax_details = new SaleEntryTax;
                }
               

               $tax_details->s_no = $voucher_no;
               $tax_details->s_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

            }


        $sale_entry_no = $sale_entry->s_no;

        if($request->beta_checking_value == 1)
        {
            $sale_entry_print_data = SaleEntryBeta::where('s_no',$sale_entry_no)->first();
            $address = AddressDetails::where('address_ref_id',$sale_entry_print_data->customer_id)
                                     ->where('address_table','=','Cus')
                                     ->first();


            $sale_entry_item_print_data = SaleEntryBetaItem::where('s_no',$sale_entry_no)
                                                        ->get();

            $sale_entry_expense_print_data = SaleEntryBetaExpense::where('s_no',$sale_entry_no)->get(); 

            $amnt = $sale_entry_print_data->total_net_value;
        }
        else
        {
            $sale_entry_print_data = SaleEntry::where('s_no',$sale_entry_no)->first();
            $address = AddressDetails::where('address_ref_id',$sale_entry_print_data->customer_id)
                                     ->where('address_table','=','Cus')
                                     ->first();

            $sale_entry_item_print_data = SaleEntryItem::where('s_no',$sale_entry_no)
                                                        ->get();

            $sale_entry_expense_print_data = SaleEntryExpense::where('s_no',$sale_entry_no)->get(); 

            $amnt = $sale_entry_print_data->total_net_value;
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

        //receipt save coding
        $receipt_process = new ReceiptProcess();
        $receipt_process->voucher_no       = $voucher_no;
        $receipt_process->voucher_date      =  $voucher_date;
        $receipt_process->customer_id      = $request->customer_id;
        $receipt_process->payment_mode =  $request->mode;
        $receipt_process->s_no =  $voucher_no;
        if($request->mode==3){
        $receipt_process->receipt_amount =  $request->total_net_value;
        $receipt_process->net_value =  $request->total_net_value;
        } 
        else if($request->mode==2 || $request->mode==4 || $request->mode==5) {
        $receipt_process->receipt_amount =  $request->bill_amount;
        $receipt_process->net_value =  $request->bill_amount;
        $receipt_process->payment_date =  $request->payment_date;
        $receipt_process->reference_no =  $request->reference_no;
        $receipt_process->remarks =  $request->remarks;
        }
        else {
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
        
       
        // for($i=0;$i<$adv_id_cnt;$i++)
        // {
        // $receipt_process_adjustments = new ReceiptProcessAdjustments();
        // $receipt_process_adjustments->receipt_process_id = $request->receipt_no;
        // $receipt_process_adjustments->advance_receipt_no = $request->adv_id[$i];
        // $receipt_process_adjustments->amount = $request->amount[$i];
        // $receipt_process_adjustments->active_status = "1";
        // $receipt_process_adjustments->created_by = 0;
        // $receipt_process_adjustments->updated_by = 0;
        // $receipt_process_adjustments->save();
        // }
                         

        if($request->save == 1)
        {
            return view('admin.sales_entry.print',compact('sale_entry_print_data','address','sale_entry_item_print_data','sale_entry_expense_print_data','result','points'));
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
        $sale_entry_data = SaleEntry::where('s_no',$id);
        $sale_entry_item_data = SaleEntryItem::where('s_no',$id);
        $sale_entry_expense_data = SaleEntryExpense::where('s_no',$id);
        $sale_entry_tax_data = SaleEntryTax::where('s_no',$id);
        $sale_entry_receipt_data = ReceiptProcess::where('voucher_no',$id);

        $rejection_in = RejectionIn::where('s_no',$id);
        $rejection_in_item = RejectionInItem::where('s_no',$id);
        $rejection_in_expense = RejectionInExpense::where('s_no',$id);
        $rejection_in_tax = RejectionInTax::where('s_no',$id);

        $credit_note = CreditNote::where('s_no',$id);
        $credit_note_item = CreditNoteItem::where('s_no',$id);
        $credit_note_expense = CreditNoteExpense::where('s_no',$id);
        $credit_note_tax = CreditNoteTax::where('s_no',$id);
        
        if($sale_entry_data)
        {
            $sale_entry_data->delete();
            $rejection_in->delete();
            $credit_note->delete();
            $sale_entry_receipt_data->delete();
        }
         if($sale_entry_item_data)
         {
            $sale_entry_item_data->delete();
            $rejection_in_item->delete();
            $credit_note_item->delete();
         }

         if($sale_entry_expense_data)
         {
            $sale_entry_expense_data->delete();
            $rejection_in_expense->delete();
            $credit_note_expense->delete();
         }
         if($sale_entry_tax_data)
         {
            $sale_entry_tax_data->delete();
            $rejection_in_tax->delete();
            $credit_note_tax->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function delete_beta($id)
    {
        $sale_entry_data = SaleEntryBeta::where('s_no',$id);
        $sale_entry_item_data = SaleEntryBetaItem::where('s_no',$id);
        $sale_entry_expense_data = SaleEntryBetaExpense::where('s_no',$id);
        $sale_entry_tax_data = SaleEntryBetaTax::where('s_no',$id);

        $rejection_in = RejectionInBeta::where('s_no',$id);
        $rejection_in_item = RejectionInBetaItem::where('s_no',$id);
        $rejection_in_expense = RejectionInBetaExpense::where('s_no',$id);
        $rejection_in_tax = RejectionInBetaTax::where('s_no',$id);

        $credit_note = CreditNoteBeta::where('s_no',$id);
        $credit_note_item = CreditNoteBetaItem::where('s_no',$id);
        $credit_note_expense = CreditNoteBetaExpense::where('s_no',$id);
        $credit_note_tax = CreditNoteBetaTax::where('s_no',$id);
        
        if($sale_entry_data)
        {
            $sale_entry_data->delete();
            $rejection_in->delete();
            $credit_note->delete();
        }
         if($sale_entry_item_data)
         {
            $sale_entry_item_data->delete();
            $rejection_in_item->delete();
            $credit_note_item->delete();
         }

         if($sale_entry_expense_data)
         {
            $sale_entry_expense_data->delete();
            $rejection_in_expense->delete();
            $credit_note_expense->delete();
         }
         if($sale_entry_tax_data)
         {
            $sale_entry_tax_data->delete();
            $rejection_in_tax->delete();
            $credit_note_tax->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }


    public function voucher_type(Request $request)
    {
        $voucher_num = SalesVoucherType::where('id',$request->voucher_type)->first();

        $digits = $voucher_num->no_digits;  
        $updated_no = $voucher_num->updated_no; 
        $numlength = strlen((string)$voucher_num->updated_no);   

        $vouchers=SaleEntry::orderBy('created_at','DESC')->select('voucher_no')->first();                  

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
       $customer_id = $request->customer_id;

       $getdata = AddressDetails::where('address_details.address_table','=','Cus')
       ->where('address_details.address_ref_id','=',$customer_id)
       ->first();

       $estimation_filter = SaleEstimation::where('customer_id',$customer_id)
                                        ->select('sale_estimation_no','sale_estimation_date')
                                        ->get();
       $so_filter = SaleOrder::where('customer_id',$customer_id)
                            ->select('so_no','so_date')
                            ->get(); 
       $delivery_filter = DeliveryNote::where('customer_id',$customer_id)
                                        ->select('d_no','d_date')
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

         $estimation_options = "";
         $so_options = "";
         $delivery_options = "";

         foreach ($estimation_filter as $key => $value) {
             $estimation_options .= '<option value="'.$value->sale_estimation_no.'">Sale Estimation No:'.$value->sale_estimation_no.' - Date:'.$value->sale_estimation_date.'</option>';
         }
         foreach ($so_filter as $key => $value) {
             $so_options .= '<option value="'.$value->so_no.'">Sale Order No:'.$value->so_no.' - Date:'.$value->so_date.'</option>';
         }
         foreach ($delivery_filter as $key => $value) {
             $delivery_options .= '<option value="'.$value->d_no.'">Delivery Note No:'.$value->d_no.' - Date:'.$value->d_date.'</option>';
         }

         $result = array('address' => $address,'estimation_options' => $estimation_options,'so_options' => $so_options,'delivery_options' => $delivery_options);

         echo json_encode($result);exit();



   return $address;   
        
    }


    public function getdata(Request $request,$id)
    {
        $id=$request->id;

        $items=Item::where('id',$id)->first();

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc','default_selling_price')
                    ->first();


        if(isset($items->category->gst_no) && $items->category->gst_no != '' && $items->category->gst_no != 0)
        {
            @$tax_master_cgst = Tax::where('name','cgst')->first();
            @$tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */                    
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->get();

            foreach (@$tax_view as $key => $value) 
            {
              @$tax_val[] = $value->value;
              @$tax_master[] = $value->tax_master_id;
            }      

            $cnt = count(@$tax_master);               

            /* end dynamic tax value */                    

            $sum = @$tax_value + $items->category->gst_no;                            
            $data[] = array('igst' => $sum,'tax_val' => @$tax_val,'tax_master' =>@$tax_master,'cnt' => $cnt);
            
            
        }  
        else
        {
            @$tax_master_cgst = Tax::where('name','cgst')->first();
            @$tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                ->sum('value');


            /* start dynamic tax value */

            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->get();

            foreach (@$tax_view as $key => $value) 
            {
              @$tax_val[] = $value->value;
              @$tax_master[] = $value->tax_master_id;
            }      

            $cnt = count(@$tax_master);               

            /* end dynamic tax value */                     

            $data[] = array('igst' => @$tax_value,'tax_val' => @$tax_val,'tax_master' =>@$tax_master, 'cnt' => $cnt);    

        }          
         
        $data[] =ItemBracodeDetails::where('item_id','=',$id)
                                    ->select('barcode')
                                    ->first();
 

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
        
    // }

        @$selling_price_setup = SellingPriceSetup::where('id',1)->first(); 

        @$default_selling_price = Item::where('id',$id)->select('default_selling_price')->first();

        if(@$selling_price_setup != '' && @$selling_price_setup->setup == 2)
        {
            $item_data = PurchaseEntryItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$id)
                                        ->where('status',1)
                                        ->whereDate('effective_from', '<=', Carbon::now())
                                        ->orderBy('updated_at','DESC')
                                        ->latest()
                                        ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                        ->first();

            if($item_data == '')
            {
                $unit_price = 0;
                $discount = 0;
                $item_rate = 0;
                $tax = 0;
            }  
            else
            {
               $unit_price = @$item_data->rate_inclusive_tax;
                $discount = @$item_data->discount / @$item_data->qty;
                $item_rate = $unit_price - $discount;

                $tax = @$item_data->gst; 
            }                                      

            

            if(@$updated_selling_price == '')
            {
                $data['selling_price'] = @$default_selling_price->default_selling_price;
            }
            else
            {

            if(@$updated_selling_price->mark_up_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                $total = $item_rate + $percentage_val;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            else if(@$updated_selling_price->mark_up_type == 2)
            {
                $total = $item_rate + @$updated_selling_price->mark_up_value;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            if(@$updated_selling_price->mark_down_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                $total = $item_rate - $percentage_val;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            else if(@$updated_selling_price->mark_down_type == 2)
            {
               $total = $item_rate - @$updated_selling_price->mark_down_value;
               @$selling_price = number_format($total, 2, '.', ',');
            }

            $data['selling_price'] = @$selling_price;
        }
        }  
        else
        {
            $data['selling_price'] = @$default_selling_price->default_selling_price;
        }

        $data['selling_price_type'] = @$selling_price_setup->setup;


        $request->customer_id;

        @$customer = Customer::where('id',$request->customer_id)->first();

        $level = @$customer->price_level; 

        @$price_level = PriceLevel::where('id',$level)->first();

        $price_value = @$price_level->value;
        $type = @$price_level->type;



        if($type == 1)
        {
            $selling_price_rate = $data['selling_price'];
             $rate = $selling_price_rate * $price_value /100;

            $data['selling_price'] = $selling_price_rate - $rate;
        }
        else
        {
            $selling_price_rate = $data['selling_price'];

            $data['selling_price'] = $selling_price_rate - $price_value;

        }

        $offers = DB::table('offers')->whereRaw('FIND_IN_SET(?,item_id)', [$id])->count();
        if($offers > 0)
        {
            $offer_data = DB::table('offers')
                                ->whereRaw('FIND_IN_SET(?,item_id)', [$id])
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->whereDate('valid_to', '>=',Carbon::now())
                                ->first();
                                           

         if(@$offer_data->offer_type == 'time')
         {
                $current_time = date('H:i:s');

                if(strtotime($offer_data->from_time) <= strtotime($current_time) && strtotime($offer_data->to_time) >= strtotime($current_time))
                {
                    if(@$offer_data->variable == 'percentage')
                    {
                        $data['discount'] = @$offer_data->percentage;
                        $data['variable'] = '1';
                    }
                    else
                    {
                        $data['discount'] = @$offer_data->fixed_amount;
                        $data['variable'] = '0';
                    }
                }
         }  
         else if(@$offer_data->offer_type == 'day')
         {
            $current_date = date('d-m-Y');
              
            $offer_datas = DB::table('offers')
                                ->whereRaw('FIND_IN_SET(?,item_id)', [$id])
                                ->whereRaw('FIND_IN_SET(?,day_range_offers)', [$current_date])
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->whereDate('valid_to', '>=',Carbon::now())
                                ->first();


             if(@$offer_datas->variable == 'percentage')
                {
                    $data['discount'] = @$offer_datas->percentage;
                    $data['variable'] = '1';
                }
                else
                {
                    $data['discount'] = @$offer_datas->fixed_amount;
                    $data['variable'] = '0';
                }                   

         }
         else if(@$offer_data->offer_type == 'date')   
         {
            if(@$offer_data->variable == 'percentage')
                {
                    $data['discount'] = @$offer_data->percentage;
                    $data['variable'] = '1';
                }
                else
                {
                    $data['discount'] = @$offer_data->fixed_amount;
                    $data['variable'] = '0';
                }
         }                  

        }

        @$itemwise_data = ItemwiseOffer::where('buy_item_id',$id)
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->whereDate('valid_to', '>=',Carbon::now())
                                        ->first();

        if(@$itemwise_data != '')
        {
            $data['itemwise_offer'] = '1';
            $data['itemwise_offer_item_id'] = $itemwise_data->get_item_id;
            $data['get_item_qty'] = $itemwise_data->get_item_quantity;
            $data['buy_item_qty'] = $itemwise_data->buy_item_quantity;
        }
        else
        {
            $data['itemwise_offer'] = '0';
            $data['itemwise_offer_item_id'] = '';
            $data['get_item_qty'] = '0';
            $data['buy_item_qty'] = '0';
        }


        return $data;

    }

    function getdata_offer(Request $request)
    {
        $id = $request->id;
        $get_qty = $request->get_item_qty;
        $buy_qty = $request->buy_item_qty;

        // print_r($id); exit();

        $items=Item::where('id',$id)->first();

        $datas[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc','default_selling_price')
                    ->first();


        if(isset($items->category->gst_no) && $items->category->gst_no != '' && $items->category->gst_no != 0)
        {
            @$tax_master_cgst = Tax::where('name','cgst')->first();
            @$tax_master_sgst = Tax::where('name','sgst')->first();

            @$tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                ->sum('value');

            /* start dynamic tax value */                    
            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->get();

            foreach (@$tax_view as $key => $value) 
            {
              @$tax_val[] = $value->value;
              @$tax_master[] = $value->tax_master_id;
            }      

            $cnt = count(@$tax_master);               

            /* end dynamic tax value */                    

            $sum =@$tax_value + $items->category->gst_no;                            
            $datas[] = array('igst' => $sum,'tax_val' => @$tax_val,'tax_master' =>@$tax_master,'cnt' => $cnt);
            
            
        }  
        else
        {
            @$tax_master_cgst = Tax::where('name','cgst')->first();
            @$tax_master_sgst = Tax::where('name','sgst')->first();

            $tax_date = ItemTaxDetails::where('item_id',$id)
                                        ->orderBy('valid_from','DESC')
                                        ->whereDate('valid_from', '<=', Carbon::now())
                                        ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                        ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                        ->first('valid_from');

            $tax_value =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->where('tax_master_id','!=',@$tax_master_cgst->id)
                                ->where('tax_master_id','!=',@$tax_master_sgst->id)
                                ->sum('value');


            /* start dynamic tax value */

            $tax_view =ItemTaxDetails::where('item_id','=',$id)
                                ->where('valid_from',@$tax_date->valid_from)
                                ->get();

            foreach (@$tax_view as $key => $value) 
            {
              @$tax_val[] = $value->value;
              @$tax_master[] = $value->tax_master_id;
            }      

            $cnt = count(@$tax_master);               

            /* end dynamic tax value */                     

            $datas[] = array('igst' => @$tax_value,'tax_val' => @$tax_val,'tax_master' =>@$tax_master, 'cnt' => $cnt);    

        }          
         
        $datas[] =ItemBracodeDetails::where('item_id','=',$id)
                                    ->select('barcode')
                                    ->first();
 

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

        // $datas[]=$result;   

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

        $datas[]=$result;   
        
    // }

        @$selling_price_setup = SellingPriceSetup::where('id',1)->first(); 
        @$default_selling_price = Item::where('id',$id)->select('default_selling_price')->first();

        if(@$selling_price_setup != '' && @$selling_price_setup->setup == 2)
        {
            $item_data = PurchaseEntryItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$id)
                                        ->where('status',1)
                                        ->whereDate('effective_from', '<=', Carbon::now())
                                        ->orderBy('updated_at','DESC')
                                        ->latest()
                                        ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                        ->first();

            if($item_data == '')
            {
                $unit_price = 0;
                $discount = 0;
                $item_rate = 0;
                $tax = 0;
            }  
            else
            {
               $unit_price = @$item_data->rate_inclusive_tax;
                $discount = @$item_data->discount / @$item_data->qty;
                $item_rate = $unit_price - $discount;

                $tax = @$item_data->gst; 
            }                                      

            

            if(@$updated_selling_price == '')
            {
                $datas['selling_price'] = @$default_selling_price->default_selling_price;
            }
            else
            {

            if(@$updated_selling_price->mark_up_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                $total = $item_rate + $percentage_val;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            else if(@$updated_selling_price->mark_up_type == 2)
            {
                $total = $item_rate + @$updated_selling_price->mark_up_value;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            if(@$updated_selling_price->mark_down_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                $total = $item_rate - $percentage_val;
                @$selling_price = number_format($total, 2, '.', ',');
            }
            else if(@$updated_selling_price->mark_down_type == 2)
            {
               $total = $item_rate - @$updated_selling_price->mark_down_value;
               @$selling_price = number_format($total, 2, '.', ',');
            }

            $datas['selling_price'] = @$selling_price;
        }
        }  
        else
        {
            $datas['selling_price'] = @$default_selling_price->default_selling_price;
        }

        $datas['selling_price_type'] = @$selling_price_setup->setup;

        $datas['get_qty'] = $get_qty;
        $datas['buy_qty'] = $buy_qty;

        

        

        return $datas;

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
    
          

    }

//     function parentItem($array)
//    {
//        $output_array=[];
//        foreach($array  as $value)
//        {
//            $result_array=[];
//            $result_array['id']=$value->id;
//            $output_array[]=$result_array;
//              if(count($value->parentItem)>0)
//              {
//                 $test=$this->parentItem($value->parentItem);
//                 array_push($output_array,$test);
//              }  
//         }
//            return $output_array;
//    }

//    function get_parent_item_id($item_id)
//    {
//     //return $item_id;

//      $item=item::with('parentItem')->where('id',$item_id)->get();
   
//     $output_array=[];
//     foreach($item as $value)
//     {
//         $result_array=[];
//         $result_array['id']=$value->id;
//         $output_array[]=$result_array;
//         if(count($value->parentItem)>0)
//         {
//             $result=$this->parentItem($value->parentItem);
//             array_push($output_array,$result);
//         } 

//     }
// $result=[];
//     foreach ($output_array as $key => $value)
//     {
//         if (is_array($value))
//         {
//             $result = array_merge($result, array_flatten($value));
//         } else
//         {
//             $result = array_merge($result, array($key => $value));
//         }
//     }

//     //$result=implode("','", $result);
//     //$result="'".$result."'";
//     return $result;
// }

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

        $item_details = SaleEntryItem::where('s_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.sales_entry.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function item_beta_details($id)
    {

        $item_details = SaleEntryBetaItem::where('s_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.sales_entry.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = SaleEntryExpense::where('s_no',$id)->get();
        return view('admin.sales_entry.expense_details',compact('expense_details'));
    }

    public function expense_beta_details($id)
    {
        $expense_details = SaleEntryBetaExpense::where('s_no',$id)->get();
        return view('admin.sales_entry.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = SaleEntryItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
        if ($item_data == '') 
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

      $so_no = "";
      $d_no = "";
      if($request->id == 1)
      {

        $voucher_num=SaleEntryBeta::orderBy('created_at','DESC')->select('id')->first();
        $append = "SE";
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

        $saleorder = SaleOrderBeta::where('cancel_status',0)->get();

        $delivery_note = DeliveryNoteBeta::where('cancel_status',0)->get();

        foreach ($saleorder as $key => $value) {
         $so_no.= "<option value=".$value->so_no.">".$value->so_no."</option>";
        }

       foreach ($delivery_note as $key => $value) {
         $d_no.= "<option value=".$value->d_no.">".$value->d_no."</option>";
        }
        

        $result_array = array('so_no' => $so_no, 'd_no' => $d_no, 'voucher_no' => $voucher_no);
      }
      else
      {

        $voucher_num=SaleEntry::orderBy('created_at','DESC')->select('id')->first();
        $append = "SE";
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

        $saleorder = SaleOrder::where('cancel_status',0)->get();

        $delivery_note = DeliveryNote::where('cancel_status',0)->get();

        foreach ($saleorder as $key => $value) {
         $so_no.= "<option value=".$value->so_no.">".$value->so_no."</option>";
        }

       foreach ($delivery_note as $key => $value) {
         $d_no.= "<option value=".$value->d_no.">".$value->d_no."</option>";
        }
        

        $result_array = array('so_no' => $so_no, 'd_no' => $d_no, 'voucher_no' => $voucher_no);

    }
    echo json_encode($result_array); exit();
}


    public function se_details(Request $request)
    {
        $se_no = $request->se_no;
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

        $sale_estimation = SaleEstimation::where('sale_estimation_no',$se_no)->first();
        $sale_estimation_item = SaleEstimationItem::where('sale_estimation_no',$se_no)->get();
        $sale_estimation_expense = SaleEstimationExpense::where('sale_estimation_no',$se_no)->get();
        $sale_estimation_tax = SaleEstimationTax::where('sale_estimation_no',$se_no)->get();

        $round_off = $sale_estimation->round_off;
        $overall_discount = $sale_estimation->overall_discount;
         $total_net_value = $sale_estimation->total_net_value;
         $date=$sale_estimation->sale_estimation_date;

        $item_row_count = count($sale_estimation_item);
        $expense_row_count = count($sale_estimation_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($sale_estimation_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;


            $item_data = SaleEstimationItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->qty;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><input class="itemwiseoffer'.$i.'" type="hidden" id="itemwiseoffer'.$i.'" value="0" name="itemwiseoffer[]"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><input type="hidden" value="'.$value['item_id'].'" name="item_name1[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="1" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

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
        foreach($sale_estimation_expense as $key => $value)  
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
    foreach ($sale_estimation_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'expense_cnt'=>$expense_cnt,'date'=>$date,'tax_append' =>$tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }

    public function so_details(Request $request)
    {
        $so_no = $request->so_no;
        $alpha_beta = $request->alpha_beta;
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
        if($alpha_beta == 1)
        {
            $saleorder = SaleOrderBeta::where('so_no',$so_no)->first();
            $saleorder_item = SaleOrderBetaItem::where('so_no',$so_no)
                                            ->get();
            $saleorder_expense = SaleOrderBetaExpense::where('so_no',$so_no)->get();
            $saleorder_tax = SaleOrderBetaTax::where('so_no',$so_no)->get();
        }
        else
        {
            $saleorder = SaleOrder::where('so_no',$so_no)->first();
            $saleorder_item = SaleOrderItem::where('so_no',$so_no)
                                            ->get();
            $saleorder_expense = SaleOrderExpense::where('so_no',$so_no)->get();
            $saleorder_tax = SaleOrderTax::where('so_no',$so_no)->get();
        }
        

        $round_off = $saleorder->round_off;
        $overall_discount = $saleorder->overall_discount;
         $total_net_value = $saleorder->total_net_value;
         $sale_type = $saleorder->sale_type;
         $date_saleorder = $saleorder->so_date;
         $date_estimation = $saleorder->estimation_date;
         $estimation_no = $saleorder->estimation_no;

        $item_row_count = count($saleorder_item);
        $expense_row_count = count($saleorder_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($saleorder_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;

            // $item_black_data = SaleOrderBlackItem::where('item_id',$value->item_id)
            //                         ->orderBy('updated_at','DESC');

            if($alpha_beta == 1)
            {
                $item_data = SaleOrderBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            else
            {
                $item_data = SaleOrderItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->qty;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><input class="itemwiseoffer'.$i.'" type="hidden" id="itemwiseoffer'.$i.'" value="0" name="itemwiseoffer[]"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><input type="hidden" value="'.$value['item_id'].'" name="item_name1[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

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
        foreach($saleorder_expense as $key => $value)  
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
    foreach ($saleorder_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_saleorder'=>$date_saleorder,'sale_type'=>$sale_type,'date_estimation'=>$date_estimation,'estimation_no'=>$estimation_no,'expense_cnt'=>$expense_cnt,'tax_append' =>$tax_append,'overall_discount' => $overall_discount);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }


    public function delivery_details(Request $request)
    {
        $d_no = $request->d_no;
        $alpha_beta = $request->alpha_beta;
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
        if($alpha_beta == 1)
        {
            $delivery_note = DeliveryNoteBeta::where('d_no',$d_no)->first();
            $delivery_note_item = DeliveryNoteBetaItem::where('d_no',$d_no)
                                                    ->get();
            $delivery_note_expense = DeliveryNoteBetaExpense::where('d_no',$d_no)->get();
            $delivery_note_tax = DeliveryNoteBetaTax::where('d_no',$d_no)->get();
        }
        else
        {
            $delivery_note = DeliveryNote::where('d_no',$d_no)->first();
            $delivery_note_item = DeliveryNoteItem::where('d_no',$d_no)
                                                    ->get();
            $delivery_note_expense = DeliveryNoteExpense::where('d_no',$d_no)->get();
            $delivery_note_tax = DeliveryNoteTax::where('d_no',$d_no)->get();
        }
        

        $round_off = $delivery_note->round_off;
        $overall_discount = $delivery_note->overall_discount;
         $total_net_value = $delivery_note->total_net_value;
         $date=$delivery_note->d_date;

        $item_row_count = count($delivery_note_item);
        $expense_row_count = count($delivery_note_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($delivery_note_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->remaining_qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs - $item_discount + $value->expenses;

            // $item_black_data = DeliveryNoteBlackItem::where('item_id',$value->item_id)
            //                         ->orderBy('updated_at','DESC');

            if($alpha_beta == 1)
            {
                $item_data = DeliveryNoteBetaItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            else
            {
                $item_data = DeliveryNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();
            }
            

            $amount = $item_data->remaining_qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value = $sum / $item_data->remaining_qty;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><input class="itemwiseoffer'.$i.'" type="hidden" id="itemwiseoffer'.$i.'" value="0" name="itemwiseoffer[]"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'.$value['item_id'].'"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><input type="hidden" value="'.$value['item_id'].'" name="item_name1[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['remaining_qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['remaining_qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value['overall_disc'].'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value['overall_disc'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value['expenses'].'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value['expenses'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value['b_or_w'].'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

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
        foreach($delivery_note_expense as $key => $value)  
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
    foreach ($delivery_note_tax as $key => $value) 
    {
    $tax_append.= '<div class="col-md-2">
              <label style="font-family: Times new roman;">'.$value->taxes->name.'</label>
         <input type="text" class="form-control '.$value->taxes->id.'" readonly="" id="'.$value->taxes->id.'" name="'.$value->taxes->name.'" value="'.$value->value.'">
         <input type="hidden" name="'.$value->taxes->name.'_id" value="'.$value->taxes->id.'">
            </div>';
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'expense_cnt'=>$expense_cnt,'date'=>$date,'tax_append' =>$tax_append,'overall_discount' => $overall_discount);
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
        $sale_entry = SaleEntry::where('s_no',$id)->first();

        $sale_entry->cancel_status = 1;
        $sale_entry->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function cancel_beta($id)
    {
        $sale_entry = SaleEntryBeta::where('s_no',$id)->first();

        $sale_entry->cancel_status = 1;
        $sale_entry->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {
        $sale_entry = SaleEntry::where('s_no',$id)->first();

        $sale_entry->cancel_status = 0;
        $sale_entry->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function retrieve_beta($id)
    {
        $sale_entry = SaleEntryBeta::where('s_no',$id)->first();

        $sale_entry->cancel_status = 0;
        $sale_entry->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function report(Request $request)
    {




        $cond = [];
        if(isset($request->customer_id)){$cond['customer_id'] = $request->customer_id; }
        if(isset($request->salesman_id)) {$cond['salesman_id'] = $request->salesman_id;}
        if(isset($request->location)) {$cond['location'] = $request->location;}

        if(isset($request->from)) {$from = date('Y-m-d',strtotime($request->from)); }           
        if(isset($request->to)) {$to = date('Y-m-d',strtotime($request->to)); }
           // print_r($cond);exit;
        $check_id = "";

        $sale_entry = SaleEntry::where($cond)->whereBetween('s_date',[$from,$to])->orderBy('s_no','ASC')->get();

        if(count($sale_entry) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($sale_entry as $key => $datas) 
        {
            $sale_entry_items = SaleEntryItem::where('s_no',$datas->s_no)->get();

            $sale_entry_expense = SaleEntryExpense::where('s_no',$datas->s_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_entry_items as $j => $value) 
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

            foreach ($sale_entry_expense as $k => $values) 
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

    $sale_entry_beta = SaleEntryBeta::orderBy('s_no','ASC')->get();

        if(count($sale_entry_beta) == 0)
        {
            $taxable_value_beta[] = 0;
            $tax_value_beta[] = 0;
            $total_beta[] = 0;
            $expense_total_beta[] = 0;
            $total_discount_beta[] = 0;
        }
        else
        {

        foreach ($sale_entry_beta as $key => $datas) 
        {
            $sale_entry_items = SaleEntryBetaItem::where('s_no',$datas->s_no)->get();

            $sale_entry_expense = SaleEntryBetaExpense::where('s_no',$datas->s_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_entry_items as $j => $value) 
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

            foreach ($sale_entry_expense as $k => $values) 
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

    $customer = Customer::all();
    $sales_man = SalesMan::all();
    $location = Location::all();

        return view('admin.sales_entry.view',compact('sale_entry','sale_entry_beta','check_id','taxable_value','tax_value','total','expense_total','total_discount','taxable_value_beta','tax_value_beta','total_beta','expense_total_beta','total_discount_beta','customer','sales_man','location','from','to','cond'));
    }

}
