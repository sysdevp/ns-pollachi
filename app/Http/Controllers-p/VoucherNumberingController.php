<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\VoucherNumbering;
use App\Models\Purchase_Order;
use App\Models\ReceiptNote;
use App\Models\PurchaseEntry;
use App\Models\Estimation;
use App\Models\RejectionOut;
use App\Models\DebitNote;
use App\Models\SaleEstimation;
use App\Models\SaleOrder;
use App\Models\DeliveryNote;
use App\Models\SaleEntry;
use App\Models\RejectionIn;
use App\Models\CreditNote;

class VoucherNumberingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = VoucherNumbering::all();
        $value = VoucherNumbering::where('id',1)->first();
        return view('admin.settings.voucher.add',compact('voucher','value'));
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
        foreach ($request->prefix as $key => $value) 
        {
            $voucher = VoucherNumbering::find($key+1);

            $voucher->prefix = $request->prefix[$key];
            $voucher->suffix = $request->suffix[$key];
            $voucher->starting_no = $request->starting[$key];
            $voucher->digits = $request->digits[$key];

            $voucher->value = $request->radio;
            $number[$key] = str_pad($request->starting[$key], $request->digits[$key], '0', STR_PAD_LEFT);

            $voucher->save();

        }
        
        Estimation::orderBy('created_at','DESC')->update(['voucher_no' => $number[0]]);
        Purchase_Order::orderBy('created_at','DESC')->update(['voucher_no' => $number[1]]);
        ReceiptNote::orderBy('created_at','DESC')->update(['voucher_no' => $number[2]]);
        PurchaseEntry::orderBy('created_at','DESC')->update(['voucher_no' => $number[3]]);
        RejectionOut::orderBy('created_at','DESC')->update(['voucher_no' => $number[4]]);
        DebitNote::orderBy('created_at','DESC')->update(['voucher_no' => $number[5]]);

        SaleEstimation::orderBy('created_at','DESC')->update(['voucher_no' => $number[6]]);
        SaleOrder::orderBy('created_at','DESC')->update(['voucher_no' => $number[7]]);
        DeliveryNote::orderBy('created_at','DESC')->update(['voucher_no' => $number[8]]);
        SaleEntry::orderBy('created_at','DESC')->update(['voucher_no' => $number[9]]);
        RejectionIn::orderBy('created_at','DESC')->update(['voucher_no' => $number[10]]);
        CreditNote::orderBy('created_at','DESC')->update(['voucher_no' => $number[11]]);

        return Redirect::back()->with('success', 'Successfully created');
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
