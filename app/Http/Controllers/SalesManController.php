<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesMan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SalesManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_man = SalesMan::all();
        return view('admin.master.sales_man.view',compact('sales_man'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.sales_man.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = new SalesMan();

        $insert->name = $request->name;
        $insert->code = $request->code;
        $insert->address = $request->address;
        $insert->phone_no = $request->phone_no;
        $insert->email = $request->email;

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
        $sales_man = SalesMan::find($id);

        return view('admin.master.sales_man.show',compact('sales_man'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales_man = SalesMan::find($id);

        return view('admin.master.sales_man.edit',compact('sales_man'));

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
        $sales_man = SalesMan::find($id);

        $sales_man->name = $request->name;
        $sales_man->code = $request->code;
        $sales_man->address = $request->address;
        $sales_man->phone_no = $request->phone_no;
        $sales_man->email = $request->email;

        $sales_man->save();

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
        $delete = SalesMan::find($id);
        $delete->delete();

        return Redirect::back()->with('success','Deleted Successfully');
    }

    public function import()
    {
       return view('admin.master.sales_man.index');
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
                    $code=$filesop[2];   echo "</br>";
                    $address=$filesop[3];   echo "</br>";
                    $phone_no=$filesop[4];   echo "</br>";
                    $email=$filesop[5];   echo "</br>";
                    
                    $code = str_replace(' ', '', $code);
                    $email = str_replace(' ', '', $email);
                    $code_duplicate=SalesMan::whereRaw("REPLACE(`code`, ' ' ,'') = '".$code."'")->count();
                    $email_duplicate=SalesMan::whereRaw("REPLACE(`email`, ' ' ,'') = '".$code."'")->count();

                    if($code_duplicate == 0 && $email_duplicate == 0)
                    {
                        $insert = new SalesMan();

                        $insert->name = $name;
                        $insert->code = $code;
                        $insert->address = $address;
                        $insert->phone_no = $phone_no;
                        $insert->email = $email;

                        $insert->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Sales Men Imported successfully');    
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
