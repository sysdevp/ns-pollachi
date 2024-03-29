<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountTypeController extends Controller
{
   
    public function index()
    {
        //return view('admin.purchase.add');
        $accounts_type=AccountType::all();
        return view('admin.master.accounts_type.view',compact('accounts_type'));
    }

    public function create()
    {
        return view('admin.master.accounts_type.add');
    }

  

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:account_types,name,NULL,id,deleted_at,NULL',
         ])->validate();

        $accounts_type = new AccountType();
        $accounts_type->name       = $request->name;
        $accounts_type->remark      =  $request->remark;
        $accounts_type->created_by = 0;
        $accounts_type->updated_by = 0;
      if ($accounts_type->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    
    public function show(AccountType $accountType,$id)
    {
        $accounts_type=AccountType::find($id);
        return view('admin.master.accounts_type.show',compact('accounts_type'));
    }

    public function edit(AccountType $accountType,$id)
    {
        $accounts_type=AccountType::find($id);
        return view('admin.master.accounts_type.edit',compact('accounts_type'));
    }

    public function update(Request $request, AccountType $accountType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:account_types,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

         $accounts_type=AccountType::find($id);
         $accounts_type->name       = $request->name;
         $accounts_type->remark      =  $request->remark;
         $accounts_type->created_by = 0;
         $accounts_type->updated_by = 0;
      if ($accounts_type->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function destroy(AccountType $accountType,$id)
    {
        $accounts_type = AccountType::find($id);
        if ($accounts_type->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
