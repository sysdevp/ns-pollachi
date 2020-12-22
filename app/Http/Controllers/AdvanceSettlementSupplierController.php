<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\AdvanceSettlementSupplier;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvanceSettlementSupplierController extends Controller
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
        $supplier = Supplier::all();
        return view('admin.advance_settlement_supplier.add',compact('supplier','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier_advance = new AdvanceSettlementSupplier(); 
        $supplier_advance->supplier_id = isset($request->supplier_id) ? ($request->supplier_id) : 0;
        $supplier_advance->voucher_no = isset($request->voucher_no) ? ($request->voucher_no) : 0;
        $supplier_advance->payment_date = isset($request->payment_date) ? ($request->payment_date) : 0;
        $supplier_advance->advance_amount = isset($request->advance_amount) ? ($request->advance_amount) : 0; 
        $supplier_advance->remarks = isset($request->remark) ? ($request->remark) : 0;
        $supplier_advance->created_by = isset($request->created_by) ? ($request->created_by) : 0;
        $supplier_advance->updated_by = isset($request->updated_by) ? ($request->updated_by) : 0;
         if ($supplier_advance->save()) {
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
}
