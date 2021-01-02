<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntry;
use App\Models\GstReport;

class GstReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::all();
        // $array_details = [];
        // foreach ($items as $item) 
        // {
        // $new_array = array();
        // $purchase_entry_items_quantity= PurchaseEntryItem::where('item_id','=',$item->id)
        //                      ->where('active','!=',0)
        //                      ->sum('remaining_qty');
        // $purchase_entry_items = $purchase_entry_items_quantity * $item->mrp;
        // $new_array['amount'] = $purchase_entry_items;
        // $new_array['rate'] = $item->mrp;
        // $new_array['quantity'] = $purchase_entry_items_quantity;

        // $new_array['item'] = $item->name;
       
                        
        // array_push($array_details, $new_array);

        // } 

        //supplier mode - purchase_entries -purchase_entry_items_>qty*rate_exclusive_tax - qty*rate_inclusive_tax


        $supp_b2b = GstReport::gst_report("1");//get model
        $sum_taxable_b2b = $supp_b2b[0]['tot_b2b'];
        $igst_b2b = $supp_b2b[0]['igst'];
        $c_s_gst_b2b = $supp_b2b[0]['c_s_gst'];
        $tot_b2b = $sum_taxable_b2b + $igst_b2b;
        $sum_tax_b2b = $supp_b2b[0]['sum_tax_b2b']


        $supp_b2c = GstReport::gst_report("2");//get model
        $sum_taxable_b2c = $supp_b2c[0]['tot_b2b'];
        $igst_b2c = $supp_b2c[0]['igst'];
        $c_s_gst_b2c = $supp_b2c[0]['c_s_gst'];
        $tot_b2c = $sum_taxable_b2c + $igst_b2c;
        $sum_tax_b2c = $supp_b2c[0]['sum_tax_b2b']

        $supp_unreg = GstReport::gst_report("3");//get model
        $sum_taxable_unreg = $supp_unreg[0]['tot_b2b'];
        $igst_unreg = $supp_unreg[0]['igst'];
        $c_s_gst_unreg = $supp_unreg[0]['c_s_gst'];
        $tot_unreg = $sum_taxable_unreg + $igst_unreg;
        $sum_tax_unreg = $supp_unreg[0]['sum_tax_b2b']

        // $supp_b2c = GstReport::gst_report("2");
        // $supp_unreg = GstReport::gst_report("3");
        // print_r($supp_b2b[0]['tot_b2b']);exit;

        return view('admin.gst_report.consolidated',compact('sum_taxable_b2b','igst_b2b','c_s_gst_b2b','tot_b2b','sum_tax_b2b'));
        
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

    public function gst_report(Request $request)
    {
        return view('admin.gst_report.report');
    }
}
