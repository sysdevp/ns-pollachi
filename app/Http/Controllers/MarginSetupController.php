<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MarginSetup;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Support\Facades\Redirect;


class MarginSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updations = MarginSetup::where('status',1)->groupBy('supplier_id')->select('supplier_id')->get();
        // echo "<pre>"; print_r($updations); exit();
        @$supplier_id = @$updations[0]->supplier_id;
        return View('admin.margin_setup.view',compact('updations','supplier_id'));
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
        $supplier = Supplier::all();
        $date = date('Y-m-d');

        return view('admin.margin_setup.add',compact('category','brand','item','date','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m-d');

        foreach ($request->item_id as $key => $value) 
        {
                $updations = MarginSetup::where('item_id',$value)->where('supplier_id',$request->supplier_id)->where('status',1)->first();
                if($updations != '')
                {
                    $updations->status = 0;
                    $updations->save();
                }

                $insert_margin = new MarginSetup();

                $insert_margin->date = $date;
                $insert_margin->supplier_id = $request->supplier_id;
                $insert_margin->item_id = $request->item_id[$key];
                $buying_price = ($request->margin_percentage[$key] == '')? $buying_price = $request->mrp[$key]: $buying_price = $request->updated_buying_price[$key];
                $insert_margin->margin_percentage = $request->margin_percentage[$key];
                $insert_margin->buying_price = $buying_price;

                $insert_margin->save();
             

        }

        return Redirect::back()->with('success','Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $updations = MarginSetup::where('supplier_id',$id)->where('status',1)->get();
       $supplier = $updations[0]->supplier->name;

        return view('admin.margin_setup.show',compact('updations','supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updations = MarginSetup::where('supplier_id',$id)->where('status',1)->get();
        $category = Category::all();
        $brand = Brand::all();
        $item = Item::all();

        $supplier = $updations[0]->supplier->name;
        $supplier_id = $updations[0]->supplier_id;


        

        return view('admin.margin_setup.edit',compact('updations','category','brand','item','supplier','supplier_id'));
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
        $date = date('Y-m-d');

        foreach ($request->item_id as $key => $value) 
        {
                $updations = MarginSetup::where('item_id',$value)->where('supplier_id',$id)->where('status',1)->first();
                if($updations != '')
                {
                    $updations->status = 0;
                    $updations->save();
                }

                $insert_margin = new MarginSetup();

                $insert_margin->date = $date;
                $insert_margin->supplier_id = $id;
                $insert_margin->item_id = $request->item_id[$key];
                $buying_price = ($request->margin_percentage[$key] == '')? $buying_price = $request->mrp[$key]: $buying_price = $request->updated_buying_price[$key];
                $insert_margin->margin_percentage = $request->margin_percentage[$key];
                $insert_margin->buying_price = $request->updated_buying_price[$key];

                $insert_margin->save();
             

        }

        return Redirect::back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $margin_setup = MarginSetup::where('supplier_id',$id)->where('status',1)->update(['status' => 0]);

        // $margin_setup->delete();
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

            
            $buying_price = MarginSetup::where('item_id',$value->id)->where('status',1)->first();

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
            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="number" name="margin_percentage[]" value="" class="form-control margin_percentage" placeholder="Margin Percentage" id="'.$key.'"></td><td><input type="hidden" value="" name="updated_buying_price[]" class="actual_updated_buying_price'.$key.'"><font style="font-family: Times new roman;" class="updated_buying_price'.$key.'"></font></td></tr>';

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

            $buying_price = MarginSetup::where('item_id',$value->id)->where('status',1)->first();

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

            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="number" name="margin_percentage[]" value="" class="form-control margin_percentage" placeholder="Margin Percentage" id="'.$key.'"></td><td><input type="hidden" value="" name="updated_buying_price[]" class="actual_updated_buying_price'.$key.'"><font style="font-family: Times new roman;" class="updated_buying_price'.$key.'"></font></td></tr>';

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

            $buying_price = MarginSetup::where('item_id',$value->id)->where('status',1)->first();
            
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
            $result .='<tr class="row_category" id="'.++$key.'"><input type="hidden" name="row_check[]" value="1" id="row_check'.$key.'"><td><font style="font-family: Times new roman;">'.$key.'</font><input type="hidden" name="table_count" value="'.$table_count.'"></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'" name="item_id[]"><input type="hidden" value="'.$value->code.'" class="actual_item_code'.$key.'" name="item_code[]"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font class="item_code'.$key.'" style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="actual_item_name'.$key.'" name="item_name[]"><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font class="item_name'.$key.'" style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="actual_item_brand_name'.$key.'" name="brand_id[]"><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font class="item_brand_name'.$key.'" style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="actual_item_category_name'.$key.'" name="category_id[]"><input type="hidden" value="'.$value->category_id.'" class="append_item_category_name'.$key.'"><font class="item_category_name'.$key.'" style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->hsn.'" class="actual_item_hsn'.$key.'" name="hsn[]"><input type="hidden" value="'.$value->hsn.'" class="append_item_hsn'.$key.'"><font style="font-family: Times new roman;" class="item_hsn'.$key.'">'.$value->hsn.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="actual_item_mrp'.$key.'" name="mrp[]"><font class="item_mrp'.$key.'" style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="actual_item_uom'.$key.'" name="uom_id[]"><input type="hidden" value="'.$uom_id.'" class="append_item_uom'.$key.'"><font class="item_uom'.$key.'" style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="number" name="margin_percentage[]" value="" class="form-control margin_percentage" placeholder="Margin Percentage" id="'.$key.'"></td><td><input type="hidden" value="" name="updated_buying_price[]" class="actual_updated_buying_price'.$key.'"><font style="font-family: Times new roman;" class="updated_buying_price'.$key.'"></font></td></tr>';
        
    }
    return $result;
   }

}
