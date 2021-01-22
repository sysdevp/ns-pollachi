<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Bankbranch;
use App\Models\AccountType; 
use App\Models\CompanyBank;
use Illuminate\Support\Facades\Redirect;

class CompanyBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'hi';
        $company_bank = CompanyBank::all();
        return view('admin.master.company_bank.view',compact('company_bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::all();
        $branch = Bankbranch::all();
        $account_type = AccountType::all();

        return view('admin.master.company_bank.add',compact('bank','branch','account_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_bank = new CompanyBank();

        $company_bank->bank_id = $request->bank_id;
        $company_bank->bank_branch_id = $request->bank_branch_id;
        $company_bank->account_type_id = $request->account_type_id;
        $company_bank->holder_name = $request->holder_name;
        $company_bank->account_no = $request->account_no;

        $company_bank->save();

        return Redirect::back()->with('success', 'Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::all();
        $branch = Bankbranch::all();
        $account_type = AccountType::all();

        $company_bank = CompanyBank::find($id);

        return view('admin.master.company_bank.show',compact('bank','branch','account_type','company_bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::all();
        $branch = Bankbranch::all();
        $account_type = AccountType::all();

        $company_bank = CompanyBank::find($id);

        return view('admin.master.company_bank.edit',compact('bank','branch','account_type','company_bank'));
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
        $company_bank = CompanyBank::find($id);

        $company_bank->bank_id = $request->bank_id;
        $company_bank->bank_branch_id = $request->bank_branch_id;
        $company_bank->account_type_id = $request->account_type_id;
        $company_bank->holder_name = $request->holder_name;
        $company_bank->account_no = $request->account_no;

        $company_bank->save();

        return Redirect::back()->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_bank = CompanyBank::find($id);

        $company_bank->delete();

        return Redirect::back()->with('success', 'Successfully Deleted');
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

}
