<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\PurchaseEntryItem;

class StockAgeingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $array_details = [];
        foreach ($items as $item) 
        {
        $new_array = array();
        $purchase_entry_items_quantity= PurchaseEntryItem::where('item_id','=',$item->id)
                             ->where('active','!=',0)
                             ->sum('remaining_qty');
        $purchase_entry_items = $purchase_entry_items_quantity * $item->mrp;
        $new_array['amount'] = $purchase_entry_items;
        $new_array['rate'] = $item->mrp;
        $new_array['quantity'] = $purchase_entry_items_quantity;

        $new_array['item'] = $item->name;
       
                        
        array_push($array_details, $new_array);

        } 
 
       
             $count = count($array_details); 
             
        return view('admin.stock_report.ageing',compact('array_details','items','count'));
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
