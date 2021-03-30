<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Ho_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Ho_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location=Ho_details::all();
        return view('admin.master.ho_details.view',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state=State::all();
        //$location_type=LocationType::all();
        return view('admin.master.ho_details.add',compact('state'));
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
            'gst_number' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'postal_code' => 'required',
        'name' => 'required|unique:ho_details,name,NULL,id,deleted_at,NULL,gst_number,'.$request->gst_number,
            ])->validate();
            $location = new Ho_details();
            $location->name       = $request->name;
            $location->gst_number      = $request->gst_number;
            $location->address_line_1      = $request->address_line_1;
            $location->address_line_2      = $request->address_line_2;
            $location->land_mark      = $request->land_mark;
            $location->country_id      = 1;
            $location->state_id      = $request->state_id;
            $location->district_id      = $request->district_id;
            $location->city_id      = $request->city_id;
            $location->postal_code      = $request->postal_code;
            $location->country_id = 1; /* Only India's States   */
            $location->created_by = 0;
            $location->updated_by = 0;

            if ($location->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location,$id)
    {
        $location=Ho_details::find($id);
        return view('admin.master.ho_details.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location,$id)
    {
        $state=State::all();
        $location=Ho_details::find($id);
        return view('admin.master.ho_details.edit',compact('state','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location,$id)
    {
        $location = Ho_details::find($id);
        $validator = Validator::make($request->all(), [
            'gst_number' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'postal_code' => 'required',
            'name' => 'required|unique:ho_details,name,'.$id.',id,deleted_at,NULL,gst_number,'.$request->gst_number,
            ])->validate();

            
            $location->name       = $request->name;
            $location->gst_number      = $request->gst_number;
            $location->address_line_1      = $request->address_line_1;
            $location->address_line_2      = $request->address_line_2;
            $location->land_mark      = $request->land_mark;
            $location->state_id      = $request->state_id;
            $location->district_id      = $request->district_id;
            $location->city_id      = $request->city_id;
            $location->postal_code      = $request->postal_code;
            $location->created_by = 0;
            $location->updated_by = 0;

            if ($location->save()) {
                return Redirect::back()->with('success', 'Successfully Updated');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location,$id)
    {
        $location = Ho_details::find($id);
        if ($location->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.ho_details.index');
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
                $gst_number=$filesop[2];   echo "</br>";
                $address_line_1=$filesop[3];   echo "</br>";
                $address_line_2=$filesop[4];   echo "</br>";
                $land_mark=$filesop[5];   echo "</br>";
                $state_name=$filesop[6];   echo "</br>";
                $district_name=$filesop[7];   echo "</br>";
                $city_name=$filesop[8];   echo "</br>";
                $postal_code=$filesop[9];   echo "</br>";

                $state_name = str_replace(' ', '', $state_name);
                $district_name = str_replace(' ', '', $district_name);
                $city_name = str_replace(' ', '', $city_name);

                $states=State::whereRaw("REPLACE(`name`, ' ' ,'') = '".$state_name."'")->first();
                $districts=District::whereRaw("REPLACE(`name`, ' ' ,'') = '".$district_name."'")->first();
                $cities=City::whereRaw("REPLACE(`name`, ' ' ,'') = '".$city_name."'")->first();

                $state_id = @$states->id;
                $district_id = @$districts->id;
                $city_id = @$cities->id;
                
                $name = str_replace(' ', '', $name);
                $name_duplicate=Ho_details::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->count();

                if($name_duplicate == 0 && $states != '' && $districts != '' && $cities != '')
                {
                    $ho_details =new Ho_details();

                    $ho_details->name       = $name;
                    $ho_details->gst_number      = $gst_number;
                    $ho_details->address_line_1      = $address_line_1;
                    $ho_details->address_line_2      = $address_line_2;
                    $ho_details->land_mark      = $land_mark;
                    $ho_details->country_id      = 1;
                    $ho_details->state_id      = $state_id;
                    $ho_details->district_id      = $district_id;
                    $ho_details->city_id      = $city_id;
                    $ho_details->postal_code      = $postal_code;
                    $ho_details->country_id = 1; /* Only India's States   */
                    $ho_details->created_by = 0;
                    $ho_details->updated_by = 0;

                    $ho_details->save();
                    $total_count++;

                }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Head Offices Imported successfully');    
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
