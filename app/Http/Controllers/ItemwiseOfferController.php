<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemwiseOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ItemwiseOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$city = City::all();
		$items = ItemwiseOffer::get();
		
        return view('admin.master.itemwiseoffer.view', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('admin.master.itemwiseoffer.add', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $itemwise_offer = new ItemwiseOffer();
        $itemwise_offer->offer_name       = $request->offer_name;
        $itemwise_offer->offer_code      = $request->code;
        $itemwise_offer->valid_from      = date("Y-m-d", strtotime($request->valid_from));
        $itemwise_offer->valid_to = date("Y-m-d", strtotime($request->valid_to));
        $itemwise_offer->buy_item_id = $request->buy_item_id;
        $itemwise_offer->buy_item_quantity = $request->buy_item_quantity;
        $itemwise_offer->get_item_id = $request->get_item_id;
        $itemwise_offer->get_item_quantity = $request->get_item_quantity;
        $itemwise_offer->remark = $request->remark;
        $itemwise_offer->created_by = 0;
        $itemwise_offer->updated_by = 0;

        if ($itemwise_offer->save()) {
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
    public function edit(ItemwiseOffer $itemwise_offer, $id)
    {
        $itemwise_offers = ItemwiseOffer::find($id);
        $items = Item::all();
        return view('admin.master.itemwiseoffer.edit', compact('itemwise_offers', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemwiseOffer $itemwise_offer, $id)
    {
        
        $itemwise_offer = ItemwiseOffer::find($id);
        $itemwise_offer->offer_name       = $request->offer_name;
        $itemwise_offer->offer_code      = $request->code;
        $itemwise_offer->valid_from      = date("Y-m-d", strtotime($request->valid_from));
        $itemwise_offer->valid_to = date("Y-m-d", strtotime($request->valid_to));
        $itemwise_offer->buy_item_id = $request->buy_item_id;
        $itemwise_offer->buy_item_quantity = $request->buy_item_quantity;
        $itemwise_offer->get_item_id = $request->get_item_id;
        $itemwise_offer->get_item_quantity = $request->get_item_quantity;
        $itemwise_offer->remark = $request->remark;
        $itemwise_offer->created_by = 0;
        $itemwise_offer->updated_by = 0;

        if ($itemwise_offer->save()) {
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
    public function destroy(ItemwiseOffer $city, $id)
    {
        $itemwise_offer = ItemwiseOffer::find($id);
        if ($itemwise_offer->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.itemwiseoffer.index');
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
                    $valid_from=$filesop[3];   echo "</br>";
                    $valid_to=$filesop[4];   echo "</br>";
                    $buy_item_name=$filesop[5];   echo "</br>";
                    $buy_item_quantity=$filesop[6];   echo "</br>";
                    $get_item_name=$filesop[7];   echo "</br>";
                    $get_item_quantity=$filesop[8];   echo "</br>";
                    $remark=$filesop[9];   echo "</br>";

                    $buy_item_name = str_replace(' ', '', $buy_item_name);
                    $buy_items=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$buy_item_name."'")->first();

                    $get_item_name = str_replace(' ', '', $get_item_name);
                    $get_items=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$get_item_name."'")->first();

                    $buy_item_id = @$buy_items->id;
                    $get_item_id = @$get_items->id;
                    
                    $name = str_replace(' ', '', $name);
                    $name_duplicate=ItemwiseOffer::whereRaw("REPLACE(`offer_name`, ' ' ,'') = '".$name."'")->count();

                    if($name_duplicate == 0 && $buy_items != '' && $get_items != '')
                    {
                        $itemwise_offer = new ItemwiseOffer();
                        $itemwise_offer->offer_name       = $name;
                        $itemwise_offer->offer_code      = $code;
                        $itemwise_offer->valid_from      = date("Y-m-d", strtotime($valid_from));
                        $itemwise_offer->valid_to = date("Y-m-d", strtotime($valid_to));
                        $itemwise_offer->buy_item_id = $buy_item_id;
                        $itemwise_offer->buy_item_quantity = $buy_item_quantity;
                        $itemwise_offer->get_item_id = $get_item_id;
                        $itemwise_offer->get_item_quantity = $get_item_quantity;
                        $itemwise_offer->remark = $remark;
                        $itemwise_offer->created_by = 0;
                        $itemwise_offer->updated_by = 0;

                        $itemwise_offer->save();
                        $total_count++;

                    }

                }
                $i++;


            }



        return Redirect::back()->with('success', $total_count.'     Item Wise Offers Imported successfully');    
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
