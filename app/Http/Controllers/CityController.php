<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$city = City::all();
		$city = City::with(['state', 'district'])->get();
		
        return view('admin.master.city.view', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::all();
        $district = array();
        return view('admin.master.city.add', compact('state', 'district'));
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
            'state_id' => 'required',
            'district_id' => 'required',
            'name' => 'required|unique:cities,name,NULL,id,deleted_at,NULL,state_id,' . $request->state_id . ',district_id,' . $request->district_id
        ])->validate();



        $city = new City();
        $city->name       = $request->name;
        $city->state_id      = $request->state_id;
        $city->district_id      = $request->district_id;
        $city->remark = $request->remark;
        $city->country_id = 1; /* Only India's States   */
        $city->created_by = 0;
        $city->updated_by = 0;

        if ($city->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city, $id)
    {
        $city = City::find($id);
        return view('admin.master.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, $id)
    {
        $city = City::find($id);
        $state = State::all();
        return view('admin.master.city.edit', compact('state', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, $id)
    {
        $city = City::find($id);
        $validator = Validator::make($request->all(), [
            'state_id' => 'required',
            'district_id' => 'required',
            'name' => 'required|unique:cities,name,' . $id . ',id,deleted_at,NULL,state_id,' . $request->state_id . ',district_id,' . $request->district_id
        ])->validate();

        $city->name       = $request->name;
        $city->state_id      = $request->state_id;
        $city->district_id      = $request->district_id;
        $city->remark = $request->remark;
        $city->country_id = 1; /* Only India's States   */
        $city->created_by = 0;
        $city->updated_by = 0;

        if ($city->save()) {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city, $id)
    {
        $city = City::find($id);
        if ($city->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.city.index');
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
                    $district_name=$filesop[3];   echo "</br>";
                    $remark=$filesop[4];   echo "</br>";

                    $state_name = str_replace(' ', '', $state_name);
                    $district_name = str_replace(' ', '', $district_name);

                    $states=State::whereRaw("REPLACE(`name`, ' ' ,'') = '".$state_name."'")->first();
                    $districts=District::whereRaw("REPLACE(`name`, ' ' ,'') = '".$district_name."'")->first();
                    $state_id = @$states->id;
                    $district_id = @$districts->id;
                    
                    $name = str_replace(' ', '', $name);
                    
                    $name_duplicate = City::where('name',$name)->count();

                    if($name_duplicate == 0 && $states != '' && $districts != '')
                    {
                        $city =new City();

                        $city->name = $name;
                        $city->state_id = $state_id;
                        $city->district_id = $district_id;
                        $city->country_id = 1;
                        $city->remark = $remark;
                        $city->created_by = 0;
                        $city->updated_by = 0;

                        $city->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Cities Imported successfully');    
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
