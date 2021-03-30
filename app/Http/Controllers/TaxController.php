<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\ItemTaxDetails;
use Illuminate\Support\Facades\Redirect;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = Tax::all();
        return view('admin.master.tax.view',compact('tax'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.tax.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tax = new Tax();
        $tax_details = Tax::all();
        $name = strtolower($request->name);
        foreach ($tax_details as $key => $value) {
            $name_data = strtolower($value->name);
            if($name == $name_data)
            {
                return Redirect::back()->with('success', 'Name Already Taken');
            }
        }
        

        $tax->name = $request->name;
        $tax->remark = $request->remark;

        $tax->save();

        return Redirect::back()->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tax = Tax::find($id);
        return view('admin.master.tax.show',compact('tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tax = Tax::find($id);
        return view('admin.master.tax.edit',compact('tax'));
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
        $tax = Tax::find($id);

        $tax_details = Tax::all();
        $name = strtolower($request->name);

        foreach ($tax_details as $key => $value) {
            $name_data = strtolower($value->name);
            if($name == $name_data && $value->remark == $request->remark)
            {

                return Redirect::back()->with('success', 'Name Already Taken');
            }
        }

        $tax->name = $request->name;
        $tax->remark = $request->remark;

        $tax->save();

        return Redirect::back()->with('success','Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tax_master = ItemTaxDetails::where('tax_master_id',$id)->get();
       $count = count($tax_master);
       if($count == 0)
       {
        $tax = Tax::find($id);
        $tax->delete();
        return Redirect::back()->with('success','Deleted Successfuly');
       }
       else 
       {
        return Redirect::back()->with('success',"You Are Not Allowed To Delete This Tax");
       } 
       

       $delete_from_tax_details = ItemTaxDetails::where('tax_master_id',$id);
       $delete_from_tax_details->delete();

       return Redirect::back()->with('success','Deleted Successfuly');
    }

    public function import()
    {
       return view('admin.master.tax.index');
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
                    $remark=$filesop[2];   echo "</br>";
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=Tax::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $tax =new Tax();

                        $tax->name = $name;
                        $tax->remark = $remark;

                        $tax->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Taxes Imported successfully');    
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
