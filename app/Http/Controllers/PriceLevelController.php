<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PriceLevel;
use Illuminate\Support\Facades\Redirect;

class PriceLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price_level = PriceLevel::all();
        return view('admin.master.price_level.view',compact('price_level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.price_level.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price_level = new PriceLevel();

        $price_level->level = $request->level;
        $price_level->type = $request->type;
        $price_level->value = $request->value;

        $price_level->save();

        return Redirect::back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price_level = PriceLevel::find($id);
        return view('admin.master.price_level.show',compact('price_level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price_level = PriceLevel::find($id);
        return view('admin.master.price_level.edit',compact('price_level'));
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
        $price_level = PriceLevel::find($id);

        $price_level->level = $request->level;
        $price_level->type = $request->type;
        $price_level->value = $request->value;

        $price_level->save();

        return Redirect::back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price_level = PriceLevel::find($id);
        $price_level->delete();
        return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function import()
    {
       return view('admin.master.price_level.index');
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
                    $type=$filesop[2];   echo "</br>";
                    $value=$filesop[3];   echo "</br>";

                    $name = str_replace(' ', '', $name);
                    $name_duplicate=PriceLevel::whereRaw("REPLACE(`level`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0)
                    {
                         $price_level = new PriceLevel();

                        $price_level->level = $name;
                        $price_level->type = $type;
                        $price_level->value = $value;

                        $price_level->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Price Levels Imported successfully');    
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
