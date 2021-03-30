<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation=Designation::all();
        return view('admin.master.designation.view',compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.designation.add');
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
            'name' => 'required|unique:designations,name,NULL,id,deleted_at,NULL',
            'short_name' => 'required|unique:designations,short_name,NULL,id,deleted_at,NULL',
         ])->validate();

        $designation = new Designation();
        $designation->name       = $request->name;
        $designation->short_name       = $request->short_name;
        $designation->remark      =  $request->remark;
        $designation->created_by = 0;
        $designation->updated_by = 0;
      if ($designation->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation,$id)
    {
        $designation=Designation::find($id);
        return view('admin.master.designation.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation,$id)
    {
        $designation=Designation::find($id);
        return view('admin.master.designation.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation,$id)
    {
        $designation = Designation::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:designations,name,'.$id.',id,deleted_at,NULL',
            'short_name' => 'required|unique:designations,short_name,'.$id.',id,deleted_at,NULL',
         ])->validate();

        
        $designation->name       = $request->name;
        $designation->short_name       = $request->short_name;
        $designation->remark      =  $request->remark;
        $designation->created_by = 0;
        $designation->updated_by = 0;
      if ($designation->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation,$id)
    {
        $designation = Designation::find($id);
        if ($designation->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.designation.index');
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
                    $short_name=$filesop[2];   echo "</br>";
                    $remark=$filesop[3];   echo "</br>";
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=Designation::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                        $designation = new Designation();
                        $designation->name       = $name;
                        $designation->short_name       = $short_name;
                        $designation->remark      =  $remark;
                        $designation->created_by = 0;
                        $designation->updated_by = 0;

                        $designation->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Roles Imported successfully');    
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
