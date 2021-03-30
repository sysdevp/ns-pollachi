<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalesVoucherType;
use Illuminate\Support\Facades\Redirect;

class SalesVoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher_data = SalesVoucherType::all();
        return view('admin.master.sales-voucher-type.view',compact('voucher_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.sales-voucher-type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher_data = new SalesVoucherType();

        $voucher_data->name = $request->name;
        $voucher_data->type = $request->type;
        $voucher_data->prefix = $request->prefix;
        $voucher_data->suffix = $request->suffix;
        $voucher_data->starting_no = $request->starting;
        $voucher_data->updated_no = $request->starting;
        $voucher_data->no_digits = $request->digits;

        $voucher_data->save();

        return Redirect::back()->with('success','Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher_data = SalesVoucherType::find($id);
        return view('admin.master.sales-voucher-type.show',compact('voucher_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher_data = SalesVoucherType::find($id);
        return view('admin.master.sales-voucher-type.edit',compact('voucher_data'));
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
        $voucher_data = SalesVoucherType::find($id);

        $voucher_data->name = $request->name;
        $voucher_data->type = $request->type;
        $voucher_data->prefix = $request->prefix;
        $voucher_data->suffix = $request->suffix;
        $voucher_data->starting_no = $request->starting;
        $voucher_data->updated_no = $request->starting;
        $voucher_data->no_digits = $request->digits;

        $voucher_data->save();

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
        $voucher_data = SalesVoucherType::find($id);

        $voucher_data->delete();
        return Redirect::back()->with('success','Deleted Successfully');
    }

    public function import()
    {
       return view('admin.master.sales-voucher-type.index');
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
           // exit();

        $file = storage_path('file/'.$profile_name);

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {
            SalesVoucherType::firstOrCreate($customerArr[$i]);
        }

        return Redirect::back()->with('success', 'Uploaded');    
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
