<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountHead;
use App\Models\AccountGroup;
use App\Models\Tax;
use Illuminate\Support\Facades\Redirect;

class AccountHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_head = AccountHead::all();
        return view('admin.master.account_head.view',compact('account_head'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tax = Tax::all();
        $account_group = AccountGroup::all();
        return view('admin.master.account_head.add',compact('account_group','tax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // echo $request->check; die();
            if($request->has('check'))
            {
                $account_head = new AccountHead;
                $account_head->name = $request->name;
                $account_head->under = $request->under;
                $account_head->opening_balance = $request->balance;
                $account_head->dr_or_cr = $request->dr_or_cr;
                $account_head->status = 1;
                $account_head->save();
            } 
            else
            {
                $account_head = new AccountHead;
                $account_head->name = $request->name;
                $account_head->under = $request->under;
                $account_head->opening_balance = $request->balance;
                $account_head->dr_or_cr = $request->dr_or_cr;
                $account_head->status = 0;
                $account_head->save();
            }  
            
        

        return Redirect::back()->with('success','Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account_head = AccountHead::find($id);
        return view('admin.master.account_head.show',compact('account_head'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_head = AccountHead::find($id);
        $group = AccountGroup::all();
        $tax = Tax::all();

        return view('admin.master.account_head.edit',compact('account_head','group','tax'));
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

            if($request->has('check'))
            {
                $account_head = AccountHead::find($id);
                $account_head->name = $request->name;
                $account_head->under = $request->under;
                $account_head->opening_balance = $request->balance;
                $account_head->dr_or_cr = $request->dr_or_cr;
                $account_head->status = 1;
                $account_head->save();
            } 
            else
            {
                $account_head = AccountHead::find($id); 
                $account_head->name = $request->name;
                $account_head->under = $request->under;
                $account_head->opening_balance = $request->balance;
                $account_head->dr_or_cr = $request->dr_or_cr;
                $account_head->status = 0;
                $account_head->save();
            }
        

        return Redirect::back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account_head = AccountHead::find($id);

        $account_head->delete();
        return Redirect::back()->with('success','Deleted Successfully');
    }

    public function import()
    {
       return view('admin.master.account_head.index');
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
                    $under=$filesop[2];   echo "</br>";
                    $opening_balance=$filesop[3];   echo "</br>";
                    $dr_or_cr=$filesop[4];   echo "</br>";+
                    $status=$filesop[5];   echo "</br>";
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=AccountHead::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $account_head = new AccountHead;
                        $account_head->name = $name;
                        $account_head->under = $under;
                        $account_head->opening_balance = $opening_balance;
                        $account_head->dr_or_cr = $dr_or_cr;
                        $account_head->status = $status;
                        $account_head->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Account Heads Imported successfully');    
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
