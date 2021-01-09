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
use App\Models\Customer;
use App\Models\SaleGatepassEntry;
use App\Models\SaleOrder;
use App\Models\SaleOrderItem;
use App\Models\SaleOrderExpense;
use Illuminate\Support\Facades\Redirect;

class SalesGatepassEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $check_id = $id;
        $sales_gatepass = SaleGatepassEntry::all();
        // echo "<pre>"; print_r($sales_gatepass);exit;
        $customer = Customer::all();

        return view('admin.sales_gatepass.view',compact('sales_gatepass','check_id','customer'));
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
        $saleorder = SaleOrder::all();
        $estimation = Estimation::all();

        $sales_gatepass_num=SaleGatepassEntry::orderBy('sales_gatepass_no','DESC')
                           ->select('sales_gatepass_no')
                           ->first();

         if ($sales_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sales_gatepass_num->sales_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }

        return view('admin.sales_gatepass.add',compact('date','customer','categories','supplier','item','agent','brand','expense_type','saleorder','estimation','voucher_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sales_gatepass_num=SaleGatepassEntry::orderBy('sales_gatepass_no','DESC')
                           ->select('sales_gatepass_no')
                           ->first();

         if ($sales_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sales_gatepass_num->sales_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }
        $sales_gatepass = new SaleGatepassEntry();

         $sales_gatepass->sales_gatepass_no = $voucher_no;
         $sales_gatepass->sales_gatepass_date = $request->voucher_date;
         $sales_gatepass->customer_id = $request->customer_id;
         $sales_gatepass->so_no = $request->so_no;
         $sales_gatepass->so_date = $request->so_date;
         $sales_gatepass->estimation_no = $request->estimation_no;
         $sales_gatepass->estimation_date = $request->estimation_date;
         $sales_gatepass->load_live = $request->load_live;
         $sales_gatepass->unload_live = $request->unload_live;
         $sales_gatepass->load_bill = $request->load_bill;
         $sales_gatepass->unload_bill = $request->unload_bill;

         $sales_gatepass->save();

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

        $sales_gatepass = SaleGatepassEntry::where('sales_gatepass_no',$id)->first();

        if(isset($sales_gatepass->customer->name) && !empty($sales_gatepass->customer->name))
        {
            $customer_id = $sales_gatepass->customer->id;

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
        return view('admin.sales_gatepass.show',compact('sales_gatepass','address'));
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
        $customer = Customer::all();
        $saleorder = SaleOrder::all();
        $estimation = Estimation::all();

        $sales_gatepass = SaleGatepassEntry::where('sales_gatepass_no',$id)->first();

        $so_no = $sales_gatepass->so_no;

        $saleorders = SaleOrder::where('so_no',$so_no)->first();
        $saleorder_item = SaleOrderItem::where('so_no',$so_no)->get();

         
         $date_so = $saleorders->so_date;
         $sales_type =$saleorders->sale_type;


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        foreach($saleorder_item as $key => $value)  
        {
            
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            $item_data = SaleOrderItem::where('item_id',$value->item_id)
                                    ->orderBy('so_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;


            

            $item_amounts[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }

        return view('admin.sales_gatepass.edit',compact('date','customer','categories','supplier','item','agent','brand','expense_type','saleorder','estimation','sales_gatepass','item_amount_sum','item_net_value_sum','item_gst_rs_sum','date_so','sales_type'));
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
        $sales_gatepass_data = SaleGatepassEntry::where('sales_gatepass_no',$id);
        $sales_gatepass_data->delete();

        $sales_gatepass = new SaleGatepassEntry();

         $sales_gatepass->sales_gatepass_no = $request->voucher_no;
         $sales_gatepass->sales_gatepass_date = $request->voucher_date;
         $sales_gatepass->customer_id = $request->customer_id;
         $sales_gatepass->so_no = $request->so_no;
         $sales_gatepass->so_date = $request->so_date;
         $sales_gatepass->estimation_no = $request->estimation_no;
         $sales_gatepass->estimation_date = $request->estimation_date;
         $sales_gatepass->load_live = $request->load_live;
         $sales_gatepass->unload_live = $request->unload_live;
         $sales_gatepass->load_bill = $request->load_bill;
         $sales_gatepass->unload_bill = $request->unload_bill;

         $sales_gatepass->save();

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
        $sales_gatepass_data = SaleGatepassEntry::where('sales_gatepass_no',$id);
        $sales_gatepass_data->delete();
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
    public function so_details(Request $request)
    {

        $so_no = $request->so_no;

        // return $so_no;

        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $customer = Customer::all();
        $estimation = Estimation::all();

        $sale_gatepass_num=SaleGatepassEntry::orderBy('sales_gatepass_no','DESC')
                           ->select('sales_gatepass_no')
                           ->first();

         if ($sale_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sale_gatepass_num->sales_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }

        $saleorder = SaleOrder::where('so_no',$so_no)->first();
        $saleorder_item = SaleOrderItem::where('so_no',$so_no)->get();

         
         $date_so = $saleorder->so_date;
         $sales_type =$saleorder->sale_type;


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        
        foreach($saleorder_item as $key => $value)  
        {
            
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            $item_data = SaleOrderItem::where('item_id',$value->item_id)
                                    ->orderBy('so_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;


            

            $item_amounts[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        
        $result_array=array('item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'date_so'=>$date_so,'sales_type'=>$sales_type);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }

    public function report(Request $request)
    {

        $cond = [];
        if(isset($request->customer_id)){$cond['customer_id'] = $request->customer_id; }
        if(isset($request->from)) {$from = date('Y-m-d',strtotime($request->from)); }           
        if(isset($request->to)) {$to = date('Y-m-d',strtotime($request->to)); }
        $check_id = "";

        $sales_gatepass = SaleGatepassEntry::where($cond)->whereBetween('date',[$from,$to])->get();


        $customer = Customer::all();

        return view('admin.sales_gatepass.view',compact('sales_gatepass','check_id','customer','from','to','cond'));
    }
    
}
