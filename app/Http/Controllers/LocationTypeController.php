<?php

namespace App\Http\Controllers;

use App\Models\LocationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LocationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location_type=LocationType::all();
        return view('admin.master.location_type.view',compact('location_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.location_type.add');
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
            'name' => 'required|unique:location_types,name,NULL,id,deleted_at,NULL',
         ])->validate();

        $location_type = new LocationType();
        $location_type->name       = $request->name;
        $location_type->remark       = $request->remark;
        $location_type->created_by = 0;
        if ($location_type->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function show(LocationType $locationType,$id)
    {
        $location_type=LocationType::find($id);
        return view('admin.master.location_type.show',compact('location_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationType $locationType,$id)
    {
        $location_type=LocationType::find($id);
        return view('admin.master.location_type.edit',compact('location_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationType $locationType,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:location_types,name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        $location_type = LocationType::find($id);
        $location_type->name       = $request->name;
        $location_type->remark       = $request->remark;
        $location_type->updated_by = 0;
        if ($location_type->save()) {
                return Redirect::back()->with('success', 'Updated  Successfully');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationType  $locationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationType $locationType,$id)
    {
        $location_type = LocationType::find($id);
        if ($location_type->delete()) {
            return Redirect::back()->with('success', 'Deleted  Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.location_type.index');
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
                    $name_duplicate=LocationType::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $location_type =new LocationType();

                        $location_type->name = $name;
                        $location_type->created_by = 0;
                        $location_type->remark = $remark;

                        $location_type->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Location Types Imported successfully');    
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
