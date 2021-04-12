<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SaleEntry;
use App\Models\SalesMan;
use DB;
use App\Models\Location;

class SalesmanReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salesman = SaleEntry::join('sales_men','sales_men.id','=','sale_entries.salesman_id')
        // ->join('locations','locations.id','=','sale_entries.location')
        ->where('sale_entries.salesman_id','!=',"")->get();
       // print_r($salesman);exit;
       $location = Location::all();
        $from = "";
        $to ="";
        return view('admin.sales_entry.report_view',compact('salesman','location','from','to'));

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
        print_r($request->all());exit;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        print_r($request->all());exit;
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
    public function report(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $salesman = SaleEntry::join('sales_men','sales_men.id','=','sale_entries.salesman_id')
        ->whereBetween('so_date',[$from,$to])
        ->where('sale_entries.salesman_id','!=',"")
        ->get();
       // print_r($salesman);exit;
       $location = Location::all();

        return view('admin.sales_entry.report_view',compact('salesman','location','from','to'));    }
}
