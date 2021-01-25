<?php

namespace App\Http\Controllers;
use DB;
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
use App\Models\SaleEstimation;
use App\Models\SaleEstimationTax;
use App\Models\SaleEstimationItem;
use App\Models\SaleEstimationExpense;
use App\Models\Customer;
use App\Models\SalesMan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Models\PriceUpdation;
use App\Models\SellingPriceSetup;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntryBlackItem;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderBlackItem;
use App\Models\Pos;
use App\Models\PosPayment;
use App\Models\PosTax;
use App\Models\PosItem;

use App\Models\HoldPos;
use App\Models\HoldPosPayment;
use App\Models\HoldPosTax;
use App\Models\HoldPosItem;

use App\Models\PriceLevel;
use App\Models\ItemwiseOffer;

use App\Models\PosBlackItem;
use App\Models\PosExpense;
// use APP\Models\Giftvoucher;
class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = SaleEstimation::where('cancel_status',0)->get();
        $customer = Customer::all();
        $tax = Tax::all();
        $sales_man = SalesMan::all();
        $account_head = AccountHead::all();
        $location = Location::all();
        

        $voucher_num=Pos::orderBy('id','DESC')
                           ->select('id')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->id;
             $voucher_no=$current_voucher_num+1;
        
         
         }


        return view('admin.pos.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','estimation','customer','tax','sales_man','account_head','location'));
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

        //echo $request->hold_trans_id; exit();
        $tax = Tax::all();



        if($request->hold_trans_id=="1")
         {
            $so_no=HoldPos::orderBy('id','DESC')
            ->select('id')
            ->first();
         }
         else
         {
            $so_no=Pos::orderBy('id','DESC')
            ->select('id')
            ->first();
         }

         if ($so_no == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$so_no->id;
             $voucher_no=$current_voucher_num+1;
        
         }
         $voucher_date = $request->voucher_date;
         $estimation_date = $request->estimation_date;

         if($request->customer_id == '' && $request->customer_name != '')
         {
            $customer = new Customer();
            $customer->name = $request->customer_name;
            $customer->phone_no = $request->phone_no;

            $customer->save();
            $customer_id = $customer->id;
         }
         else if($request->customer_name == '' && $request->customer_id != '')
         {
            $customer_id = $request->customer_id;
         }
         else 
         {
            $customer_id = null;
         }
         


         if($request->hold_trans_id=="1")
         {
            $pos_payment = new HoldPosPayment();

         }
         else
         {

            $pos_payment = new PosPayment();
        }
    
         $pos_payment->cash = $request->cash_amount;
         $pos_payment->cash_remark = $request->cash_remark;
         $pos_payment->card = $request->card_amount;
         $pos_payment->card_remark = $request->card_remark;
         $pos_payment->cheque = $request->cheque_amount;
         $pos_payment->cheque_remark = $request->cheque_remark;
         $pos_payment->cheque_date = $request->cheque_date;
         $pos_payment->voucher = $voucher_no;
         $pos_payment->voucher_remark = $request->voucher_remark;

         $pos_payment->save();
         

         if($request->hold_trans_id=="1")
         {
            $saleorder = new HoldPos();

         }
        else
        {
            $saleorder = new Pos();

        }



         $saleorder->so_no = $voucher_no;
         $saleorder->so_date = $voucher_date;
        //  $saleorder->estimation_no = $request->estimation_no;
        //  $saleorder->estimation_date = $request->estimation_date;
         $saleorder->customer_id = $customer_id;
         $saleorder->no_item = $request->no_item;
         $saleorder->no_qty = $request->no_qty;
        //  $saleorder->salesman_id = $request->salesmen_id;
        //  $saleorder->sale_type = $request->sale_type;
         $saleorder->overall_discount = $request->overall_discount;
         $saleorder->total_net_value = $request->total_price;
         $saleorder->round_off = $request->round_off;
        //  $saleorder->location = $request->location;

         $saleorder->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {

            if($request->hold_trans_id=="1")
            {
                $saleorder_items = new HoldPosItem();

            }
            else
            {
                $saleorder_items = new PosItem();

            }

                $saleorder_items->so_no = $voucher_no;
                $saleorder_items->so_date = $voucher_date;
                // $saleorder_items->estimation_no = $request->estimation_no;
                // $saleorder_items->estimation_date = $request->estimation_date;
              //  $saleorder_items->item_sno = $request->invoice_sno[$i];
                $saleorder_items->item_id = $request->item_code[$i];
                $saleorder_items->mrp = $request->mrp[$i];
                $saleorder_items->gst = $request->tax_rate[$i];
                $saleorder_items->rate_exclusive_tax = $request->exclusive[$i];
                $saleorder_items->rate_inclusive_tax = $request->inclusive[$i];
                $saleorder_items->qty = $request->quantity[$i];
                $saleorder_items->uom_id = $request->uom[$i];
                $saleorder_items->discount = $request->discount[$i];
                $saleorder_items->overall_disc = $request->overall_disc[$i];
                $saleorder_items->expenses = $request->expenses[$i];

                $saleorder_items->amount = $request->amount[$i];
                $saleorder_items->tax = $request->gst[$i];
                $saleorder_items->tot_amt = $request->net_price[$i];
                $saleorder_items->free = $request->itemwiseoffer[$i];
                // $saleorder_items->b_or_w = $request->black_or_white[$i];

                $saleorder_items->save();

            
        
        }
         


        foreach ($tax as $key => $value) 
            {
            $str_json = json_encode($value->name); //array to json string conversion
            $tax_name = str_replace('"', '', $str_json);
            $value_name = $tax_name.'_id';
                
            if($request->hold_trans_id=="1")
               {
                $tax_details = new HoldPosTax;

               } 
               else
               {
                $tax_details = new PosTax;

               }

               $tax_details->so_no = $voucher_no;
               $tax_details->so_date = $voucher_date;
               $tax_details->taxmaster_id = $request->$value_name;
               $tax_details->value = $request->$tax_name;

               $tax_details->save();

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

    public function get_pos_hold_data(Request $request)
    {

     $result = "";   

      $hold_data = HoldPos::all();  
     foreach($hold_data as $key => $value)
     {
        $result.='<tr class="row_category"><td><center><input type="radio" name="select" onclick="append_pos_holded_data('.$value->so_no.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->so_no.'" class="append_so_no'.$key.'"><font style="font-family: Times new roman;">'.$value->so_no.'</font></td><td><input type="hidden" value="'.$value->so_date.'" class="append_so_date'.$key.'"><font style="font-family: Times new roman;">'.$value->so_date.'</font></td><td><input type="hidden" value="'.$value->customer_id.'" class="append_customer'.$key.'"><font style="font-family: Times new roman;">'.$value->customer_id.'</font></td><td><input type="hidden" value="'.$value->total_net_value.'" class="append_total_net_value'.$key.'"><font style="font-family: Times new roman;">'.$value->total_net_value.'</font></td></tr>';

     }

       return $result;
    }
    

    public function get_pos_load_data(Request $request)
    {
        // return $request->so_no;
     $result = ""; 
     $table_tbody="";  

      $hold_data = HoldPosItem::where('so_no',$request->so_no)
                            ->get(); 
                            // return $hold_data;

                            
    foreach($hold_data as $i => $value)
    {
    
        $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> '.$i.' </span></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'.$i.'" value="'.$value->item_id.'" name="item_code[]"><input type="hidden" value="'.$value->item_id.'" name="item_name1[]"><font class="items'.$i.'">'.$value->item->code.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item->name.'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item->name.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item->hsn.'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item->hsn.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value->mrp.'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value->mrp.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value->rate_exclusive_tax.'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value->rate_exclusive_tax.'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value->rate_inclusive_tax.'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value->qty.'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value->qty.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value->uom_id.'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom->name.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$value->amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$value->amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value->discount.'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value->discount.'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value->discount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'.$i.'" value="'.$value->overall_disc.'" name="overall_disc[]"><font class="font_overall_disc'.$i.'">'.$value->overall_disc.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '.$i.'" id="expenses'.$i.'" value="'.$value->expenses.'" name="expenses[]"><font class="font_expenses'.$i.'">'.$value->expenses.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$value->tax.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value->gst.'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$value->tax.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$value->tot_amt.'" name="net_price[]"><input type="hidden" class="black_or_white'.$i.'"  value="'.$value->b_or_w.'" name="black_or_white[]"><font class="font_net_price'.$i.'">'.$value->tot_amt.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'"></font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

    }   

       return $table_tbody;
    }
    
    public function address_details(Request $request)
    {
       $supplier_id = $request->supplier_id;

       $getdata = AddressDetails::
       join('suppliers','suppliers.id','=','address_details.address_ref_id')
       ->where('address_details.address_table','=','Supplier')
       ->where('address_details.address_ref_id','=',$supplier_id)
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
         $address.="GST Number :".$getdata->gst_no;



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
              $tax_val[] = @$value->value;
              $tax_master[] = @$value->tax_master_id;
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
              $tax_val[] = @$value->value;
              $tax_master[] = @$value->tax_master_id;
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
              $tax_val[] = @$value->value;
              $tax_master[] = @$value->tax_master_id;
            }      

            $cnt = count(@$tax_master);               

            /* end dynamic tax value */                    

            $sum = @$tax_value + $items->category->gst_no;                            
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
              $tax_val[] = @$value->value;
              $tax_master[] = @$value->tax_master_id;
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
                $datas['selling_price'] = @$items->default_selling_price;
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
            $datas['selling_price'] = @$items->default_selling_price;
        }

        $datas['selling_price_type'] = $selling_price_setup->setup;

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

        $item_details = Estimation_Item::where('estimation_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.estimation.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = Estimation_Expense::where('estimation_no',$id)->get();
        return view('admin.estimation.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = Estimation_Item::where('item_id',$id)
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
        $estimation = Estimation::where('estimation_no',$id)->first();

        $estimation->status = 1;
        $estimation->save();

        return Redirect::back()->with('success', 'Cancelled');
    }

    public function retrieve($id)
    {
        $estimation = Estimation::where('estimation_no',$id)->first();

        $estimation->status = 0;
        $estimation->save();

        return Redirect::back()->with('success', 'Retrieved');
    }
    public function check_voucher_code(Request $request)
    {
        // return $request->id;
        //expiry date active status validfrom valid to
        $gift_voucher = DB::table('giftvouchers')->where('code',$request->id)
        ->where('active_status',1)
        ->whereDate('valid_from', '<=', Carbon::now())
        ->whereDate('valid_to', '>=', Carbon::now())
        ->first();
        if($gift_voucher!="")
        {
        return $gift_voucher->value;
        }
        else
        {
            return "";            
        }
    }

}
