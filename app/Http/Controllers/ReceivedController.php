<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReceiptProcess;
use App\Models\PosPayment;
use App\Models\Bank;
use App\Models\Bankbranch;
use App\Models\AccountType;
use App\Models\BankDetails;
use Illuminate\Support\Facades\Redirect;

class ReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bank = Bank::all();
        $bank_branch = Bankbranch::all();
        $act_type = AccountType::all();

        $receipt_process = ReceiptProcess::where('payment_mode',4)->where('cleared_status',0)->get();
        $pos_payment = PosPayment::where('cheque','!=','')->where('cleared_status',0)->get();

        return view('admin.received.view',compact('receipt_process','pos_payment','bank','bank_branch','act_type'));
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

    public function branch_details(Request $request)
    {
        
        $option = "";
        $branch_details = Bankbranch::where('bank_id',$request->value)->get();

        foreach ($branch_details as $key => $value) 
        {
            $option .= '<option value="'.$value->id.'">'.$value->branch.'</option>';    
        }

        return $option;

    }

    public function act_type_details(Request $request)
    {
        
        $option = "";
        $act_type_details = BankDetails::where('ref_table','Cus')->where('account_type_id',$request->value)->get();

        foreach ($act_type_details as $key => $value) 
        {
            $option .= '<option value="'.$value->id.'">'.$value->account_holder_name.'</option>';    
        }

        return $option;

    }

}
