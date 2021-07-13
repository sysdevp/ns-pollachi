<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Response; // don't forget or use response()

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::all();
        return view('admin.master.offers.view',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $items = Item::all();
        $offer_types = ['date','day','time'];
        return view('admin.master.offers.add',compact('category','offer_types','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $out = array_values($request->items);
        $myJSON = json_encode($out);
        $myJSONDateRange = json_encode($request->day_range_offers);


        $offers = new Offers();
        $offers->offers_category_id = $request->parent_id;
        $offers->offer_name = $request->name;
        $offers->item_id = $myJSON;
        $offers->offer_type = $request->offer_type;
        $offers->valid_from = date('Y-m-d',strtotime($request->valid_from));
        $offers->valid_to = date('Y-m-d',strtotime($request->valid_to));
        $offers->day_range_offers = $myJSONDateRange;
        $offers->variable =  $request->variable;
        if ($request->offer_type == "time") {
            $offers->from_time = $request->from_time;
            $offers->to_time = $request->to_time;
        }
        if ($request->variable == "percentage") {
            $offers->percentage =  $request->value;
        } else {
            $offers->fixed_amount =  $request->value;
        }
        $offers->comments =  $request->comments;
        $result = $offers->save();

        if ($result == true) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(Offers $offers, $id)
    {
        $offers = Offers::find($id);
        return view('admin.master.offers.show',compact('offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offers $offers, $id)
    {
        $offers = Offers::find($id);
        $category = Category::all();
        $offer_types = ['date','day','time'];
        return view('admin.master.offers.edit',compact('offers','category','offer_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offers $offers, $id)
    {
        $offers = Offers::find($id);
                // $validator = Validator::make($request->all(), [
                //     'name' => 'required|unique:giftvouchers,name,'.$id.',id,deleted_at,NULL',
                //     'code' => 'required|unique:giftvouchers,code,'.$id.',id,deleted_at,NULL',
                //     'value' => 'required',
                //     'valid_from' => 'required',
                //     'valid_to' => 'required',
                    
                //  ])->validate();
                // $offers->offers_category_id = $request->parent_id;
                $offers->offer_name = $request->name;
                // $offers->item_id = $myJSON;
                $offers->offer_type = $request->offer_type;
                $offers->valid_from = date('Y-m-d',strtotime($request->valid_from));
                $offers->valid_to = date('Y-m-d',strtotime($request->valid_to));
                // $offers->day_range_offers = $myJSONDateRange;
                $offers->variable =  $request->variable;
                if ($request->offer_type == "time") {
                    $offers->from_time = $request->from_time;
                    $offers->to_time = $request->to_time;
                }
                if ($request->variable == "percentage") {
                    $offers->percentage =  $request->value;
                } else {
                    $offers->fixed_amount =  $request->value;
                }
                $offers->comments =  $request->comments;
              if ($offers->save()) {
                    return Redirect::back()->with('success', 'Updated Successfully');
                } else {
                    return Redirect::back()->with('failure', 'Something Went Wrong..!');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offers $offers, $id)
    {
        $offers = Offers::find($id);
        if ($offers->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.offers.index');
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
           // exit();

        $file = storage_path('file/'.$profile_name);

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Offers::firstOrCreate($customerArr[$i]);
        }

        return Redirect::back()->with('success', 'Uploaded');    
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

    public function getItem(Category $category_id)
    {
        $items = Item::select('id','name')->where('category_id','16')->get();
        return Response::json($items);
    }
}
