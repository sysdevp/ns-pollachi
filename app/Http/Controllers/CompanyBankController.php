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

    public function import()
    {
       return view('admin.master.company_bank.index');
    }

    public function importCsv(Request $request)
    {

        $profile_name="";
         $destinationPath = 'storage/file/';
         if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }

        $file = storage_path('file/'.$profile_name);

        $handle = fopen($file, "r");

$i = 0;
$total_count = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                if($i >0)
                {

                    $bank_name=$filesop[1];   echo "</br>";
                    $bank_branch_name=$filesop[2];   echo "</br>";
                    $account_type=$filesop[3];   echo "</br>";
                    $account_holder=$filesop[4];   echo "</br>";
                    $account_no=$filesop[5];   echo "</br>";

                    $bank_name = str_replace(' ', '', $bank_name);
                    $banks=Bank::whereRaw("REPLACE(`name`, ' ' ,'') = '".$bank_name."'")->first();

                    $bank_branch_name = str_replace(' ', '', $bank_branch_name);
                    $bankbranches=Bankbranch::whereRaw("REPLACE(`branch`, ' ' ,'') = '".$bank_branch_name."'")->first();

                    $account_type = str_replace(' ', '', $account_type);
                    $accounttypes=AccountType::whereRaw("REPLACE(`name`, ' ' ,'') = '".$account_type."'")->first();

                    $bank_id = @$banks->id;
                    $bank_branch_id = @$bankbranches->id;
                    $account_type_id = @$accounttypes->id;

                    if($banks != '' && $bankbranches != '' && $accounttypes != '')
                    {
                        $company_bank = new CompanyBank();

                        $company_bank->bank_id = $bank_id;
                        $company_bank->bank_branch_id = $bank_branch_id;
                        $company_bank->account_type_id = $account_type_id;
                        $company_bank->holder_name = $account_holder;
                        $company_bank->account_no = $account_no;

                        $company_bank->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Company Banks Imported successfully');    
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        // echo $filename; exit();
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

}
