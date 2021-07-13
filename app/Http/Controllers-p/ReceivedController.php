<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReceiptProcess;
use App\Models\PosPayment;
use App\Models\Bank;
use App\Models\CompanyBank;
use App\Models\Bankbranch;
use App\Models\AccountType;
use App\Models\BankDetails;
use App\Models\ReceivedCheque;
use App\Models\PosReceivedCheque;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $company_bank = CompanyBank::all();//for received payment
      
        $pos_payment = PosPayment::where('cheque','!=','')->where('cleared_status',0)->get();

        return view('admin.received.view',compact('receipt_process','pos_payment','bank','company_bank','act_type'));
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
    public function store_pos(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_bank_id' => 'required|unique:banks,name,NULL,id,deleted_at,NULL',
            'cleared_date' => 'required|unique:banks,code,NULL,id,deleted_at,NULL',
        ])->validate();
         
        PosPayment::where('id',$request->pos_payment_id)->update(['cleared_status' => $request->status]);

        $received_cheques = new PosReceivedCheque();
        $received_cheques->pos_payment_id = $request->pos_payment_id;
        $received_cheques->company_bank_id = $request->company_bank_id;
        $received_cheques->cleared_date = $request->cleared_date;
        $received_cheques->remarks = $request->remarks;
        $received_cheques->status =  $request->status;
        $charges = ($request->charges=="")?0:$request->charges;
        $received_cheques->charges = $charges;
    //    $received_cheques->created_by = 0;
    //    $received_cheques->updated_by = 0;


      if ($received_cheques->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }


//echo "hifds";exit;
      //  print_r($request->pos_payment_id);exit;
    }
    public function store(Request $request)
    {
        //print_r($request->company_bank_id);exit;
        $validator = Validator::make($request->all(), [
            'company_bank_id' => 'required|unique:banks,name,NULL,id,deleted_at,NULL',
            'cleared_date' => 'required|unique:banks,code,NULL,id,deleted_at,NULL',
        ])->validate();
         
      ReceiptProcess::where('id',$request->receipt_processes_id)->update(['cleared_status' => $request->status]);

        $received_cheques = new ReceivedCheque();
        $received_cheques->receipt_processes_id = $request->receipt_processes_id;
        $received_cheques->company_bank_id = $request->company_bank_id;
        $received_cheques->cleared_date = $request->cleared_date;
        $received_cheques->remarks = $request->remarks;
        $received_cheques->status =  $request->status;
        $charges = ($request->charges=="")?0:$request->charges;
        $received_cheques->charges = $charges;
    //    $received_cheques->created_by = 0;
    //    $received_cheques->updated_by = 0;


      if ($received_cheques->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }

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
