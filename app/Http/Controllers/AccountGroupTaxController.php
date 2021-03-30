<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountGroupTax;
use App\Models\Tax;
use App\Models\AccountGroup;
use Illuminate\Support\Facades\Redirect;
class AccountGroupTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_group_tax = AccountGroupTax::all();
        return view('admin.master.account_group_tax.view',compact('account_group_tax'));
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
        return view('admin.master.account_group_tax.add',compact('tax','account_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new AccountGroupTax();

        $insert->account_group = $request->group;
        $insert->tax_id  = $request->tax_name;
        $insert->tax_value = $request->tax_rate;
        $insert->type = $request->type;

        $insert->save();

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
        $account_group_tax = AccountGroupTax::find($id);
        return view('admin.master.account_group_tax.show',compact('account_group_tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_group_tax = AccountGroupTax::find($id);
        $account_group = AccountGroup::all();
        $tax = Tax::all();
        return view('admin.master.account_group_tax.edit',compact('account_group_tax','account_group','tax'));
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
        $account_group_tax = AccountGroupTax::find($id);

        $account_group_tax->account_group = $request->group;
        $account_group_tax->tax_id  = $request->tax_name;
        $account_group_tax->tax_value = $request->tax_rate;
        $account_group_tax->type = $request->type;

        $account_group_tax->save();

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
        $account_group_tax = AccountGroupTax::find($id);
        $account_group_tax->delete();

        return Redirect::back()->with('success','Deleted Successfully');

    }

    public function import()
    {
       return view('admin.master.account_group_tax.index');
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

                    $account_group=$filesop[1];   echo "</br>";
                    $tax=$filesop[2];   echo "</br>";
                    $tax_value=$filesop[3];   echo "</br>";
                    $type=$filesop[4];   echo "</br>";

                    $account_group = str_replace(' ', '', $account_group);
                    $account_groups=AccountGroup::whereRaw("REPLACE(`name`, ' ' ,'') = '".$account_group."'")->first();

                    $tax = str_replace(' ', '', $tax);
                    $taxs=Tax::whereRaw("REPLACE(`name`, ' ' ,'') = '".$tax."'")->first();

                    $tax_id = @$taxs->id;
                    $account_group_id = @$account_groups->id;

                    if($account_groups != '' && $taxs != '')
                    {
                        $insert = new AccountGroupTax();

                        $insert->account_group = $account_group_id;
                        $insert->tax_id  = $tax_id;
                        $insert->tax_value = $tax_value;
                        $insert->type = $type;

                        $insert->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Account Group Taxes Imported successfully');    
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
