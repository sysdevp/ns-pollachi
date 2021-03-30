<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bankbranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BankbranchController extends Controller
{
    public function index()
    {
        $bank_branch=Bankbranch::all();
        // echo "<pre>";print_r($bank_branch);exit();
        return view('admin.master.bank_branch.view',compact('bank_branch'));
    }

    
    public function create()
    {
        $bank=Bank::all();
        return view('admin.master.bank_branch.add',compact('bank'));
    }

    
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(), [
                'bank_id' => 'required',
                'branch' => 'required|unique:bankbranches,branch,NULL,id,deleted_at,NULL,bank_id,'.$request->bank_id,
                'ifsc' => 'required|unique:bankbranches,ifsc,NULL,id,deleted_at,NULL',
            ])->validate();

            $bank_branch = new Bankbranch();
            $bank_branch->bank_id       = $request->bank_id;
            $bank_branch->branch      =  $request->branch;
            $bank_branch->ifsc      =  $request->ifsc;
            $bank_branch->created_by = 0;
            $bank_branch->updated_by = 0;
          if ($bank_branch->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

   
    public function show(Bankbranch $bank_branch,$id)
    {
        $bank=Bank::all();
        $bank_branch=Bankbranch::find($id);
        return view('admin.master.bank_branch.show',compact('bank_branch','bank'));
    }

    
    public function edit(Bankbranch $bank_branch,$id)
    {
        $bank_branch=Bankbranch::find($id);
        $bank=Bank::all();

        return view('admin.master.bank_branch.edit',compact('bank_branch','bank'));
    }

    
    public function update(Request $request, Bankbranch $bank_branch,$id)
    {
        $bank_branch=Bankbranch::find($id);
        $validator = Validator::make($request->all(), [
            'bank_id' => 'required',
                'branch' => 'required|unique:bankbranches,branch,'.$id.',id,deleted_at,NULL,bank_id,'.$request->bank_id,
                'ifsc' => 'required|unique:bankbranches,ifsc,'.$id.',id,deleted_at,NULL',
           
        ])->validate();
        $bank_branch->bank_id       = $request->bank_id;
            $bank_branch->branch      =  $request->branch;
            $bank_branch->ifsc      =  $request->ifsc;
            $bank_branch->created_by = 0;
            $bank_branch->updated_by = 0;
      if ($bank_branch->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    
    public function destroy(Bankbranch $bank_branch,$id)
    { 
        $bank_branch=Bankbranch::find($id);
        if ($bank_branch->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }

    public function import()
    {
       return view('admin.master.bank_branch.index');
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

                    $name=$filesop[1];   echo "</br>";
                    $bank_name=$filesop[2];   echo "</br>";
                    $ifsc=$filesop[3];   echo "</br>";

                    $bank_name = str_replace(' ', '', $bank_name);
                    $banks=Bank::whereRaw("REPLACE(`name`, ' ' ,'') = '".$bank_name."'")->first();

                    $bank_id = @$banks->id;
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=Bankbranch::whereRaw("REPLACE(`branch`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0 && $banks != '')
                    {
                        $bank_branch = new Bankbranch();

                        $bank_branch->bank_id       = $bank_id;
                        $bank_branch->branch      =  $name;
                        $bank_branch->ifsc      =  $ifsc;
                        $bank_branch->created_by = 0;
                        $bank_branch->updated_by = 0;

                        $bank_branch->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Bank Branch Imported successfully');    
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
