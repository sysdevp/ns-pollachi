<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceUpdation;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Item;

class PriceUpdationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updations = PriceUpdation::all();
        return View('admin.price_updation.view',compact('updations'));
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

        return view('admin.price_updation.add',compact('category','brand','item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
             $result .='<tr class="row_category" id="'.++$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'"><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->default_selling_price.'" class="actual_item_selling_price'.$key.'"><input type="hidden" value="'.$value->default_selling_price.'" class="append_item_selling_price'.$key.'"><font style="font-family: Times new roman;" class="item_selling_price'.$key.'">'.$value->default_selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-info  text-white rounded show_items" id="'.$key.'" aria-hidden="true"></i><i class="fa fa-level-down px-2 py-1 bg-success  text-white rounded edit_items" id="'.$key.'" aria-hidden="true"></i></td></tr>';

            }
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
             $result .='<tr class="row_category" id="'.++$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->default_selling_price.'" class="append_item_selling_price'.$key.'"><font style="font-family: Times new roman;" class="item_selling_price'.$key.'">'.$value->default_selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-info  text-white rounded show_items" id="'.$key.'" aria-hidden="true"></i><i class="fa fa-level-down px-2 py-1 bg-success  text-white rounded edit_items" id="'.$key.'" aria-hidden="true"></i></td></tr>';

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
        $result .='<tr class="row_category" id="'.++$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_mrp'.$key.'"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->default_selling_price.'" class="append_item_selling_price'.$key.'"><font style="font-family: Times new roman;" class="item_selling_price'.$key.'">'.$value->default_selling_price.'</font></td><td><i class="fa fa-level-up px-2 py-1 bg-info  text-white rounded show_items" id="'.$key.'" aria-hidden="true"></i><i class="fa fa-level-down px-2 py-1 bg-success  text-white rounded edit_items" id="'.$key.'" aria-hidden="true"></i></td></tr>';
        
    }
    return $result;
   }


}
