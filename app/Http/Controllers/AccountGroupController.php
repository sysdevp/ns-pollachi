<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountGroup;
use App\Models\Tax;
use Illuminate\Support\Facades\Redirect;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_group = AccountGroup::all();
        return view('admin.master.account_group.view',compact('account_group'));
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
        return view('admin.master.account_group.add',compact('account_group','tax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if($request->tax == 1)
        {
            $account_group = new AccountGroup;
            $account_group->name = $request->name;
            $account_group->under = $request->under;
            $account_group->tax = $request->tax;
            $account_group->name_of_tax = $request->tax_name;
            $account_group->rate_of_tax = $request->tax_rate;
            $account_group->type = $request->type;
            $account_group->save();
        }
        else
        {
            $account_group = new AccountGroup;
            $account_group->name = $request->name;
            $account_group->under = $request->under;
            $account_group->tax = $request->tax;
            $account_group->name_of_tax = NULL;
            $account_group->rate_of_tax = NULL;
            $account_group->type = NULL;
            $account_group->save();
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
        $account_group = AccountGroup::find($id);
        return view('admin.master.account_group.show',compact('account_group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_group = AccountGroup::find($id);
        $group = AccountGroup::all();
        $tax = Tax::all();

        return view('admin.master.account_group.edit',compact('account_group','group','tax'));
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
        

        if($request->tax == 1)
        {
            $account_group = AccountGroup::find($id);
            $account_group->name = $request->name;
            $account_group->under = $request->under;
            $account_group->tax = $request->tax;
            $account_group->name_of_tax = $request->tax_name;
            $account_group->rate_of_tax = $request->tax_rate;
            $account_group->type = $request->type;
            $account_group->save();
        }
        else
        {
            $account_group = AccountGroup::find($id);
            $account_group->name = $request->name;
            $account_group->under = $request->under;
            $account_group->tax = $request->tax;
            $account_group->name_of_tax = NULL;
            $account_group->rate_of_tax = NULL;
            $account_group->type = NULL;
            $account_group->save();
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
        $account_group = AccountGroup::find($id);

        $account_group->delete();
        return Redirect::back()->with('success','Deleted Successfully');

    }

    public function import()
    {
       return view('admin.master.account_group.index');
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
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=AccountGroup::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $account_group = new AccountGroup;
                        $account_group->name = $name;
                        $account_group->under = $under;
                        $account_group->name_of_tax = NULL;
                        $account_group->rate_of_tax = NULL;
                        $account_group->type = NULL;
                        $account_group->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Account Groups Imported successfully');    
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
