<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\AdvanceSettlementCustomer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvanceSettlementCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $advances=AdvanceSettlementCustomer::orderBy('id','DESC')->get();
    return view('admin.advance_settlement_customer.view',compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $customer = Customer::all();
        return view('admin.advance_settlement_customer.add',compact('customer','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_advance = new AdvanceSettlementCustomer(); 
        $customer_advance->customer_id = isset($request->customer_id) ? ($request->customer_id) : 0;
        $customer_advance->voucher_no = isset($request->voucher_no) ? ($request->voucher_no) : 0;
        $customer_advance->receipt_date = isset($request->receipt_date) ? ($request->receipt_date) : 0;
        $customer_advance->advance_amount = isset($request->advance_amount) ? ($request->advance_amount) : 0; 
        $customer_advance->remarks = isset($request->remark) ? ($request->remark) : 0;
        $customer_advance->created_by = isset($request->created_by) ? ($request->created_by) : 0;
        $customer_advance->updated_by = isset($request->updated_by) ? ($request->updated_by) : 0;
         if ($customer_advance->save()) {
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
        $advance=AdvanceSettlementCustomer::find($id);
        $customer = Customer::all();
        return view('admin.advance_settlement_customer.edit',compact('advance','customer'));
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
        $customer_advance = AdvanceSettlementCustomer::find($id);
        $customer_advance->customer_id = isset($request->customer_id) ? ($request->customer_id) : 0;
        $customer_advance->voucher_no = isset($request->voucher_no) ? ($request->voucher_no) : 0;
        $customer_advance->receipt_date = isset($request->receipt_date) ? ($request->receipt_date) : 0;
        $customer_advance->advance_amount = isset($request->advance_amount) ? ($request->advance_amount) : 0; 
        $customer_advance->remarks = isset($request->remark) ? ($request->remark) : 0;
        $customer_advance->created_by = isset($request->created_by) ? ($request->created_by) : 0;
        $customer_advance->updated_by = isset($request->updated_by) ? ($request->updated_by) : 0;
         if ($customer_advance->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
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
