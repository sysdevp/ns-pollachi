<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseEntryItem;
use App\Models\Item;
use DB;

class LastPurchaseCostReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_data = PurchaseEntryItem::groupBy('item_id')
                                        ->select('*')
                                        ->get();   

// $item_data = PurchaseEntryItem::orderBy('updated_at')
//                                 ->get()
//                                 ->groupBy(function ($val) {
//                                     return PurchaseEntryItem::where($val->updated_at)->select('*')->get();
//                                 });
                                    
    
        // echo "<pre>";print_r($item_data); exit();                                
        return view('admin.last_purchase_cost_report.lpc_report',compact('item_data'));
        
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
        $item = Item::where('id',$id)->first();

        $item_data = PurchaseEntryItem::where('item_id',$id)
                                        ->get();
        $count = count($item_data);                                        

        return view('admin.last_purchase_cost_report.view_report',compact('item','item_data','count'));
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
