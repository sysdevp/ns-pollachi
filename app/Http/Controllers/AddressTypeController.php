<?php

namespace App\Http\Controllers;

use App\Models\AddressType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AddressTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address_type=AddressType::all();
        return view('admin.master.address_type.view',compact('address_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.address_type.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:address_types,name,NULL,id,deleted_at,NULL',
         ])->validate();

        $address_type = new AddressType();
        $address_type->name       = $request->name;
        $address_type->remark       = $request->remark;
        $address_type->created_by = 0;
        if ($address_type->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function show(AddressType $addressType,$id)
    {
        $address_type=AddressType::find($id);
        return view('admin.master.address_type.show',compact('address_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressType $addressType,$id)
    {
         $address_type=AddressType::find($id);
        return view('admin.master.address_type.edit',compact('address_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressType $addressType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:address_types,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $address_type = AddressType::find($id);
        $address_type->name       = $request->name;
        $address_type->remark       = $request->remark;
        $address_type->updated_by = 0;
        if ($address_type->save()) {
                return Redirect::back()->with('success', 'Updated Successfully');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressType $addressType,$id)
    {
        $address_type = AddressType::find($id);
        if ($address_type->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.address_type.index');
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
                    $name_duplicate = AddressType::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $address_type =new AddressType();

                        $address_type->name = $name;
                        $address_type->created_by = 0;
                        $address_type->remark = $remark;

                        $address_type->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Address Types Imported successfully');    
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
