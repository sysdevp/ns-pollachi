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
use App\Models\PriceLevel;
use App\Models\AccountHead;
use App\Models\Customer;
use App\Models\SalesMan;
use App\Models\PurchaseEntryItem;
use App\Models\SaleEstimation;
use App\Models\SaleEstimationItem;
use App\Models\SaleEstimationExpense;
use App\Models\SaleEstimationTax;
use App\Models\PriceUpdation;
use DB;
use App\Models\SellingPriceSetup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class SalesEstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $check_id =$id;
        $sale_estimation = SaleEstimation::orderBy('sale_estimation_no','ASC')->get();

        if(count($sale_estimation) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($sale_estimation as $key => $datas) 
        {
            $sale_estimation_items = SaleEstimationItem::where('sale_estimation_no',$datas->sale_estimation_no)->get();

            $sale_estimation_expense = SaleEstimationExpense::where('sale_estimation_no',$datas->sale_estimation_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_estimation_items as $j => $value) 
            {

            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($sale_estimation_expense as $k => $values) 
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
    $customer = Customer::all();
    $sales_man = SalesMan::all();
    $agent = Agent::all();

        return view('admin.sales_estimation.view',compact('sale_estimation','check_id','tax_value','taxable_value','total','expense_total','total_discount','customer','sales_man','agent'));
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
        $customer = Customer::all();
        $tax = Tax::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();
        

        $voucher_num=SaleEstimation::orderBy('sale_estimation_no','DESC')
                           ->select('sale_estimation_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->sale_estimation_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

        return view('admin.sales_estimation.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','customer','tax','sales_man','account_head'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale_estimation_no=SaleEstimation::orderBy('sale_estimation_no','DESC')
                           ->select('sale_estimation_no')
                           ->first();

        $tax = Tax::all();                   

         if ($sale_estimation_no == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sale_estimation_no->sale_estimation_no;
             $voucher_no=$current_voucher_num+1;
        
         }
         $voucher_date = $request->voucher_date;

         $sale_estimation = new SaleEstimation();

         $sale_estimation->sale_estimation_no = $voucher_no;
         $sale_estimation->sale_estimation_date = $request->voucher_date;
         $sale_estimation->customer_id = $request->customer_id;
         $sale_estimation->salesman_id = $request->salesmen_id;
         $sale_estimation->agent_id = $request->agent_id;
         $sale_estimation->overall_discount = $request->overall_discount;
         $sale_estimation->total_net_value = $request->total_price;
         $sale_estimation->round_off = $request->round_off;

         $sale_estimation->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
            $sale_estimation_items = new SaleEstimationItem();

            $sale_estimation_items->sale_estimation_no = $voucher_no;
            $sale_estimation_items->sale_estimation_date = $request->voucher_date;
            $sale_estimation_items->item_sno = $request->invoice_sno[$i];
            $sale_estimation_items->item_id = $request->item_code[$i];
            $sale_estimation_items->mrp = $request->mrp[$i];
            $sale_estimation_items->gst = $request->tax_rate[$i];
            $sale_estimation_items->rate_exclusive_tax = $request->exclusive[$i];
            $sale_estimation_items->rate_inclusive_tax = $request->inclusive[$i];
            $sale_estimation_items->qty = $request->quantity[$i];
            $sale_estimation_items->uom_id = $request->uom[$i];
            $sale_estimation_items->discount = $request->discount[$i];
            $sale_estimation_items->overall_disc = $request->overall_disc[$i];
            $sale_estimation_items->expenses = $request->expenses[$i];

            $sale_estimation_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                $sale_estimation_expense = new SaleEstimationExpense();

                $sale_estimation_expense->sale_estimation_no = $voucher_no;
                $sale_estimation_expense->sale_estimation_date = $voucher_date;
                $sale_estimation_expense->expense_type = $request->expense_type[$j];
                $sale_estimation_expense->expense_amount = $request->expense_amount[$j];

                $sale_estimation_expense->save();
            }
           
            
        }


        foreach ($tax as $key => $value) 
                {
                    $str_json = json_encode($value->name); //array to json string conversion
                    $tax_name = str_replace('"', '', $str_json);
                    $value_name = $tax_name.'_id';

                       $tax_details = new SaleEstimationTax;

                       $tax_details->sale_estimation_no = $voucher_no;
                       $tax_details->sale_estimation_date = $request->voucher_date;
                       $tax_details->taxmaster_id = $request->$value_name;
                       $tax_details->value = $request->$tax_name;

                       $tax_details->save();

                    }


        $sale_estimation_num = $sale_estimation->sale_estimation_no;
        
        $sale_estimation_print_data = SaleEstimation::where('sale_estimation_no',$sale_estimation_num)->first();
        $address = AddressDetails::where('address_ref_id',$sale_estimation_print_data->customer_id)
                                 ->where('address_table','=','Cus')
                                 ->first();

        $sale_estimation_item_print_data = SaleEstimationItem::where('sale_estimation_no',$sale_estimation_num)
                                                    ->get();

        $sale_estimation_expense_print_data = SaleEstimationExpense::where('sale_estimation_no',$sale_estimation_num)->get(); 

        $amnt = $sale_estimation_print_data->total_net_value;

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
            return view('admin.sales_estimation.print',compact('sale_estimation_print_data','address','sale_estimation_item_print_data','sale_estimation_expense_print_data','result','points'));
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
        $sale_estimation = SaleEstimation::where('sale_estimation_no',$id)->first();
        $sale_estimation_item = SaleEstimationItem::where('sale_estimation_no',$id)->get();
        $sale_estimation_expense = SaleEstimationExpense::where('sale_estimation_no',$id)->get();
        $tax = SaleEstimationTax::where('sale_estimation_no',$id)->get();

        $tax_names = Tax::all();

        $item_row_count = count($sale_estimation_item);
        $expense_row_count = count($sale_estimation_expense);


        if(isset($sale_estimation->customer->name) && !empty($sale_estimation->customer->name))
        {
            $customer_id = $sale_estimation->customer->id;

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
        foreach($sale_estimation_item as $key => $value)  
        {
            $item_amount[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;

            $item_data = SaleEstimationItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value[] = $sum / $item_data->qty;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_estimation.show',compact('sale_estimation','sale_estimation_item','sale_estimation_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','tax','tax_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $customer = Customer::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();

        $sale_estimation = SaleEstimation::where('sale_estimation_no',$id)->first();
        $sale_estimation_item = SaleEstimationItem::where('sale_estimation_no',$id)->get();
        $sale_estimation_expense = SaleEstimationExpense::where('sale_estimation_no',$id)->get();
        $tax = SaleEstimationTax::where('sale_estimation_no',$id)->get();

        $item_row_count = count($sale_estimation_item);
        $expense_row_count = count($sale_estimation_expense);


        if(isset($sale_estimation->customer->name) && !empty($sale_estimation->customer->name))
        {
            $customer_id = $sale_estimation->customer->id;

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
        foreach($sale_estimation_item as $key => $value)  
        {
            $item_amount[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $item_discount + $value->expenses;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $discount_sum = $value->discount + $value->overall_disc;
            $item_discount_sum = $item_discount_sum + $discount_sum;

            $item_data = SaleEstimationItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $total_discount = $item_data->discount + $item_data->overall_disc;
            $sum = $amount + $gst_rs - $total_discount + $item_data->expenses; 

            $net_value[] = $sum / $item_data->qty;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.sales_estimation.edit',compact('categories','supplier','agent','brand','customer','expense_type','item','sale_estimation','sale_estimation_item','sale_estimation_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','tax','sales_man','account_head'));
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
        $sale_estimation_data = SaleEstimation::where('sale_estimation_no',$id);
        $sale_estimation_data->delete();

        $sale_estimation_tax_data = SaleEstimationTax::where('sale_estimation_no',$id);
        $sale_estimation_tax_data->delete();

        $sale_estimation_item_data = SaleEstimationItem::where('sale_estimation_no',$id);
        $sale_estimation_item_data->delete();

        $sale_estimation_expense_data = SaleEstimationExpense::where('sale_estimation_no',$id);
        $sale_estimation_expense_data->delete();

        $voucher_date = $request->voucher_date;
        $tax = Tax::all();

         $sale_estimation = new SaleEstimation();

         $sale_estimation->sale_estimation_no = $request->voucher_no;
         $sale_estimation->sale_estimation_date = $request->voucher_date;
         $sale_estimation->customer_id = $request->customer_id;
         $sale_estimation->salesman_id = $request->salesmen_id;
         $sale_estimation->agent_id = $request->agent_id;
         $sale_estimation->overall_discount = $request->overall_discount;
         $sale_estimation->total_net_value = $request->total_price;
         $sale_estimation->round_off = $request->round_off;

         $sale_estimation->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;
         if($expense_count == 0)
         {
            $expense_count =1;
         }

         for($i=0;$i<$items_count;$i++)

        {
            $sale_estimation_items = new SaleEstimationItem();

            $sale_estimation_items->sale_estimation_no = $request->voucher_no;
            $sale_estimation_items->sale_estimation_date = $request->voucher_date;
            $sale_estimation_items->item_sno = $request->invoice_sno[$i];
            $sale_estimation_items->item_id = $request->item_code[$i];
            $sale_estimation_items->mrp = $request->mrp[$i];
            $sale_estimation_items->gst = $request->tax_rate[$i];
            $sale_estimation_items->rate_exclusive_tax = $request->exclusive[$i];
            $sale_estimation_items->rate_inclusive_tax = $request->inclusive[$i];
            $sale_estimation_items->qty = $request->quantity[$i];
            $sale_estimation_items->uom_id = $request->uom[$i];
            $sale_estimation_items->discount = $request->discount[$i];
            $sale_estimation_items->overall_disc = $request->overall_disc[$i];
            $sale_estimation_items->expenses = $request->expenses[$i];

            $sale_estimation_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                $sale_estimation_expense = new SaleEstimationExpense();

                $sale_estimation_expense->sale_estimation_no = $request->voucher_no;
                $sale_estimation_expense->sale_estimation_date = $voucher_date;
                $sale_estimation_expense->expense_type = $request->expense_type[$j];
                $sale_estimation_expense->expense_amount = $request->expense_amount[$j];

                $sale_estimation_expense->save();
            }
           
            
        }

        foreach ($tax as $key => $value) 
                {
                    $str_json = json_encode($value->name); //array to json string conversion
                    $tax_name = str_replace('"', '', $str_json);
                    $value_name = $tax_name.'_id';

                       $tax_details = new SaleEstimationTax;

                       $tax_details->sale_estimation_no = $request->voucher_no;
                       $tax_details->sale_estimation_date = $request->voucher_date;
                       $tax_details->taxmaster_id = $request->$value_name;
                       $tax_details->value = $request->$tax_name;

                       $tax_details->save();

                    }
 

        $sale_estimation_num = $sale_estimation->sale_estimation_no;
        
        $sale_estimation_print_data = SaleEstimation::where('sale_estimation_no',$sale_estimation_num)->first();
        $address = AddressDetails::where('address_ref_id',$sale_estimation_print_data->customer_id)
                                 ->where('address_table','=','Cus')
                                 ->first();

        $sale_estimation_item_print_data = SaleEstimationItem::where('sale_estimation_no',$sale_estimation_num)
                                                    ->get();

        $sale_estimation_expense_print_data = SaleEstimationExpense::where('sale_estimation_no',$sale_estimation_num)->get(); 

        $amnt = $sale_estimation_print_data->total_net_value;

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
            return view('admin.sales_estimation.print',compact('sale_estimation_print_data','address','sale_estimation_item_print_data','sale_estimation_expense_print_data','result','points'));
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
        $sale_estimation_data = SaleEstimation::where('sale_estimation_no',$id);
        $sale_estimation_item_data = SaleEstimationItem::where('sale_estimation_no',$id);
        $sale_estimation_expense_data = SaleEstimationExpense::where('sale_estimation_no',$id);
        $sale_estimation_tax_data = SaleEstimationTax::where('sale_estimation_no',$id);
        
        if($sale_estimation_data)
        {
            $sale_estimation_data->delete();
        }
         if($sale_estimation_item_data)
         {
            $sale_estimation_item_data->delete();
         }

         if($sale_estimation_expense_data)
         {
            $sale_estimation_expense_data->delete();
         }
         if($sale_estimation_tax_data)
         {
            $sale_estimation_tax_data->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function address_details(Request $request)
    {
       $customer_id = $request->customer_id;

       $getdata = AddressDetails::where('address_details.address_table','=','Cus')
       ->where('address_details.address_ref_id','=',$customer_id)
       ->first();

      
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
         
        $data[] =ItemBracodeDetails::where('item_id','=',$id)
                                    ->select('barcode')
                                    ->first();
 

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
        
    }

        $selling_price_setup = SellingPriceSetup::where('id',1)->first(); 

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
                $data['selling_price'] = @$items->default_selling_price;
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
            $data['selling_price'] = @$items->default_selling_price;
        }

        $data['selling_price_type'] = $selling_price_setup->setup;

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
        // print_r($offers); exit();
        if($offers > 0)
        {
            $offer_data = DB::table('offers')
                                ->whereRaw('FIND_IN_SET(?,item_id)', [$id])
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->whereDate('valid_to', '>=',Carbon::now())
                                ->first();
            
            // print_r($current_date); exit();                                

         if($offer_data->offer_type == 'time')
         {
                $current_time = date('H:i:s');

                if(strtotime($offer_data->from_time) <= strtotime($current_time) && strtotime($offer_data->to_time) >= strtotime($current_time))
                {
                    // print_r('hi'); exit();  
                    if($offer_data->variable == 'percentage')
                    {
                        $data['discount'] = $offer_data->percentage;
                        $data['variable'] = '1';
                    }
                    else
                    {
                        $data['discount'] = $offer_data->fixed_amount;
                        $data['variable'] = '0';
                    }
                }
         }  
         else if($offer_data->offer_type == 'day')
         {
            $current_date = date('d-m-Y');
              
            $offer_datas = DB::table('offers')
                                ->whereRaw('FIND_IN_SET(?,item_id)', [$id])
                                ->whereRaw('FIND_IN_SET(?,day_range_offers)', [$current_date])
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->whereDate('valid_to', '>=',Carbon::now())
                                ->first();


             if($offer_datas->variable == 'percentage')
                {
                    $data['discount'] = $offer_datas->percentage;
                    $data['variable'] = '1';
                }
                else
                {
                    $data['discount'] = $offer_datas->fixed_amount;
                    $data['variable'] = '0';
                }                   

         }
         else if($offer_data->offer_type == 'date')   
         {
            if($offer_data->variable == 'percentage')
                {
                    $data['discount'] = $offer_data->percentage;
                    $data['variable'] = '1';
                }
                else
                {
                    $data['discount'] = $offer_data->fixed_amount;
                    $data['variable'] = '0';
                }
         }                  

        }


        // SELECT count(id) as cid FROM offers WHERE FIND_IN_SET(1, `item_id`) > 0

        // $data['offers'] = $offers;
        // array_search($id, $offers);
        // $array_data = array();
        // $array_data_date = array();
        // $new_arrray_data = [];
        // foreach ($offers as $key => $value) 
        // { 
        //     $data['offers'] = $value->item_id;
        //     $data['day_range_offers'] = $value->day_range_offers;
        //     $data['offer_id'] = $value->id;

        // }
        // // array_push($new_arrray_data,$data['offers']);
        // $array_data = explode(',',$data['offers']);
        // $array_data_date = explode(',',$data['day_range_offers']);

        // if(in_array($id,$array_data))
        // {
        //     $offer_id = $data['offer_id'];

        //     $offer_data = DB::table('offers')->find($offer_id);

            
        //         $current_time = date('H:i:s');
        //         $current_date = date('d-m-Y');

        //         if($offer_data->valid_from <= $current_date && $offer_data->valid_to >= $current_date)
        //         {
        //             if($offer_data->offer_type == 'time')
        //             {
        //                 // return $data['discount_val'] = 'time';
        //                 if(strtotime($offer_data->from_time) <= strtotime($current_time) && strtotime($offer_data->to_time) >= strtotime($current_time))
        //                 {
        //                     if($offer_data->variable == 'percentage')
        //                     {
        //                         $data['discount'] = $offer_data->percentage;
        //                         $data['variable'] = '1';
        //                     }
        //                     else
        //                     {
        //                         $data['discount'] = $offer_data->fixed_amount;
        //                         $data['variable'] = '0';
        //                     }
        //                 }
        //             }
        //                 else if($offer_data->offer_type == 'day')
        //                 {
        //                     // return $data['discount_val'] = 'day';
        //                     if(in_array($current_date,$array_data_date))
        //                     {
        //                         return $data['discount_val'] = 'day';
        //                         if($offer_data->variable == 'percentage')
        //                         {
        //                             $data['discount'] = $offer_data->percentage;
        //                             $data['variable'] = '1';
        //                         }
        //                         else
        //                         {
        //                             $data['discount'] = $offer_data->fixed_amount;
        //                             $data['variable'] = '0';
        //                         }
        //                     }
        //                     else
        //                     {
        //                         return $data['discount_val'] = 'no';
        //                     }
        //                 }
        //                 else if($offer_data->offer_type == 'date')
        //                 {
        //                     return $data['discount_val'] = 'date';
        //                     // if($offer_data->valid_from <= $current_date && $offer_data->valid_to >= $current_date)
        //                     // {
        //                     //     if($offer_data->variable == 'percentage')
        //                     //     {
        //                     //         $data['discount'] = $offer_data->percentage;
        //                     //         $data['variable'] = '1';
        //                     //     }
        //                     //     else
        //                     //     {
        //                     //         $data['discount'] = $offer_data->fixed_amount;
        //                     //         $data['variable'] = '0';
        //                     //     }
        //                     // }
        //                     // else
        //                     // {

        //                     // }

        //                 }

        //             }

                

        //         }
            
            // $data['offer_data'] = $offer_data;
        // }
        // else
        // {
        //     $data['new'] = 'no';
        // }
        

        return $data;

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
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('*','items.id as item_id')
                    ->get();

                    $cnt=count($item);
                    foreach ($item as $key => $value) 
                    {
                        $item_id= $value->item_id;
                    }
                   
                   

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

        $item_details = SaleEstimationItem::where('sale_estimation_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.sales_estimation.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = SaleEstimationExpense::where('sale_estimation_no',$id)->get();
        return view('admin.sales_estimation.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = SaleEstimationItem::where('item_id',$id)
                                    ->orderBy('updated_at','DESC')
                                    ->first();

        $amount = $item_data->qty * $item_data->rate_exclusive_tax;
        $gst_rs = $amount * $item_data->gst / 100;
        $total_discount = $item_data->discount + $item_data->overall_disc;
        $net_value = $amount + $gst_rs - $total_discount + $item_data->expenses; 

        $value = $net_value / $item_data->qty;

        return $value;                          
    }

    public function cancel($id)
    {
        $sale_estimation = SaleEstimation::where('sale_estimation_no',$id)->first();

        $sale_estimation->cancel_status = 1;
        $sale_estimation->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {
        $sale_estimation = SaleEstimation::where('sale_estimation_no',$id)->first();

        $sale_estimation->cancel_status = 0;
        $sale_estimation->save();

        return Redirect::back()->with('success', 'Retrieved');
    }

    public function report(Request $request)
    {

        $cond = [];
        if(isset($request->customer_id)){$cond['customer_id'] = $request->customer_id; }
        if(isset($request->salesman_id)) {$cond['salesman_id'] = $request->salesman_id;}
        if(isset($request->agent_id)) {$cond['agent_id'] = $request->agent_id;}

        if(isset($request->from)) {$from = date('Y-m-d',strtotime($request->from)); }           
        if(isset($request->to)) {$to = date('Y-m-d',strtotime($request->to)); }
           // print_r($cond);exit;
        $check_id = "";

        $sale_estimation = SaleEstimation::where($cond)->whereBetween('sale_estimation_date',[$from,$to])->orderBy('sale_estimation_no','ASC')->get();

        if(count($sale_estimation) == 0)
        {
            $taxable_value[] = 0;
            $tax_value[] = 0;
            $total[] = 0;
            $expense_total[] = 0;
            $total_discount[] = 0;
        }
        else
        {

        foreach ($sale_estimation as $key => $datas) 
        {
            $sale_estimation_items = SaleEstimationItem::where('sale_estimation_no',$datas->sale_estimation_no)->get();

            $sale_estimation_expense = SaleEstimationExpense::where('sale_estimation_no',$datas->sale_estimation_no)->get();

            $item_net_value_total = 0;
            $item_gst_rs_total = 0;
            $item_amount_total = 0;
            $discount = 0;

            $total_expense = 0;
            $total_net_price = 0;

            foreach ($sale_estimation_items as $j => $value) 
            {

            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_discount = $value->discount + $value->overall_disc;
            $item_net_value = $item_amount + $item_gst_rs + $value->expenses - $item_discount;

            $item_net_value_total += $item_net_value;
            $item_gst_rs_total += $item_gst_rs;
            $item_amount_total += $item_amount;
            $discount += $item_discount;


            }

            foreach ($sale_estimation_expense as $k => $values) 
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
    $customer = Customer::all();
    $sales_man = SalesMan::all();
    $agent = Agent::all();

        return view('admin.sales_estimation.view',compact('sale_estimation','check_id','tax_value','taxable_value','total','expense_total','total_discount','customer','sales_man','agent','from','to','cond'));
    }   

}
