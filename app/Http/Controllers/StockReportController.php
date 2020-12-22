<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\PurchaseEntryItem;
use App\Models\SaleEntryItem;
use App\Models\ReceiptNoteItem;
use App\Models\DeliveryNoteItem;
use App\Models\RejectionOutItem;
use App\Models\RejectionInItem;
use App\Models\StockChange;
use App\Models\Item;
use DB;

class StockReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $location = Location::all();
        $array_details = [];
        foreach ($location as $key => $l_value) 
        {
            $sale_entry_details = PurchaseEntryItem::leftjoin('purchase_entries','purchase_entry_items.p_no','=','purchase_entries.p_no')
        ->where('purchase_entry_items.active',1)
        ->groupBy('purchase_entries.location','purchase_entry_items.item_id')
        ->select('purchase_entries.location','purchase_entry_items.item_id');

         $purchase_entry_details = SaleEntryItem::leftjoin('sale_entries','sale_entry_items.s_no','=','sale_entries.s_no')
        ->where('sale_entry_items.active',1)
        ->groupBy('sale_entries.location','sale_entry_items.item_id')
        ->select('sale_entries.location','sale_entry_items.item_id')
        ->union($sale_entry_details)
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

                            

        $purchase_total_qty =  $purchase_entry_items + $receipt_note_items;
        $sale_total_qty =  $sale_entry_items + $delivery_note_items; 

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

            
    return view('admin.stock_report.stock_report',compact('array_details','count'));
                            

                                                                                                                                               
        // echo "<pre>"; print_r($purchase_entry_items);exit();
// 
        /*Last Code Starts Here*/

         // $location = Location::join('purchase_entries','purchase_entries.location','=','locations.id')
         //            ->join('purchase_entry_items','purchase_entries.p_no','=','purchase_entry_items.p_no')
         //            ->join('receipt_notes','receipt_notes.location','=','locations.id')
         //            ->join('receipt_note_items','receipt_notes.rn_no','=','receipt_note_items.rn_no')
         //            ->join('rejection_outs','locations.id','=','rejection_outs.location')
         //            ->join('rejection_out_items','rejection_outs.r_out_no','=','rejection_out_items.r_out_no')
         //            ->join('delivery_notes','locations.id','=','delivery_notes.location')
         //            ->join('delivery_note_items','delivery_notes.d_no','=','delivery_note_items.d_no')
         //            ->join('sale_entries','locations.id','=','sale_entries.location')
         //            ->join('sale_entry_items','sale_entries.s_no','=','sale_entry_items.s_no')
         //            ->join('rejection_ins','locations.id','=','rejection_ins.location')
         //            ->join('rejection_in_items','rejection_ins.r_in_no','=','rejection_in_items.r_in_no')

         //            ->where('purchase_entries.cancel_status','=',0,'AND','receipt_notes.status','=',0,'AND','receipt_note_items.rn_no','!=','purchase_entry_items.rn_no','rejection_outs.cancel_status','=',0,'delivery_notes.cancel_status','=',0,'sale_entries.cancel_status','=',0,'rejection_ins.cancel_status','=',0)

         //            ->groupBy('purchase_entries.location','purchase_entry_items.item_id','receipt_notes.location','receipt_note_items.item_id','rejection_outs.location','rejection_out_items.item_id','delivery_notes.location','delivery_note_items.item_id','sale_entries.location','sale_entry_items.item_id','rejection_ins.location','rejection_in_items.item_id','locations.name')

         //            ->select('locations.name','purchase_entry_items.item_id as purchase_item_id',DB::raw('sum(purchase_entry_items.remaining_qty) as purchase_total'),'receipt_note_items.item_id as receipt_item_id',DB::raw('sum(receipt_note_items.remaining_qty) as receipt_total'),DB::raw('sum(rejection_out_items.remaining_qty) as rejection_out_total'),'delivery_note_items.item_id as delivery_item_id',DB::raw('sum(delivery_note_items.remaining_qty) as delivery_total'),'sale_entry_items.item_id as sale_item_id',DB::raw('sum(sale_entry_items.remaining_qty) as sale_total'),'rejection_in_items.item_id as r_in_item_id',DB::raw('sum(rejection_in_items.remaining_qty) as rejection_in_total'))

         //            ->get();


                            // foreach (@$location as $key => $value) 
                            // {
                            //     @$purchase_total[] =  @$value->purchase_total + @$value->receipt_total + @$value->rejection_out_total;

                            //     @$sale_total[] =  @$value->sale_total + @$value->delivery_total + @$value->rejection_in_total;
                            //     @$total_qty[] = @$purchase_total[$key] - @$sale_total[$key];

                            // }
                            // print_r($total_qty);
                            // exit(); 

        

/*Last Code End Here*/



        // foreach ($location as $key => $l_value) 
        // {
        //     foreach ($item as $key => $value) 
        //     {
        //         $purchase_sum = 0;
        //         $purchase_sum1 = 0;
        //         $sale_sum = 0;
        //         $sale_sum1 = 0;

        //         $purchase_entry = PurchaseEntry::join('purchase_entry_items','purchase_entries.p_no','=','purchase_entry_items.p_no')
        //         ->join('locations','purchase_entries.location','=','locations.id')
        //         // ->join('receipt_note_items','purchase_entry_items.rn_no','=','receipt_note_items.rn_no')
        //         // ->where('receipt_note_items.rn_no','!=','purchase_entry_items.rn_no','AND','purchase_entry_items.item_id',$value->id,'AND','purchase_entries.cancel_status',0,'AND','receipt_notes.status',0,'AND','receipt_note_items.item_id',$value->id)
        //         ->where('purchase_entry_items.item_id',$value->id)
        //         ->where('purchase_entry_items.rn_no','=',null)
        //         ->where('purchase_entries.cancel_status','=',0)
        //         ->where('purchase_entries.location','=',$l_value->id)
        //         ->select('purchase_entry_items.remaining_qty as p_qty')
        //         ->get();

        //         foreach ($purchase_entry as $p_key => $p_value) 
        //         {
        //             $purchase_sum = $purchase_sum + $p_value->p_qty;

        //             $receipt_note = ReceiptNote::join('receipt_note_items','receipt_notes.rn_no','=','receipt_note_items.rn_no')
        //             ->join('locations','receipt_notes.location','=','locations.id')
        //             ->where('receipt_note_items.item_id',$value->id)
        //             ->where('receipt_note_items.rn_no','!=',$p_value->rn_no)
        //             ->where('receipt_notes.status','=',0)
        //             ->where('receipt_notes.location','=',$l_value->id)
        //             ->select('receipt_note_items.remaining_qty as r_qty')
        //             ->get();

        //             foreach ($receipt_note as $r_key => $r_value) 
        //             {
        //                 $purchase_sum1 = $purchase_sum1 + $r_value->r_qty;
        //             }
        //         }
                
        //         $purchase_total_value[] = $purchase_sum + $purchase_sum1;


        //         $sale_entry = SaleEntry::join('sale_entry_items','sale_entries.s_no','=','sale_entry_items.s_no')
        //         ->join('locations','sale_entries.location','=','locations.id')
        //         ->where('sale_entry_items.item_id',$value->id)
        //         ->where('sale_entry_items.d_no','=',null)
        //         ->where('sale_entries.cancel_status','=',0)
        //         ->where('sale_entries.location','=',$l_value->id)
        //         ->select('sale_entry_items.remaining_qty as s_qty')
        //         ->get();

        //         foreach ($sale_entry as $s_key => $s_value) 
        //         {
        //             $sale_sum = $sale_sum + $s_value->s_qty;

        //             $delivery_note = DeliveryNote::join('delivery_note_items','delivery_notes.d_no','=','delivery_note_items.d_no')
        //             ->join('locations','sale_entries.location','=','locations.id')
        //             ->where('delivery_note_items.item_id',$value->id)
        //             ->where('delivery_note_items.d_no','!=',$s_value->d_no)
        //             ->where('delivery_notes.cancel_status','=',0)
        //             ->where('delivery_notes.location','=',$l_value->id)
        //             ->select('delivery_note_items.remaining_qty as d_qty')
        //             ->get();

        //             foreach ($delivery_note as $d_key => $d_value) 
        //             {
        //                 $sale_sum1 = $sale_sum1 + $d_value->d_qty;
        //             }
        //         }

        //         $sale_total_value[] = $sale_sum + $sale_sum1;

        //         $total_value[] = $purchase_total_value[$key] - $sale_total_value[$key];


        // }
        //     }

        
    // echo "<pre>";print_r($purchase_total_value);
    //     exit();
        
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
