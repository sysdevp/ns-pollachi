<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceUpdation;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Item;
use App\Models\PurchaseEntry;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntryExpense;
use App\Models\PurchaseEntryTax;
use Illuminate\Support\Facades\Redirect;

class PriceUpdationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updations = PriceUpdation::where('status',1)->get();
        foreach ($updations as $key => $value) 
        {

            $item_data = PurchaseEntryItem::where('item_id',$value->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$value->item_id)
                                    ->where('status',1)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();

            if($item_data == '')
            {
                $unit_price = 0;
                $discount = 0;
                $item_rate = 0;
                $last_purchase_cost[] =0;
                $tax = 0;
            } 
            else
            {
                $unit_price = @$item_data->rate_inclusive_tax;
                $discount = @$item_data->discount / @$item_data->qty;
                $item_rate = $unit_price - $discount;

                $last_purchase_cost[] = $unit_price;
                $tax = @$item_data->gst;
            }                                 

            

            if(@$updated_selling_price->mark_up_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                $total = $item_rate + $percentage_val;
                @$selling_price[] = number_format($total, 2, '.', ',');
            }
            else if(@$updated_selling_price->mark_up_type == 2)
            {
                $total = $item_rate + @$updated_selling_price->mark_up_value;
                @$selling_price[] = number_format($total, 2, '.', ',');
                
            }
            
            if(@$updated_selling_price->mark_down_type == 1)
            {
                $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                $total = $item_rate - $percentage_val;
                @$selling_price[] = number_format($total, 2, '.', ',');
                
            }
            else if(@$updated_selling_price->mark_down_type == 2)
            {
               $total = $item_rate - @$updated_selling_price->mark_down_value;
               @$selling_price[] = number_format($total, 2, '.', ',');
            }
        }

                                    

        return View('admin.price_updation.view',compact('updations','selling_price','last_purchase_cost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $item = Item::all();
        $date = date('Y-m-d');

        return view('admin.price_updation.add',compact('category','brand','item','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $count = $request->table_count;
        $date = date('Y-m-d');

        foreach ($request->item_id as $key => $value) 
        {
            if($request->row_check[$key] == 1)
            {

                $updations = PriceUpdation::where('item_id',$value)->where('status',1)->first();
                if($updations != '')
                {
                    $updations->status = 0;
                    $updations->save();
                }

                $insert = new PriceUpdation();

                $insert->date = $date;
                $insert->effective_from = $request->effective_from;
                $insert->item_id = $request->item_id[$key];
                $insert->mark_up_value = $request->mark_up_rs[$key];
                $insert->mark_down_value = $request->mark_down_rs[$key];
                $insert->mark_up_type = $request->mark_up_percent[$key];
                $insert->mark_down_type = $request->mark_down_percent[$key];

                $insert->save();

            }
            else
            {

            }
             

        }

        return Redirect::back()->with('success','Saved Successfully');
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
        $updations = PriceUpdation::find($id);

        $item_data = PurchaseEntryItem::where('item_id',$updations->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$updations->item_id)
                                    ->where('status',1)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();

            if($item_data == '')
            {
                $unit_price = 0;
                $discount = 0;
                $item_rate = 0;

                $tax =0;
            }   
            else
            {
                $unit_price = @$item_data->rate_inclusive_tax;
                $discount = @$item_data->discount / @$item_data->qty;
                $item_rate = $unit_price - $discount;

                $tax = @$item_data->gst;
            }                                 

            

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


        return view('admin.price_updation.show',compact('updations','selling_price','item_rate'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updations = PriceUpdation::find($id);
        $category = Category::all();
        $brand = Brand::all();
        $item = Item::all();


        if($updations->item->brand_id != 0)
        {
            $brand_name = $updations->item->brand->name;
        }
        else
        {
           $brand_name = 'Not Applicable';
        } 


        $item_data = PurchaseEntryItem::where('item_id',$updations->item_id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

        $updated_selling_price = PriceUpdation::where('item_id',$updations->item_id)
                                ->where('status',1)
                                ->orderBy('updated_at','DESC')
                                ->latest()
                                ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                ->first();

        $last_selling_price = PriceUpdation::where('item_id',$updations->item_id)
                                    ->where('updated_at',0)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();


        if($item_data == '')
        {
            $unit_price = 0;
            $discount = 0;
            $item_rate = 0;

            $tax =0;
        }     
        else
        {
            $unit_price = @$item_data->rate_inclusive_tax;
            $discount = @$item_data->discount / @$item_data->qty;
            $item_rate = $unit_price - $discount;
            
            $tax = @$item_data->gst;
        }                               

        if(@$updated_selling_price->mark_up_type == '')
        {
            $up_type = '';
        }
        else if(@$updated_selling_price->mark_up_type == 1)
        {
            $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
            $total = $item_rate + $percentage_val;
            @$selling_price = number_format($total, 2, '.', ',');
            $up_type = 'Percentage';
        }
        else if(@$updated_selling_price->mark_up_type == 2)
        {
            $total = $item_rate + @$updated_selling_price->mark_up_value;
            @$selling_price = number_format($total, 2, '.', ',');
            $up_type = 'Rupee';
        }
        if(@$updated_selling_price->mark_down_type == '')
        {
            $down_type = '';
        }
        else if(@$updated_selling_price->mark_down_type == 1)
        {
            $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
            $total = $item_rate - $percentage_val;
            @$selling_price = number_format($total, 2, '.', ',');
            $down_type = 'Percentage';
        }
        else if(@$updated_selling_price->mark_down_type == 2)
        {
           $total = $item_rate - @$updated_selling_price->mark_down_value;
           @$selling_price = number_format($total, 2, '.', ',');
           $down_type = 'Rupee';
        }

        return view('admin.price_updation.edit',compact('updations','category','brand','item','up_type','down_type','updated_selling_price','selling_price','last_selling_price','brand_name','item_rate','tax'));
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
        if($request->row_check == 1)
        {
            $update = PriceUpdation::find($id);

            $update->effective_from = $request->effective_from;
            $update->item_id = $request->item_id;
            $update->mark_up_value = $request->mark_up_rs;
            $update->mark_down_value = $request->mark_down_rs;
            $update->mark_up_type = $request->mark_up_percent;
            $update->mark_down_type = $request->mark_down_percent;

            $update->save();

            return Redirect::back()->with('success', 'Updated Successfully');
        }
        else
        {
            return Redirect::back()->with('success', 'You Are Not Allowed To Update!');
        }

        
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
        $delete = PriceUpdation::find($id);

        $delete->status = '0';
        $delete->save();

        return Redirect::back()->with('success', 'Deleted Successfully');

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

        $table_count = count($item);
       
        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }

            $item_data = PurchaseEntryItem::where('item_id',$value->id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',1)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();
                                    
            $last_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',0)
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
                @$selling_price = 0;
            }

            else
            {
                if(@$updated_selling_price->mark_up_type == '')
                {
                    $up_type = '';
                }
                else if(@$updated_selling_price->mark_up_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                    $total = $item_rate + $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_up_type == 2)
                {
                    $total = $item_rate + @$updated_selling_price->mark_up_value;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Rupee';
                }
                if(@$updated_selling_price->mark_down_type == '')
                {
                    $down_type = '';
                }
                else if(@$updated_selling_price->mark_down_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                    $total = $item_rate - $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $down_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_down_type == 2)
                {
                   $total = $item_rate - @$updated_selling_price->mark_down_value;
                   @$selling_price = number_format($total, 2, '.', ',');
                   $down_type = 'Rupee';
                }
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
            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" class="actual_last_purchase_cost'.$key.'" value="'.$item_rate.'" name="last_purchase_cost[]"><input type="hidden" class="append_last_purchase_cost'.$key.'" value="'.$item_rate.'"><font class="last_purchase_cost'.$key.'">'.$item_rate.'</font></td><td><input type="hidden" class="tax'.$key.'" value="'.$tax.'" name="tax[]"><font class="tax'.$key.'">'.$tax.'</font></td><td><input type="hidden" class=" form-control actual_mark_up_percent'.$key.'" value="'.@$updated_selling_price->mark_up_type.'"><input type="hidden" class=" form-control append_mark_up_percent'.$key.'" name="mark_up_percent[]" value="'.@$updated_selling_price->mark_up_type.'"><font class="mark_up_percent'.$key.'" style="font-family: Times new roman;">'.@$up_type.'</font></td><td><input type="hidden" class="form-control actual_mark_up_rs'.$key.'" value="'.@$updated_selling_price->mark_up_value.'"><input type="hidden" class="form-control append_mark_up_rs'.$key.'" name="mark_up_rs[]" value="'.@$updated_selling_price->mark_up_value.'"><font class="mark_up_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_up_value.'</font></td><td><input type="hidden" class="form-control actual_mark_down_percent'.$key.'" value="'.@$updated_selling_price->mark_down_type.'"><input type="hidden" class="form-control append_mark_down_percent'.$key.'" name="mark_down_percent[]" value="'.@$updated_selling_price->mark_down_type.'"><font class="mark_down_percent'.$key.'" style="font-family: Times new roman;">'.@$down_type.'</font></td><td><input type="hidden" class="form-control actual_mark_down_rs'.$key.'" value="'.@$updated_selling_price->mark_down_value.'"><input type="hidden" class="form-control append_mark_down_rs'.$key.'" name="mark_down_rs[]" value="'.@$updated_selling_price->mark_down_value.'"><font class="mark_down_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_down_value.'</font></td><td><input type="hidden" value="'.@$selling_price.'" class="actual_updated_selling_price'.$key.'"><input type="hidden" value="'.@$selling_price.'" class="append_updated_selling_price'.$key.'" name="updated_selling_price[]"><font style="font-family: Times new roman;" class="updated_selling_price'.$key.'">'.@$selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-danger text-white rounded up" id="'.$key.'" aria-hidden="true"></i>&nbsp;<i class="fa fa-level-down px-2 py-1 bg-warning  text-white rounded down" id="'.$key.'" aria-hidden="true"></i></td></tr>';

            }
            // return $last_selling_price;
         return $result;
        

    }

    public function brand_filter(Request $request,$id)
    {
        
        $brand=$request->brand;
        $categories=$request->categories;
        $category_id=$this->get_category_id($categories);
        $result="";
        $item=array();
        if($brand !="" && $categories == "no_val"){
             $item=Item::where('brand_id',$brand)->get();
        }else if($categories !="" && $brand != "" && $categories != "no_val" ){
            $item=Item::whereIn('category_id',$category_id)->where('brand_id',$brand)->get();
        }

        $table_count = count($item);

        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }

            $item_data = PurchaseEntryItem::where('item_id',$value->id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',1)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();
                                    
            $last_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',0)
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
                @$selling_price = '';
            }

            else
            {
                if(@$updated_selling_price->mark_up_type == '')
                {
                    $up_type = '';
                }
                else if(@$updated_selling_price->mark_up_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                    $total = $item_rate + $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_up_type == 2)
                {
                    $total = $item_rate + @$updated_selling_price->mark_up_value;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Rupee';
                }
                if(@$updated_selling_price->mark_down_type == '')
                {
                    $down_type = '';
                }
                else if(@$updated_selling_price->mark_down_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                    $total = $item_rate - $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $down_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_down_type == 2)
                {
                   $total = $item_rate - @$updated_selling_price->mark_down_value;
                   @$selling_price = number_format($total, 2, '.', ',');
                   $down_type = 'Rupee';
                }
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

            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" class="actual_last_purchase_cost'.$key.'" value="'.$item_rate.'" name="last_purchase_cost[]"><input type="hidden" class="append_last_purchase_cost'.$key.'" value="'.$item_rate.'"><font class="last_purchase_cost'.$key.'">'.$item_rate.'</font></td><td><input type="hidden" class="tax'.$key.'" value="'.$tax.'" name="tax[]"><font class="tax'.$key.'">'.$tax.'</font></td><td><input type="hidden" class=" form-control actual_mark_up_percent'.$key.'" value="'.@$updated_selling_price->mark_up_type.'"><input type="hidden" class=" form-control append_mark_up_percent'.$key.'" name="mark_up_percent[]" value="'.@$updated_selling_price->mark_up_type.'"><font class="mark_up_percent'.$key.'" style="font-family: Times new roman;">'.@$up_type.'</font></td><td><input type="hidden" class="form-control actual_mark_up_rs'.$key.'" value="'.@$updated_selling_price->mark_up_value.'"><input type="hidden" class="form-control append_mark_up_rs'.$key.'" name="mark_up_rs[]" value="'.@$updated_selling_price->mark_up_value.'"><font class="mark_up_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_up_value.'</font></td><td><input type="hidden" class="form-control actual_mark_down_percent'.$key.'" value="'.@$updated_selling_price->mark_down_type.'"><input type="hidden" class="form-control append_mark_down_percent'.$key.'" name="mark_down_percent[]" value="'.@$updated_selling_price->mark_down_type.'"><font class="mark_down_percent'.$key.'" style="font-family: Times new roman;">'.@$down_type.'</font></td><td><input type="hidden" class="form-control actual_mark_down_rs'.$key.'" value="'.@$updated_selling_price->mark_down_value.'"><input type="hidden" class="form-control append_mark_down_rs'.$key.'" name="mark_down_rs[]" value="'.@$updated_selling_price->mark_down_value.'"><font class="mark_down_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_down_value.'</font></td><td><input type="hidden" value="'.@$selling_price.'" class="actual_updated_selling_price'.$key.'"><input type="hidden" value="'.@$selling_price.'" class="append_updated_selling_price'.$key.'" name="updated_selling_price[]"><font style="font-family: Times new roman;" class="updated_selling_price'.$key.'">'.@$selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-danger text-white rounded up" id="'.$key.'" aria-hidden="true"></i>&nbsp;<i class="fa fa-level-down px-2 py-1 bg-warning  text-white rounded down" id="'.$key.'" aria-hidden="true"></i></td></tr>';

            }
         return $result;
          

    }


    public function browse_item(Request $request,$id)
   {
    $browse_item = $request->browse_item;
    $brand=$request->brand;
    $categories=$request->categories;
    $category_id=$this->get_category_id($categories);
    $item = array();
    $result ="";

    if($brand == "no_val" && $categories == "no_val" && $browse_item != ""){
             $item=Item::where('id',$browse_item)->get();
        }
        else if($categories !="" && $brand != "" && $categories != "no_val" && $brand != "no_val" && $browse_item != ""){
            $item=Item::whereIn('category_id',$category_id)->where('brand_id',$brand)->where('id',$browse_item)->get();
        }
        else if($categories !="" && $categories != "no_val" && $browse_item != "" && $brand == "no_val"){
            $item=Item::whereIn('category_id',$category_id)->where('id',$browse_item)->get();
        }
        else if($brand !="" && $brand != "no_val" && $browse_item != ""){
            $item=Item::where('id',$browse_item)->where('brand_id',$brand)->get();
        }

        $table_count = count($item);
    
    foreach ($item as $key => $value) 
    {
        if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }

            $item_data = PurchaseEntryItem::where('item_id',$value->id)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->first();

            $updated_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',1)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();
                                    
            $last_selling_price = PriceUpdation::where('item_id',$value->id)
                                    ->where('status',0)
                                    ->orderBy('updated_at','DESC')
                                    ->latest()
                                    ->select('mark_up_value','mark_up_type','mark_down_type','mark_down_value')
                                    ->first();                        

                                     
            $unit_price = @$item_data->rate_inclusive_tax;
            $discount = @$item_data->discount / @$item_data->qty;
            $item_rate = $unit_price - $discount;
            
            $tax = @$item_data->gst;

            if(@$updated_selling_price == '')
            {
                @$selling_price = '';
            }

            else
            {
                if(@$updated_selling_price->mark_up_type == '')
                {
                    $up_type = '';
                }
                else if(@$updated_selling_price->mark_up_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_up_value / 100;
                    $total = $item_rate + $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_up_type == 2)
                {
                    $total = $item_rate + @$updated_selling_price->mark_up_value;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $up_type = 'Rupee';
                }
                if(@$updated_selling_price->mark_down_type == '')
                {
                    $down_type = '';
                }
                else if(@$updated_selling_price->mark_down_type == 1)
                {
                    $percentage_val = $item_rate * @$updated_selling_price->mark_down_value / 100;
                    $total = $item_rate - $percentage_val;
                    @$selling_price = number_format($total, 2, '.', ',');
                    $down_type = 'Percentage';
                }
                else if(@$updated_selling_price->mark_down_type == 2)
                {
                   $total = $item_rate - @$updated_selling_price->mark_down_value;
                   @$selling_price = number_format($total, 2, '.', ',');
                   $down_type = 'Rupee';
                }
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
            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" class="actual_last_purchase_cost'.$key.'" value="'.$item_rate.'" name="last_purchase_cost[]"><input type="hidden" class="append_last_purchase_cost'.$key.'" value="'.$item_rate.'"><font class="last_purchase_cost'.$key.'">'.$item_rate.'</font></td><td><input type="hidden" class="tax'.$key.'" value="'.$tax.'" name="tax[]"><font class="tax'.$key.'">'.$tax.'</font></td><td><input type="hidden" class=" form-control actual_mark_up_percent'.$key.'" value="'.@$updated_selling_price->mark_up_type.'"><input type="hidden" class=" form-control append_mark_up_percent'.$key.'" name="mark_up_percent[]" value="'.@$updated_selling_price->mark_up_type.'"><font class="mark_up_percent'.$key.'" style="font-family: Times new roman;">'.@$up_type.'</font></td><td><input type="hidden" class="form-control actual_mark_up_rs'.$key.'" value="'.@$updated_selling_price->mark_up_value.'"><input type="hidden" class="form-control append_mark_up_rs'.$key.'" name="mark_up_rs[]" value="'.@$updated_selling_price->mark_up_value.'"><font class="mark_up_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_up_value.'</font></td><td><input type="hidden" class="form-control actual_mark_down_percent'.$key.'" value="'.@$updated_selling_price->mark_down_type.'"><input type="hidden" class="form-control append_mark_down_percent'.$key.'" name="mark_down_percent[]" value="'.@$updated_selling_price->mark_down_type.'"><font class="mark_down_percent'.$key.'" style="font-family: Times new roman;">'.@$down_type.'</font></td><td><input type="hidden" class="form-control actual_mark_down_rs'.$key.'" value="'.@$updated_selling_price->mark_down_value.'"><input type="hidden" class="form-control append_mark_down_rs'.$key.'" name="mark_down_rs[]" value="'.@$updated_selling_price->mark_down_value.'"><font class="mark_down_rs'.$key.'" style="font-family: Times new roman;">'.@$updated_selling_price->mark_down_value.'</font></td><td><input type="hidden" value="'.@$selling_price.'" class="actual_updated_selling_price'.$key.'"><input type="hidden" value="'.@$selling_price.'" class="append_updated_selling_price'.$key.'" name="updated_selling_price[]"><font style="font-family: Times new roman;" class="updated_selling_price'.$key.'">'.@$selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-danger text-white rounded up" id="'.$key.'" aria-hidden="true"></i>&nbsp;<i class="fa fa-level-down px-2 py-1 bg-warning  text-white rounded down" id="'.$key.'" aria-hidden="true"></i></td></tr>';
        
    }
    return $result;
   }


}
