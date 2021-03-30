<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReceiptProcess;
use App\Models\PosPayment;
use App\Models\Bank;
use App\Models\CompanyBank;
use App\Models\Bankbranch;
use App\Models\Supplier;
use App\Models\AccountType;
use App\Models\BankDetails;
use App\Models\PaymentProcess;
use App\Models\ReceivedCheque;
use App\Models\PaidCheque;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class PaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bank = Bank::all();
        $bank_branch = Bankbranch::all();
       $act_type = AccountType::all();
       


       $payment_process = PaymentProcess::where('payment_mode',4)->where('cleared_status',0)
       ->join('suppliers','suppliers.id','=','payment_processes.supplier_id')
       ->get();
       
      // print_r($payment_process[0]->supplier_id);exit;
      
      //$supplier = Supplier::find($payment_process[0]->supplier_id);
        
       $company_bank = CompanyBank::all();//for received payment
     
   //    $pos_payment = PosPayment::where('cheque','!=','')->where('cleared_status',0)->get();

       return view('admin.paid.view',compact('payment_process','company_bank'));
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
        //print_r($request->company_bank_id);exit;
        $validator = Validator::make($request->all(), [
            'company_bank_id' => 'required|unique:banks,name,NULL,id,deleted_at,NULL',
            'cleared_date' => 'required|unique:banks,code,NULL,id,deleted_at,NULL',
        ])->validate();
         
        PaymentProcess::where('id',$request->payment_processes_id)->update(['cleared_status' => $request->status]);

        $paid_cheques = new PaidCheque();
        $paid_cheques->payment_processes_id = $request->payment_processes_id;
        $paid_cheques->company_bank_id = $request->company_bank_id;
        $paid_cheques->cleared_date = $request->cleared_date;
        $paid_cheques->remarks = $request->remarks;
        $paid_cheques->status =  $request->status;
        $charges = ($request->charges=="")?0:$request->charges;
        $paid_cheques->charges = $charges;
    //    $paid_cheques->created_by = 0;
    //    $paid_cheques->updated_by = 0;


      if ($paid_cheques->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
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
