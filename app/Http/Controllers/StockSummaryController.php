<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\OpeningStock;
use App\Models\Location;
use App\Models\PurchaseEntryItem;
use App\Models\SaleEntryItem;
use App\Models\ReceiptNoteItem;
use App\Models\DeliveryNoteItem;
use App\Models\RejectionOutItem;
use App\Models\RejectionInItem;
use App\Models\StockChange;

class StockSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $item = Item::all();
        $supplier = Supplier::all();
        $brand = Brand::all();
        // return view('admin.stock_report.summary',compact('category','item','supplier','brand'));
        $location = Location::all();
        $array_details = [];
        foreach ($location as $key => $l_value) 
        {
        $sale_entry_details = PurchaseEntryItem::leftjoin('purchase_entries','purchase_entry_items.p_no','=','purchase_entries.p_no')
        ->where('purchase_entry_items.active',1)
        ->where('purchase_entries.location','=',$l_value->id)
        ->groupBy('purchase_entries.location','purchase_entry_items.item_id')
        ->select('purchase_entries.location','purchase_entry_items.item_id');

        $receipt_note_entry_details = ReceiptNoteItem::leftjoin('receipt_notes','receipt_note_items.rn_no','=','receipt_notes.rn_no')
        ->where('receipt_note_items.active',1)
        ->where('receipt_notes.location','=',$l_value->id)
        ->groupBy('receipt_notes.location','receipt_note_items.item_id')
        ->select('receipt_notes.location','receipt_note_items.item_id');

        $item_opening= OpeningStock::groupBy('location','item_id')
        ->where('location','=',$l_value->id)
        ->select('location','item_id');

         $purchase_entry_details = SaleEntryItem::leftjoin('sale_entries','sale_entry_items.s_no','=','sale_entries.s_no')
        ->where('sale_entry_items.active',1)
        ->where('sale_entries.location','=',$l_value->id)
        ->groupBy('sale_entries.location','sale_entry_items.item_id')
        ->select('sale_entries.location','sale_entry_items.item_id')
        ->union($sale_entry_details)
        ->union($item_opening)
        ->union($receipt_note_entry_details)
        ->get();

                                              
        
        foreach ($purchase_entry_details as $key => $value) 
        {


            
        $purchase_entry_items= PurchaseEntryItem::join('purchase_entries','purchase_entry_items.p_no','=','purchase_entries.p_no')
                             ->where('purchase_entry_items.item_id','=',$value->item_id)
                             ->where('purchase_entries.location','=',$l_value->id)
                             ->where('purchase_entries.cancel_status','=',0)
                             ->where('purchase_entry_items.active','!=',0)
                             ->where('purchase_entries.receipt_tag','!=',1)
                             ->sum('purchase_entry_items.remaining_qty');

        $purchase_entry_items_rejected_qty= PurchaseEntryItem::join('purchase_entries','purchase_entry_items.p_no','=','purchase_entries.p_no')
                             ->where('purchase_entry_items.item_id','=',$value->item_id)
                             ->where('purchase_entries.location','=',$l_value->id)
                             ->where('purchase_entries.cancel_status','=',0)
                             ->where('purchase_entry_items.active','!=',0)
                             ->where('purchase_entries.receipt_tag','=',1)
                             ->sum('purchase_entry_items.rejected_qty');

        $item_opening_quantity= OpeningStock::where('item_id','=',$value->item_id)
                             ->where('location','=',$l_value->id)
                             ->sum('opening_qty');
        
        $receipt_note_items = ReceiptNoteItem::join('receipt_notes','receipt_note_items.rn_no','=','receipt_notes.rn_no')
                            ->where('receipt_note_items.item_id','=',$value->item_id)
                            ->where('receipt_notes.location','=',$l_value->id)
                            ->where('receipt_notes.status','=',0)
                            //->where('receipt_notes.receipt_tag','=',1)
                             ->sum('receipt_note_items.remaining_qty');

        $rejection_out_items = RejectionOutItem::join('rejection_outs','rejection_out_items.r_out_no','=','rejection_outs.r_out_no')
                            ->where('rejection_out_items.item_id','=',$value->item_id)
                            ->where('rejection_outs.cancel_status','=',0)
                            ->where('rejection_outs.status','=',0)
                            ->where('rejection_outs.location','=',$l_value->id)
                            ->sum('rejection_out_items.remaining_qty');
        
        $sale_entry_items = SaleEntryItem::join('sale_entries','sale_entry_items.s_no','=','sale_entries.s_no')
                            ->where('sale_entry_items.item_id','=',$value->item_id)
                            ->where('sale_entries.cancel_status','=',0)
                            ->where('sale_entries.delivery_tag','!=',1)
                            ->where('sale_entries.location','=',$l_value->id)
                            ->sum('sale_entry_items.remaining_qty');

        $sale_entry_items_rejected_quantity = SaleEntryItem::join('sale_entries','sale_entry_items.s_no','=','sale_entries.s_no')
                            ->where('sale_entry_items.item_id','=',$value->item_id)
                            ->where('sale_entries.cancel_status','=',0)
                            ->where('sale_entries.delivery_tag','=',1)
                            ->where('sale_entries.location','=',$l_value->id)
                            ->sum('sale_entry_items.rejected_qty');
        
        $delivery_note_items = DeliveryNoteItem::join('delivery_notes','delivery_note_items.d_no','=','delivery_notes.d_no')
                            ->where('delivery_note_items.item_id','=',$value->item_id)
                            ->where('delivery_notes.location','=',$l_value->id)
                            ->where('delivery_notes.cancel_status','=',0)
                           // ->where('delivery_notes.delivery_tag','=',0)
                            ->sum('delivery_note_items.remaining_qty');
        
        $rejection_in_items = RejectionInItem::join('rejection_ins','rejection_in_items.r_in_no','=','rejection_ins.r_in_no')
                            ->where('rejection_in_items.item_id','=',$value->item_id)
                            ->where('rejection_ins.cancel_status','=',0)
                            ->where('rejection_ins.status','=',0)
                            ->where('rejection_ins.location','=',$l_value->id)
                            ->sum('rejection_in_items.remaining_qty');
                            
        $stock_changes = StockChange::where('item_id','=',$value->item_id)->where('location_id','=',$l_value->id)->sum('quantity');

                            

        $purchase_total_qty =  $purchase_entry_items + $receipt_note_items + $item_opening_quantity - $purchase_entry_items_rejected_qty;
        $sale_total_qty =  $sale_entry_items + $delivery_note_items - 
        $sale_entry_items_rejected_quantity; 

        $total_qty = $purchase_total_qty - $sale_total_qty + $stock_changes;
                            
                            // echo "<pre>"; print_r($total_qty);
                                               
        $new_array = array();
        $item_name = Item::where('id','=',$value->item_id)->pluck('name');
        $new_array['item'] = $item_name[0];
        $location = Location::where('id','=',$l_value->id)->pluck('name');
        $new_array['location'] = $location[0];
        $new_array['total_qty'] = $total_qty;     

        // echo "<pre>"; print_r($new_array);            
 
        
        array_push($array_details, $new_array);

        } 
 
        }          
        // die();
        
             $count = count($array_details); 
             // echo $count; exit();                        

            
    return view('admin.stock_report.summary',compact('array_details','count','category','item','supplier','brand'));
                            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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

            @$opening_stock = OpeningStock::where('item_id',$value->id)
                                        ->select('opening_qty')
                                        ->first();

            

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_category"><td><font style="font-family: Times new roman;">'.++$key.'</font></td><td><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><font style="font-family: Times new roman;">'.@$opening_stock->opening_qty.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';

            }
         return $result;

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
}
