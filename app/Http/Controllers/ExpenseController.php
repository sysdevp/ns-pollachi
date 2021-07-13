<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Location;
use App\Models\AccountHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $account_head = AccountHead::all();
		$location = Location::all();
        return view('admin.account_transactions.add',compact('account_head','date','location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
			
					
				$credit_count = count($request->credit_account_head);
				
				if($credit_count>0){
					 
						for($i=0; $i<$credit_count; $i++)
						{	
					
                                $account_det = new Expense();
				$account_det['remarks']  = isset($request->remarks) ? $request->remarks : 0;                                                                          
                                $account_det['location_id']  = isset($request->location_id) ? $request->location_id : 0;
                              
								$account_det->entry_date = $request->entry_date;
								
                                $account_det['voucher_no'] = isset($request->voucher_no) ? $request->voucher_no : 0;
                                $account_det['debit_account_head'] = 0;
								$account_det['debit_remarks'] = 0;				
                                $account_det['debit_amount'] = 0;
								$account_det['credit_account_head'] = isset($request->credit_account_head[$i]) ? $request->credit_account_head[$i] : 0;
								$account_det['credit_remarks'] = isset($request->credit_remarks[$i]) ? $request->credit_remarks[$i] : 0;			
                                $account_det['credit_amount'] = isset($request->credit_amount[$i]) ? $request->credit_amount[$i] : 0;
                                $account_det['created_by']  = isset($request->created_by) ? $request->created_by : 0; 
                                $account_det['active_status'] = isset($request->status) ? ($request->status) : 1;
								$account_det['remarks'] = isset($request->remarks) ? ($request->remarks) : '';
								
                                $account_det ->save(); 
								
                            }
				}
							$debit_count = count($request->debit_account_head);
				
				if($debit_count>0){
					 
						for($i=0; $i<$debit_count; $i++)
						{	
					
                                $account_det = new Expense();
								$account_det['location_id']  = isset($request->location_id) ? $request->location_id : 0;
                              
								$account_det->entry_date = $request->entry_date;
								
                                $account_det['voucher_no'] = isset($request->voucher_no) ? $request->voucher_no : 0;
                                $account_det['debit_account_head'] = isset($request->debit_account_head[$i]) ? $request->debit_account_head[$i] : 0;
								$account_det['debit_remarks'] = isset($request->debit_remarks[$i]) ? $request->debit_remarks[$i] : 0;				
                                $account_det['debit_amount'] = isset($request->debit_amount[$i]) ? $request->debit_amount[$i] : 0;
								$account_det['credit_account_head'] = 0;
								$account_det['credit_remarks'] = 0;			
                                $account_det['credit_amount'] = 0;
                                $account_det['created_by']  = isset($request->created_by) ? $request->created_by : 0; 
                                $account_det['active_status'] = isset($request->status) ? ($request->status) : 1;
								$account_det['remarks'] = isset($request->remarks) ? ($request->remarks) : '';
								
                                if ($account_det->save()) {
									return Redirect::back()->with('success', 'Successfully created');
								} else {
									return Redirect::back()->with('failure', 'Something Went Wrong..!');
								}
						}
				}
                           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}