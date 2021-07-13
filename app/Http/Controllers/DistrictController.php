<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;

class DistrictController extends Controller
{
    public function index()
    {
        $district = District::all();
        return view('admin.master.district.view', compact('district'));
     }

    public function create()
    {
        $state = State::all();
        return view('admin.master.district.add', compact('state'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
            'name' => 'required|unique:districts,name,NULL,id,deleted_at,NULL,state_id,'.$request->state_id,
            ])->validate();

            $district = new District();
            $district->name       = $request->name;
            $district->state_id      = $request->state_id;
            $district->remark = $request->remark;
            $district->country_id = 1; /* Only India's States   */
            $district->created_by = 0;
            $district->updated_by = 0;

            if ($district->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
   }

    public function show(District $district,$id)
    {
        $district = District::find($id);
        return view('admin.master.district.show', compact('district'));
    }

    public function edit(District $district,$id)
    {
        $district = District::find($id);
        $state = State::all();
        return view('admin.master.district.edit', compact('district','state'));
    }

    public function update(Request $request, District $district,$id)
    {
        $district = District::find($id);
        $validator = Validator::make($request->all(), [
                'state_id' => 'required',
                'name' => 'required|unique:districts,name,' . $id . ',id,deleted_at,NULL,state_id,'.$request->state_id,
             ])->validate();

             $district->name       = $request->name;
             $district->state_id      = $request->state_id;
             $district->remark = $request->remark;
             $district->country_id = 1; /* Only India's States   */
             $district->created_by = 0;
             $district->updated_by = 0;
                 if ($district->save()) {
                     return Redirect::back()->with('success', 'Updated Successfully');
                 } else {
                     return Redirect::back()->with('failure', 'Something Went Wrong..!');
                 }
        
    }

    public function destroy(District $district,$id)
    {
          $district = District::find($id);
        if ($district->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {

       return view('admin.master.district.index');
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
                    $state_name=$filesop[2];   echo "</br>";
                    $remark=$filesop[3];   echo "</br>";

                    $state_name = str_replace(' ', '', $state_name);
                    $states=State::whereRaw("REPLACE(`name`, ' ' ,'') = '".$state_name."'")->first();

                    $state_id = @$states->id;
                    
                    $name = str_replace(' ', '', $name);
                    
                    $name_duplicate = District::where('name',$name)->count();

                    if($name_duplicate == 0 && $states != '')
                    {
                        $district =new District();

                        $district->name = $name;
                        $district->state_id = $state_id;
                        $district->country_id = 1;
                        $district->remark = $remark;

                        $district->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Districts Imported successfully');    
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
            $count = 0;
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    // echo $count;
                    $count++;
                    $data[] = array_combine($header, $row);
                    $state_id = $data[$count]['state_id'];
                    $state = State::where('name',$state_id)->first();
                    if($state == '')
                    {

                    }
                    else
                    {
                        $state_name = $state->id;
                    
                        $data[$count]['state_id'] = $state_name;
                    }
                    
                    
                    
            }
            // exit();
            // echo "<pre>"; print_r($data); exit();
            fclose($handle);
        }

        return $data;
    }

}
