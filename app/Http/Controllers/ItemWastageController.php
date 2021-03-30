<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemWastage;
use App\Models\Location;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ItemWastageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$items = ItemWastage::get();
        return view('admin.master.item_wastage.view', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $locations = Location::all();
        $items = Item::all();
        $uoms = Uom::all();
        return view('admin.master.item_wastage.add', compact('locations','items','uoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $itemwastage = new ItemWastage();
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->entry_date      = date("Y-m-d", strtotime($request->entry_date));
        $itemwastage->item_id = $request->item_id;
        $itemwastage->quantity = $request->quantity;
        $itemwastage->uom_id = $request->uom_id;
        $itemwastage->remark = $request->remark;
        $itemwastage->created_by = 0;
        $itemwastage->updated_by = 0;

        if ($itemwastage->save()) {
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemWastage $itemwise_offer, $id)
    {
        $item_wastage = ItemWastage::find($id);
        $locations = Location::all();
        $items = Item::all();
        $uoms = Uom::all();
        
        return view('admin.master.item_wastage.edit', compact('item_wastage', 'items','locations','uoms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemWastage $itemwise_offer, $id)
    {
        
        $itemwastage = ItemWastage::find($id);
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->entry_date      = date("Y-m-d", strtotime($request->entry_date));
        $itemwastage->item_id = $request->item_id;
        $itemwastage->quantity = $request->_quantity;
        $itemwastage->remark = $request->remark;
        $itemwastage->created_by = 0;
        $itemwastage->updated_by = 0;

        if ($itemwastage->save()) {
            return Redirect::back()->with('success', 'Successfully Updated');
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
    public function destroy(ItemWastage $item_wastage, $id)
    {
        $itemwise_offer = ItemWastage::find($id);
        if ($itemwise_offer->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.item_wastage.index');
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

                    $entry_date=$filesop[1];   echo "</br>";
                    $location_name=$filesop[2];   echo "</br>";
                    $item_name=$filesop[3];   echo "</br>";
                    $quantity=$filesop[4];   echo "</br>";
                    $remark=$filesop[5];   echo "</br>";
                    $uom_name=$filesop[6];   echo "</br>";

                    $location_name = str_replace(' ', '', $location_name);
                    $locations=Location::whereRaw("REPLACE(`name`, ' ' ,'') = '".$location_name."'")->first();

                    $item_name = str_replace(' ', '', $item_name);
                    $items=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$item_name."'")->first();

                    $uom_name = str_replace(' ', '', $uom_name);
                    $uoms=Uom::whereRaw("REPLACE(`name`, ' ' ,'') = '".$uom_name."'")->first();

                    $location_id = @$locations->id;
                    $item_id = @$items->id;
                    $uom_id = @$uoms->id;

                        $itemwastage = new ItemWastage();
                        $itemwastage->location_id      = $location_id;
                        $itemwastage->entry_date      = date("Y-m-d", strtotime($entry_date));
                        $itemwastage->item_id = $item_id;
                        $itemwastage->quantity = $quantity;
                        $itemwastage->uom_id = $uom_id;
                        $itemwastage->remark = $remark;
                        $itemwastage->created_by = 0;
                        $itemwastage->updated_by = 0;

                        $itemwastage->save();
                        $total_count++;

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Item Wastages Imported successfully');    
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
