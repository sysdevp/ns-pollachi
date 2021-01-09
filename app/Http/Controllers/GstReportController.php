<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntry;
use App\Models\GstReport;
use App\Models\SaleEntry;
use App\Models\SaleEntryItem;
class GstReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//print_r($request->from);exit;
        // if($request->from!="" && $request->to!="")
        // {
        //     //echo "hi";exit;
        //     //($request->from);exit;
        //     $supp_b2b = GstReport::gst_report("1",$request->from,$request->to);//get model
        //   //  echo "<pre>"; print_r($supp_b2b);exit;
        //     $supp_b2c = GstReport::gst_report("2",$request->from,$request->to);//get model
        //     $supp_unreg = GstReport::gst_report("3",$request->from,$request->to);//get model
        // }
        // else
        // {
            $supp_b2b = GstReport::gst_report("1","","");//get model
            $supp_b2c = GstReport::gst_report("2","","");//get model
            $supp_unreg = GstReport::gst_report("3","","");//get model
        // }
        $sum_taxable_b2b = $supp_b2b[0]['tot_b2b'];
        $igst_b2b = $supp_b2b[0]['igst'];
        $c_s_gst_b2b = $supp_b2b[0]['c_s_gst'];
        $tot_b2b = $sum_taxable_b2b + $igst_b2b;
        $sum_tax_b2b = $supp_b2b[0]['sum_tax_b2b'];


        $sum_taxable_b2c = $supp_b2c[0]['tot_b2b'];
        $igst_b2c = $supp_b2c[0]['igst'];
        $c_s_gst_b2c = $supp_b2c[0]['c_s_gst'];
        $tot_b2c = $sum_taxable_b2c + $igst_b2c;
        $sum_tax_b2c = $supp_b2c[0]['sum_tax_b2b'];


        $sum_taxable_unreg = $supp_unreg[0]['tot_b2b'];
        $igst_unreg = $supp_unreg[0]['igst'];
        $c_s_gst_unreg = $supp_unreg[0]['c_s_gst'];
        $tot_unreg = $sum_taxable_unreg + $igst_unreg;
        $sum_tax_unreg = $supp_unreg[0]['sum_tax_b2b'];

        // $supp_b2c = GstReport::gst_report("2");
        // $supp_unreg = GstReport::gst_report("3");
        // print_r($supp_b2b[0]['tot_b2b']);exit;


        $cust_b2b = GstReport::gst_report_customer("1");//get model
        $cust_sum_taxable_b2b = $cust_b2b[0]['cust_tot_b2b'];
        $cust_igst_b2b = $cust_b2b[0]['cust_igst'];
        $cust_c_s_gst_b2b = $cust_b2b[0]['cust_c_s_gst'];
        $cust_tot_b2b = $cust_sum_taxable_b2b + $cust_igst_b2b;
        $cust_sum_tax_b2b = $cust_b2b[0]['cust_sum_tax_b2b'];


        $cust_b2c = GstReport::gst_report_customer("2");//get model
        $cust_sum_taxable_b2c = $cust_b2c[0]['cust_tot_b2b'];
        $cust_igst_b2c = $cust_b2c[0]['cust_igst'];
        $cust_c_s_gst_b2c = $cust_b2c[0]['cust_c_s_gst'];
        $cust_tot_b2c = $cust_sum_taxable_b2c + $cust_igst_b2c;
        $cust_sum_tax_b2c = $cust_b2c[0]['cust_sum_tax_b2b'];

        $cust_unreg = GstReport::gst_report_customer("3");//get model
        $cust_sum_taxable_unreg = $cust_unreg[0]['cust_tot_b2b'];
        $cust_igst_unreg = $cust_unreg[0]['cust_igst'];
        $cust_c_s_gst_unreg = $cust_unreg[0]['cust_c_s_gst'];
        $cust_tot_unreg = $cust_sum_taxable_unreg + $cust_igst_unreg;
        $cust_sum_tax_unreg = $cust_unreg[0]['cust_sum_tax_b2b'];
        $from_date ="";
        $to_date ="";    
        return view('admin.gst_report.consolidated',compact('sum_taxable_b2b','igst_b2b','c_s_gst_b2b','tot_b2b','sum_tax_b2b','sum_taxable_b2c','igst_b2c','c_s_gst_b2c','tot_b2c','sum_tax_b2c','sum_taxable_unreg','igst_unreg','c_s_gst_unreg','tot_unreg','sum_tax_unreg','cust_sum_taxable_b2b','cust_igst_b2b','cust_c_s_gst_b2b','cust_tot_b2b','cust_sum_tax_b2b','cust_sum_taxable_b2c','cust_igst_b2c','cust_c_s_gst_b2c','cust_tot_b2c','cust_sum_tax_b2c','cust_sum_taxable_unreg','cust_igst_unreg','cust_c_s_gst_unreg','cust_tot_unreg','cust_sum_tax_unreg','from_date','to_date'));
        
    }
    public function datewise_gst_report(Request $request)
    {
        $supp_b2b = GstReport::gst_report_datewise("1",$request->from,$request->to);//get model
        $supp_b2c = GstReport::gst_report_datewise("2",$request->from,$request->to);//get model
        $supp_unreg = GstReport::gst_report_datewise("3",$request->from,$request->to);//get model
    // }
    $sum_taxable_b2b = $supp_b2b[0]['tot_b2b'];
    $igst_b2b = $supp_b2b[0]['igst'];
    $c_s_gst_b2b = $supp_b2b[0]['c_s_gst'];
    $tot_b2b = $sum_taxable_b2b + $igst_b2b;
    $sum_tax_b2b = $supp_b2b[0]['sum_tax_b2b'];


    $sum_taxable_b2c = $supp_b2c[0]['tot_b2b'];
    $igst_b2c = $supp_b2c[0]['igst'];
    $c_s_gst_b2c = $supp_b2c[0]['c_s_gst'];
    $tot_b2c = $sum_taxable_b2c + $igst_b2c;
    $sum_tax_b2c = $supp_b2c[0]['sum_tax_b2b'];


    $sum_taxable_unreg = $supp_unreg[0]['tot_b2b'];
    $igst_unreg = $supp_unreg[0]['igst'];
    $c_s_gst_unreg = $supp_unreg[0]['c_s_gst'];
    $tot_unreg = $sum_taxable_unreg + $igst_unreg;
    $sum_tax_unreg = $supp_unreg[0]['sum_tax_b2b'];

    // $supp_b2c = GstReport::gst_report("2");
    // $supp_unreg = GstReport::gst_report("3");
    // print_r($supp_b2b[0]['tot_b2b']);exit;


    $cust_b2b = GstReport::gst_report_date_wise_customer("1",$request->from,$request->to);//get model
    $cust_sum_taxable_b2b = $cust_b2b[0]['cust_tot_b2b'];
    $cust_igst_b2b = $cust_b2b[0]['cust_igst'];
    $cust_c_s_gst_b2b = $cust_b2b[0]['cust_c_s_gst'];
    $cust_tot_b2b = $cust_sum_taxable_b2b + $cust_igst_b2b;
    $cust_sum_tax_b2b = $cust_b2b[0]['cust_sum_tax_b2b'];


    $cust_b2c = GstReport::gst_report_date_wise_customer("2",$request->from,$request->to);//get model
    $cust_sum_taxable_b2c = $cust_b2c[0]['cust_tot_b2b'];
    $cust_igst_b2c = $cust_b2c[0]['cust_igst'];
    $cust_c_s_gst_b2c = $cust_b2c[0]['cust_c_s_gst'];
    $cust_tot_b2c = $cust_sum_taxable_b2c + $cust_igst_b2c;
    $cust_sum_tax_b2c = $cust_b2c[0]['cust_sum_tax_b2b'];

    $cust_unreg = GstReport::gst_report_date_wise_customer("3",$request->from,$request->to);//get model
    $cust_sum_taxable_unreg = $cust_unreg[0]['cust_tot_b2b'];
    $cust_igst_unreg = $cust_unreg[0]['cust_igst'];
    $cust_c_s_gst_unreg = $cust_unreg[0]['cust_c_s_gst'];
    $cust_tot_unreg = $cust_sum_taxable_unreg + $cust_igst_unreg;
    $cust_sum_tax_unreg = $cust_unreg[0]['cust_sum_tax_b2b'];

    $from_date = $request->from;
    $to_date = $request->to;
    return view('admin.gst_report.consolidated',compact('sum_taxable_b2b','igst_b2b','c_s_gst_b2b','tot_b2b','sum_tax_b2b','sum_taxable_b2c','igst_b2c','c_s_gst_b2c','tot_b2c','sum_tax_b2c','sum_taxable_unreg','igst_unreg','c_s_gst_unreg','tot_unreg','sum_tax_unreg','cust_sum_taxable_b2b','cust_igst_b2b','cust_c_s_gst_b2b','cust_tot_b2b','cust_sum_tax_b2b','cust_sum_taxable_b2c','cust_igst_b2c','cust_c_s_gst_b2c','cust_tot_b2c','cust_sum_tax_b2c','cust_sum_taxable_unreg','cust_igst_unreg','cust_c_s_gst_unreg','cust_tot_unreg','cust_sum_tax_unreg','from_date','to_date'));
    
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
       // print_r($request->from);exit;

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

        //OUTWARD
        if($request->from)
        {
            $from_date = $request->from;
            $to        = $request->to;
            $out_b2b = GstReport::outward("1",$from_date,$to);
            $out_b2c = GstReport::outward("2",$from_date,$to);
            $out_unreg = GstReport::outward("3",$from_date,$to);
                    //INWARD
            $in_b2b = GstReport::inward("1",$from_date,$to);
            $in_b2c = GstReport::inward("2",$from_date,$to);
            $in_unreg = GstReport::inward("3",$from_date,$to);
            $select = $request->select;
        }
        else
        {
            $out_b2b = GstReport::outward("1","","");
            $out_b2c = GstReport::outward("2","","");
            $out_unreg = GstReport::outward("3","","");
        // echo"<pre>"; print_r($out_b2b);exit;
        //INWARD
            $in_b2b = GstReport::inward("1","","");
            $in_b2c = GstReport::inward("2","","");
            $in_unreg = GstReport::inward("3","","");
            $select = "";
            $from_date ="";
            $to ="";
        }  

        //print_r($in_unreg);exit;

        return view('admin.gst_report.report',compact('out_b2b','out_b2c','out_unreg','in_b2b','in_b2c','in_unreg','select','from_date','to'));
    }
}
