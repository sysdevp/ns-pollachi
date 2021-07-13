<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PosPayment;

class PosCashReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from = date('Y-m-d');
        $to = date('Y-m-d');

        $cash_sum = PosPayment::sum('cash');
        $card_sum = PosPayment::sum('card');
        $cheque_sum = PosPayment::sum('cheque');
        $voucher_sum = PosPayment::sum('voucher');

        $cash_report = PosPayment::where('cash','!=','')->get();
        $card_report = PosPayment::where('card','!=','')->get();
        $cheque_report = PosPayment::where('cheque','!=','')->get();
        $voucher_report = PosPayment::where('voucher','!=','')->get();
        // echo "<pre>";print_r($voucher_report); exit();
        return view('admin.pos_cash_report.report',compact('cash_sum','card_sum','cheque_sum','voucher_sum','cash_report','card_report','cheque_report','voucher_report','from','to'));
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
        $from = $request->from;
        $to = $request->to;

        $cash_sum = PosPayment::whereBetween('pos_date', [$from, $to])->sum('cash');
        $card_sum = PosPayment::whereBetween('pos_date', [$from, $to])->sum('card');
        $cheque_sum = PosPayment::whereBetween('pos_date', [$from, $to])->sum('cheque');
        $voucher_sum = PosPayment::whereBetween('pos_date', [$from, $to])->sum('voucher');

        $cash_report = PosPayment::whereBetween('pos_date', [$from, $to])->where('cash','!=','')->get();
        $card_report = PosPayment::whereBetween('pos_date', [$from, $to])->where('card','!=','')->get();
        $cheque_report = PosPayment::whereBetween('pos_date', [$from, $to])->where('cheque','!=','')->get();
        $voucher_report = PosPayment::whereBetween('pos_date', [$from, $to])->where('voucher','!=','')->get();

        return view('admin.pos_cash_report.report',compact('cash_sum','card_sum','cheque_sum','voucher_sum','cash_report','card_report','cheque_report','voucher_report','from','to'));

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
