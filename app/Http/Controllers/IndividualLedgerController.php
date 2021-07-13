<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountHead;
use App\Models\Expense;

class IndividualLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$head = AccountHead::all();
        $array_details = [];
       // print_r($request->supplier_id);exit;
        if($request->head_id)
          {
            $from_date = $request->from;
            $to_date = $request->to;

            $credit_heads = Expense::where('credit_account_head',$request->head_id)->whereBetween('entry_date',[$from_date,$to_date])->get();
            
            foreach($credit_heads as $credit_head){
            $new_array = array();
            $new_array['sno'] = $credit_head->id;
            $new_array['date'] = $credit_head->entry_date;
            $new_array['particular_db'] = isset($credit_head->debit_head_det) ? ($credit_head->debit_head_det->name) : '-';
            $new_array['particular_cd'] = isset($credit_head->credit_head_det) ? ($credit_head->credit_head_det->name) : '-';
            $new_array['debit'] = $credit_head->debit_amount;
            $new_array['credit'] = $credit_head->credit_amount;
            array_push($array_details, $new_array);
            
            }

            $debit_heads = Expense::where('debit_account_head',$request->head_id)->whereBetween('entry_date',[$from_date,$to_date])->get();
            
            foreach($debit_heads as $debit_head){
            $new_array_debit = array();
            $new_array_debit['sno'] = $debit_head->id;
            $new_array_debit['date'] = $debit_head->entry_date;
            $new_array_debit['particular_db'] = isset($debit_head->debit_head_det) ? ($debit_head->debit_head_det->name) : '-';
            $new_array_debit['particular_cd'] = isset($debit_head->credit_head_det) ? ($debit_head->credit_head_det->name) : '-';
            $new_array_debit['debit'] = $debit_head->debit_amount;
            $new_array_debit['credit'] = $debit_head->credit_amount;
            array_push($array_details, $new_array_debit);
            
            }
          }
          else
          {
            $new_array = array();
            $new_array['sno'] = '';
            $new_array['date'] = '';
            $new_array['particular_db'] = '';
            $new_array['particular_cd'] = '';
            $new_array['debit'] = '';
            $new_array['credit'] ='';
            array_push($array_details, $new_array);
            
           }  
    
        return view('admin.individual_ledger.ledger',compact('head','array_details'));
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
	
	public function report(Request $request) {
		
	}
}