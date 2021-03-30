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
use App\Models\Estimation_Item;
use App\Models\PurchaseOrderItem;
use App\Models\DebitNoteItem;
use App\Models\SaleEstimationItem;
use App\Models\SaleOrderItem;

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
        $items = Item::all();
        $array_details = [];
        foreach ($items as $item) 
        {
        $new_array = array();
        $purchase_entry_items_quantity= PurchaseEntryItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('remaining_qty');
        $purchase_entry_items = $purchase_entry_items_quantity * $item->mrp;
        $new_array['purchase_entry_amount'] = $purchase_entry_items;
        $new_array['purchase_item_mrp'] = $item->mrp;
        $new_array['purchase_entry_quantity'] = $purchase_entry_items_quantity;

        $purchase_estimation_items_quantity= Estimation_Item::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $purchase_estimation_items = $purchase_estimation_items_quantity * $item->mrp;
        $new_array['purchase_estimation_amount'] = $purchase_estimation_items;
        $new_array['purchase_estimation_quantity'] = $purchase_estimation_items_quantity;


        $purchase_estimation_order_quantity= PurchaseOrderItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $purchase_order_items = $purchase_estimation_order_quantity * $item->mrp;
        $new_array['purchase_order_amount'] = $purchase_order_items;
        $new_array['purchase_order_quantity'] = $purchase_estimation_order_quantity;

        $receipt_note_quantity= ReceiptNoteItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $receipt_note_items = $receipt_note_quantity * $item->mrp;
        $new_array['receipt_note_amount'] = $receipt_note_items;
        $new_array['receipt_note_quantity'] = $receipt_note_quantity;

        $rejected_out_quantity= RejectionOutItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('rejected_qty');
        $rejected_out_items = $rejected_out_quantity * $item->mrp;
        $new_array['rejection_out_amount'] = $rejected_out_items;
        $new_array['rejection_out_quantity'] = $rejected_out_quantity;

        $debit_note_quantity= DebitNoteItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('rejected_qty');
        $debit_note_items = $debit_note_quantity * $item->mrp;
        $new_array['debit_note_amount'] = $debit_note_items;
        $new_array['debit_note_quantity'] = $debit_note_quantity;



        $sales_estimation_items_quantity= SaleEstimationItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $sale_estimation_items = $sales_estimation_items_quantity * $item->mrp;
        $new_array['sale_estimation_amount'] = $sale_estimation_items;
        $new_array['sale_estimation_quantity'] = $sales_estimation_items_quantity;


        $sale_order_quantity= SaleOrderItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $sale_order_items = $sale_order_quantity * $item->mrp;
        $new_array['sale_order_amount'] = $sale_order_items;
        $new_array['sale_order_quantity'] = $sale_order_quantity;

        $delivery_note_quantity= DeliveryNoteItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('qty');
        $delivery_note_items = $delivery_note_quantity * $item->mrp;
        $new_array['delivery_note_amount'] = $delivery_note_items;
        $new_array['delivery_note_quantity'] = $delivery_note_quantity;

        $sale_entry_items_quantity= SaleEntryItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('remaining_qty');
        $sale_entry_items = $sale_entry_items_quantity * $item->mrp;
        $new_array['sale_entry_amount'] = $sale_entry_items;
        $new_array['sale_entry_quantity'] = $sale_entry_items_quantity;

        $rejected_in_quantity= RejectionInItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('rejected_qty');
        $rejected_in_items = $rejected_in_quantity * $item->mrp;
        $new_array['rejection_in_amount'] = $rejected_in_items;
        $new_array['rejection_in_quantity'] = $rejected_in_quantity;

        $credit_note_quantity= DebitNoteItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('rejected_qty');
        $credit_note_items = $credit_note_quantity * $item->mrp;
        $new_array['credit_note_amount'] = $credit_note_items;
        $new_array['credit_note_quantity'] = $credit_note_quantity;

        $item_opening_quantity= OpeningStock::where('item_id','=',$item->id)
                             ->sum('opening_qty');

        $stock_changes = StockChange::where('item_id','=',$item->id)->sum('quantity');


        $purchase_total_qty =  $purchase_entry_items_quantity + $receipt_note_quantity + $item_opening_quantity - $rejected_out_quantity;
        $sale_total_qty =  $sale_entry_items_quantity + $delivery_note_quantity - 
        $rejected_in_quantity; 

        $total_qty = $purchase_total_qty - $sale_total_qty + $stock_changes;


        
        $new_array['item'] = $item->name;
        $new_array['group_name'] = '-';
        $new_array['category'] = '-';
        $new_array['item'] = $item->name;

        $new_array['opening_stock'] = $purchase_total_qty; 
        $new_array['closing_stock'] = $total_qty; 
       
                        
        array_push($array_details, $new_array);

        } 
 
        
             $count = count($array_details); 
             
            
    return view('admin.stock_report.summary',compact('array_details','count'));
                            
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

    public function emptydash()
    {
      $supplier_cnt = Supplier::count('id');
      $customer_cnt = Customer::count('id');

      $from_date = date('Y-m-01');
      $to_date = date('Y-m-31');

      $current_month_received_amount = ReceiptProcess::whereBetween('voucher_date', [$from_date, $to_date])->sum('receipt_amount');

      $current_month_payment_amount = PaymentProcess::whereBetween('voucher_date',[$from_date, $to_date])->sum('payment_amount');

      $sales_entry = SaleEntry::sum('total_net_value');

      $purchase_entry = PurchaseEntry::sum('total_net_value');

      $received_amount = ReceiptProcess::sum('receipt_amount');

      $payment_amount = PaymentProcess::sum('payment_amount');

      $receivables = $sales_entry - $received_amount;

      $payables    = $purchase_entry - $payment_amount;

      $expenses = Expense::sum('debit_amount');
      
    }
}
