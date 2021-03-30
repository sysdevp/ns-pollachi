<?php

namespace App\Http\Controllers;

use App\CategoryName;
use App\Http\Requests\ItemRequest;
use App\Model\Category;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Category_one;
use App\Models\Category_three;
use App\Models\Category_two;
use App\Models\Item;
use App\Models\Tax;
use App\Models\ItemBracodeDetails;
use App\Models\ItemTaxDetails;
use App\Models\Language;
use App\Models\Uom;
use App\Models\Location;
use App\Models\UomFactorConvertionForItem;
use Carbon\Carbon;
use App\Models\OpeningStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public $language;
    public $language_1;
    public $language_2;
    public $language_3;
    public $category;
    public $category_1;
    public $category_2;
    public $category_3;

    public function __construct()
    {
        $this->language = Language::all();
        $this->category = CategoryName::all();
        $this->language_1 = isset($this->language[0]->language_1) && !empty($this->language[0]->language_1) ? $this->language[0]->language_1 : "Language 1 ";
        $this->language_2 = isset($this->language[0]->language_2) && !empty($this->language[0]->language_2) ? $this->language[0]->language_2 : "Language 2 ";
        $this->language_3 = isset($this->language[0]->language_3) && !empty($this->language[0]->language_3) ? $this->language[0]->language_3 : "Language 3 ";

        $this->category_1 = isset($this->category[0]->category_1) && !empty($this->category[0]->category_1) ? $this->category[0]->category_1 : "Category 1 ";
        $this->category_2 = isset($this->category[0]->category_2) && !empty($this->category[0]->category_2) ? $this->category[0]->category_2 : "Category 2 ";
        $this->category_3 = isset($this->category[0]->category_3) && !empty($this->category[0]->category_3) ? $this->category[0]->category_3 : "Category 3 ";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;
        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $item = Item::with('category', 'uom', 'bulk_item')->get();
        //$item=Item::all();
        return view('admin.master.item.view', compact('item', 'language_1', 'language_2', 'language_3', 'category_1', 'category_2', 'category_3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;
        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $category = Category::orderBy('name', 'asc')->get();
        $brand = Brand::orderBy('name', 'asc')->get();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        $uom = Uom::all();
        $tax = Tax::all();
        $tax_count = count($tax);
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();
        return view('admin.master.item.add', compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3', 'category_1', 'category_2', 'category_3','tax','date','location','tax_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->item_type = $request->item_type;
        if ($request->item_type == "Repack") {
            $item->bulk_item_id = $request->bulk_item_id;
        }

        if ($request->item_type == "Parent") {
            $item->child_item_id = $request->child_item_id;
            $item->child_unit = $request->child_unit;
            $item->uom_for_repack_item = $request->uom_for_repack_item;
        }

        if ($request->weight_in_grams != "" && $request->weight_in_grams > 0) {
            $item->weight_in_grams = $request->weight_in_grams;
            $item->weight_in_kg = $request->weight_in_grams / 1000;
        } else {
            $item->weight_in_grams = 0;
            $item->weight_in_kg = 0;
        }


        $item->code = $request->code;
        $item->supplier_id = $request->supplier_id;
        $item->category_id = $request->category_id;
        $item->brand_id = $request->brand_id;
        $item->print_name_in_english = $request->print_name_in_english;
        $item->print_name_in_language_1 = $request->print_name_in_language_1;
        $item->print_name_in_language_2 = $request->print_name_in_language_2;
        $item->print_name_in_language_3 = $request->print_name_in_language_3;
        //$item->ptc = $request->ptc;
        // $item->barcode = $request->barcode;
        $item->mrp = $request->mrp;
        $item->hsn = $request->hsn;
        $item->default_selling_price = $request->default_selling_price;
        $item->uom_id = $request->uom_id;
        $item->is_expiry_date = $request->is_expiry_date;
        $item->is_machine_weight_applicable = $request->is_machine_weight_applicable;
        $item->is_minimum_sales_qty_applicable = $request->is_minimum_sales_qty_applicable;
        $item->opening_count = $request->opening_cnt;

        if (!empty($request->expiry_date)) {
            $item->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        }

        if ($request->is_minimum_sales_qty_applicable == 1) {
            $item->minimum_sales_price = $request->minimum_sales_price;
            $item->minimum_sales_qty = $request->minimum_sales_qty;
            $item->uom_for_minimum_sales_item = $request->uom_for_minimum_sales_item;
        }

        $item->created_by = 0;
        $now = Carbon::now()->toDateTimeString();
        if ($item->save()) {
            /* Store Barcode Details Start Here  */
            $batch_barcode_insert = [];
            if ($request->has('barcode')) {
                foreach ($request->barcode as $barcode_key => $barcode_value) {
                    if ($barcode_value != "") {
                        $data = [
                            'item_id' => $item->id,
                            'barcode' => $barcode_value,
                            'created_by' => 0,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                        $batch_barcode_insert[] = $data;
                    }
                }
            }

            /* Store Barcode Details End Here  */

            $item_id = $item->id;


            /*Tax Details Start Here*/
            $count = $request->count;
            $tax = Tax::all();

            for($i=0;$i<$count;$i++)
            {
                foreach ($tax as $key => $value) 
                {
                    $str_json = json_encode($value->name); //array to json string conversion
                    $tax_name = str_replace('"', '', $str_json);
                    $value_name = $tax_name.'_id';
                    

                       $tax_details = new ItemTaxDetails;
                       $tax_details->item_id =$item_id;
                       $tax_details->tax_master_id =$request->$tax_name[$i];
                       $tax_details->value =$request->$value_name[$i];
                       $date = date("Y-m-d", strtotime($request->valid_from[$i]));
                       $tax_details->valid_from =$date;

                       $tax_details->save();

                    }
                    //break;
                }

                $opening_count = $request->opening_cnt;

                for ($j=0; $j <= $opening_count; $j++) 
                { 
                    $openings = new OpeningStock();

                    $openings->item_id = $item_id;
                    $openings->location = $request->location[$j];
                    $openings->batch_no = $request->batch_no[$j];
                    $openings->opening_qty = $request->quantity[$j];
                    $openings->rate = $request->rate[$j];
                    $openings->amount = $request->amount[$j];
                    $openings->applicable_date = $request->applicable_date[$j];
                    $openings->black_or_white = $request->black_or_white[$j];

                    $openings->save();

                }

                /*Tax Details End Here*/
            
            // if ($request->has('igst')) {

            //     $batch_insert = [];
            //     foreach ($request->igst as $tax_key => $tax_value) {
            //         if ($tax_value != "") {
            //             $data = [
            //                 'item_id' => $item->id,
            //                 'cgst' => isset($request->igst[$tax_key]) ? $request->igst[$tax_key] / 2 : "",
            //                 'igst' => isset($request->igst[$tax_key]) ? $request->igst[$tax_key] : "",
            //                 'sgst' => isset($request->igst[$tax_key]) ? $request->igst[$tax_key] / 2 : "",
            //                 'valid_from' => isset($request->valid_from[$tax_key]) && !empty($request->valid_from[$tax_key]) ? date('Y-m-d', strtotime($request->valid_from[$tax_key])) : "",
            //                 'created_by' => 0,
            //                 'created_at' => $now,
            //                 'updated_at' => $now,
            //             ];

            //             $batch_insert[] = $data;
            //         }
            //     }
            // }
            // if (count($batch_insert) > 0) {
            //     ItemTaxDetails::insert($batch_insert);
            // }



            if (count($batch_barcode_insert) > 0) {
                ItemBracodeDetails::insert($batch_barcode_insert);
            }
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item, $id)
    {
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;
        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $item = Item::find($id);
        return view('admin.master.item.show', compact('item', 'language_1', 'language_2', 'language_3', 'category_1', 'category_2', 'category_3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, $id)
    {

        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;
        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $item = Item::find($id);
        $category_one = Category_one::all();
        $category_two = Category_two::all();
        $category_three = Category_three::all();
        $uom = Uom::all();
        $tax = Tax::all();
        $opening_stock = OpeningStock::all();

        $tax_details = ItemTaxDetails::where('item_id',$id)
                                    ->select('item_id','valid_from')
                                    ->groupBy('item_id','valid_from')
                                    ->get();

        if(count($tax_details) == 0)
        {
           $tax_value[] = 0; 
           $tax_count = 0;
           $tax_detail_count = 0;
        }   
        else
        {
            foreach ($tax_details as $key => $value) 
            {
                $tax_value[] = ItemTaxDetails::where('item_id',$value->item_id)
                                            ->where('valid_from',$value->valid_from)
                                            ->get();
            }                

        $tax_count = count($tax);
        $tax_detail_count = count($tax_details);

        }                               
                                    
         

        @$opening = OpeningStock::where('item_id',$id)->get();
        // 
        // $opening_data = [];

        foreach ($opening as $key => $value) 
        {

            @$opening_data[] = OpeningStock::join('locations','opening_stocks.location','=','locations.id')
                                            ->where('opening_stocks.item_id',$id)
                                            ->where('opening_stocks.batch_no',$value->batch_no)
                                            ->select('opening_stocks.*','locations.name')
                                            ->get();
            
            
        }

        @$opening_count = count($opening_data);
        // echo "<pre>"; print_r($opening_data);exit();

        $brand = Brand::orderBy('name', 'asc')->get();
        $category = Category::orderBy('name', 'asc')->get();
        $bulk_item = Item::where('item_type', 'Bulk')->get();
        $child_item = Item::all();
        $location = Location::all();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        return view('admin.master.item.edit', compact('supplier', 'brand', 'bulk_item', 'category', 'item', 'child_item', 'language_1', 'language_2', 'language_3', 'category_1', 'category_2', 'category_3', 'category_one', 'category_two', 'category_three','tax','tax_details', 'tax_value','uom','tax_count','tax_detail_count','opening','opening_stock','opening_data','opening_count','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item, $id)
    {


        $test_opening = OpeningStock::where('item_id',$id);
        $test_opening->delete();

        $opening_count = $request->opening_cnt;

        for ($j=0; $j < $opening_count; $j++) 
        { 
            $openings = new OpeningStock();
            
            $openings->item_id = $id;
            $openings->location = $request->location[$j];
            $openings->batch_no = $request->batch_no[$j];
            $openings->opening_qty = $request->quantity[$j];
            $openings->rate = $request->rate[$j];
            $openings->amount = $request->amount[$j];
            $openings->applicable_date = $request->applicable_date[$j];
            $openings->black_or_white = $request->black_or_white[$j];

            $openings->save();

        }
        

        $item = Item::find($id);
        $item->name = $request->name;
        $item->item_type = $request->item_type;
        if ($request->item_type == "Repack") {
            $item->bulk_item_id = $request->bulk_item_id;
        }

        if ($request->item_type == "Parent") {
            $item->child_item_id = $request->child_item_id;
            $item->child_unit = $request->child_unit;
        }

        if ($request->weight_in_grams != "" && $request->weight_in_grams > 0) {
            $item->weight_in_grams = $request->weight_in_grams;
            $item->weight_in_kg = $request->weight_in_grams / 1000;
        } else {
            $item->weight_in_grams = 0;
            $item->weight_in_kg = 0;
        }
        $item->code = $request->code;
        $item->supplier_id = $request->supplier_id;
        $item->category_id = $request->category_id;
        $item->brand_id = $request->brand_id;
        $item->print_name_in_english = $request->print_name_in_english;
        $item->print_name_in_language_1 = $request->print_name_in_language_1;
        $item->print_name_in_language_2 = $request->print_name_in_language_2;
        $item->print_name_in_language_3 = $request->print_name_in_language_3;
        //$item->ptc = $request->ptc;
        // $item->barcode = $request->barcode;
        $item->mrp = $request->mrp;
        $item->hsn = $request->hsn;
        $item->default_selling_price = $request->default_selling_price;
        $item->uom_id = $request->uom_id;
        $item->is_expiry_date = $request->is_expiry_date;
        $item->is_machine_weight_applicable = $request->is_machine_weight_applicable;
        $item->is_minimum_sales_qty_applicable = $request->is_minimum_sales_qty_applicable;

        

        if (!empty($request->expiry_date)) {
            $item->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        }

        if ($request->is_minimum_sales_qty_applicable == 1) {
            $item->minimum_sales_price = $request->minimum_sales_price;
            $item->minimum_sales_qty = $request->minimum_sales_qty;
        } else {
            $item->minimum_sales_price = $request->minimum_sales_price;
            $item->minimum_sales_qty = $request->minimum_sales_qty;
        }

        $item->created_by = 0;
        if ($item->save()) {
            $now = Carbon::now()->toDateTimeString();
            // $batch_insert = [];


            /* Store Barcode Details Start Here  */
            $batch_barcode_insert = [];
            if ($request->has('barcode')) {
                foreach ($request->barcode as $barcode_key => $barcode_value) {
                    $exist_barcode_count = ItemBracodeDetails::where('barcode', $barcode_value)->get();
                    // if ($barcode_value != "" && count($exist_barcode_count) == 0) {
                    if ($barcode_value != "") {
                        $data = [
                            'item_id' => $item->id,
                            'barcode' => $barcode_value,
                            'created_by' => 0,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                        $batch_barcode_insert[] = $data;
                    }
                }
            }
            /* Update Existing Barcode Details Start Here  */
            $batch_barcode_update = [];
            if ($request->has('old_barcode')) {
                foreach ($request->old_barcode as $exist_barcode_key => $exist_barcode_value) {
                    if ($exist_barcode_value != "") {
                        $exist_item_barcode_details = ItemBracodeDetails::find($request->item_barcode_details_id[$exist_barcode_key]);
                        $exist_item_barcode_details->item_id = $item->id;
                        $exist_item_barcode_details->barcode = $exist_barcode_value;
                        $exist_item_barcode_details->updated_by = 0;
                        $exist_item_barcode_details->save();
                    }
                }
            }

            /* Update Existing Barcode Details end Here  */

            $tax_detail = ItemTaxDetails::where('item_id',$id);
            $tax_detail->delete();

            $count = $request->count;
            $tax = Tax::all();

            for($i=0;$i<$count;$i++)
            {
                foreach ($tax as $key => $value) 
                {
                    $str_json = json_encode($value->name); 
                    $tax_name = str_replace('"', '', $str_json);
                    $value_name = $tax_name.'_id';
                    

                       $tax_details = new ItemTaxDetails;
                       $tax_details->item_id =$id;
                       $tax_details->tax_master_id =$request->$tax_name[$i];
                       $tax_details->value =$request->$value_name[$i];
                       $date = date("Y-m-d", strtotime($request->valid_from[$i]));
                       $tax_details->valid_from =$date;

                       $tax_details->save();

                    }
                    //break;
                }


            // if (count($batch_insert) > 0) {
            //     ItemTaxDetails::insert($batch_insert);
            // }

            if (count($batch_barcode_insert) > 0) {
                $batch_barcode_insert = array_unique($batch_barcode_insert, SORT_REGULAR);

                ItemBracodeDetails::insert($batch_barcode_insert);
            }



            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item, $id)
    {
        $item = Item::find($id);
        $item->item_tax_details()->delete();
        $item->item_barcode_details()->delete();
        if ($item->delete()) {

            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.item.index');
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

        $handle = fopen($file, "r");
        if(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        { 

                    $name=$filesop[0];   echo "</br>";
                    $code=$filesop[1];   echo "</br>";
                    $item_type=$filesop[2];   echo "</br>";
                    $weight_in_grams=$filesop[3];   echo "</br>";
                    $weight_in_kg=$filesop[4];   echo "</br>";
                    $bulk_item_id=$filesop[5];   echo "</br>";
                    $child_unit=$filesop[6];   echo "</br>";
                    $child_item_name=$filesop[7];   echo "</br>";
                    $uom_for_repack_item=$filesop[8];   echo "</br>";
                    $category_name=$filesop[9];   echo "</br>";
                    $brand_name=$filesop[10];   echo "</br>";
                    $print_name_in_english=$filesop[11];   echo "</br>";
                    $print_name_in_language_1=$filesop[12];   echo "</br>";
                    $print_name_in_language_2=$filesop[13];   echo "</br>";
                    $print_name_in_language_3=$filesop[14];   echo "</br>";
                    $hsn=$filesop[15];   echo "</br>";
                    $supplier_name=$filesop[16];   echo "</br>";
                    $mrp=$filesop[17];   echo "</br>";
                    $default_selling_price=$filesop[18];   echo "</br>";
                    $uom=$filesop[19];   echo "</br>";
                    $applicable_date=$filesop[20];   echo "</br>";
                    $is_minimum_sales_qty_applicable=$filesop[21];   echo "</br>";
                    $minimum_sales_price=$filesop[22];   echo "</br>";
                    $minimum_sales_qty=$filesop[23];   echo "</br>";
                    $is_expiry_date=$filesop[24];   echo "</br>";
                    $expiry_date=$filesop[25];   echo "</br>";
                    $remark=$filesop[26];   echo "</br>";
                    $active_status=$filesop[27];   echo "</br>";
                    

                    $insert  = TRUE;
                   
        }
        if($insert == 1)
        {
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                    $name=$filesop[1];   echo "</br>";
                    $code=$filesop[2];   echo "</br>";
                    $item_type=$filesop[3];   echo "</br>";
                    $weight_in_grams=$filesop[4];   echo "</br>";
                    $weight_in_kg=$filesop[5];   echo "</br>";
                    $bulk_item_id=$filesop[6];   echo "</br>";
                    $child_unit=$filesop[7];   echo "</br>";
                    $child_item_name=$filesop[8];   echo "</br>";
                    $category_name=$filesop[9];   echo "</br>";
                    $brand_name=$filesop[10];   echo "</br>";
                    $print_name_in_english=$filesop[11];   echo "</br>";
                    $print_name_in_language_1=$filesop[12];   echo "</br>";
                    $print_name_in_language_2=$filesop[13];   echo "</br>";
                    $print_name_in_language_3=$filesop[14];   echo "</br>";
                    $hsn=$filesop[15];   echo "</br>";
                    $supplier_name=$filesop[16];   echo "</br>";
                    $mrp=$filesop[17];   echo "</br>";
                    $default_selling_price=$filesop[18];   echo "</br>";
                    $uom=$filesop[19];   echo "</br>";
                    $applicable_date=$filesop[20];   echo "</br>";
                    $remark=$filesop[21];   echo "</br>";
                    // echo $dob;
                    // $department = Department::where('name',$department_name)->first();
                    // $depart_id = @$department->id;

                    $category_name = str_replace(' ', '', $category_name);
                    $categories=Category::whereRaw("REPLACE(`name`, ' ' ,'') = '".$category_name."'")->first();

                    $brand_name = str_replace(' ', '', $brand_name);
                    $brands=Brand::whereRaw("REPLACE(`name`, ' ' ,'') = '".$brand_name."'")->first();

                    $supplier_name = str_replace(' ', '', $supplier_name);
                    $suppliers=Supplier::whereRaw("REPLACE(`name`, ' ' ,'') = '".$supplier_name."'")->first();

                    $uom = str_replace(' ', '', $uom);
                    $uoms=Uom::whereRaw("REPLACE(`name`, ' ' ,'') = '".$uom."'")->first();

                    $category_id = @$categories->id;
                    $brand_id = @$brands->id;
                    $supplier_id = @$suppliers->id;
                    $uom_id = @$uoms->id;

                    $name = str_replace(' ', '', $name);
                    $name_duplicate=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$name."'")->first();

                    if($name_duplicate == 0 && $categories != '' && $brands != '' && $uoms != '')
                    {

                    $item =new Item();

                    $item->name = $name;
                    $item->code = $code;
                    $item->item_type = $item_type;
                    $item->weight_in_grams = $weight_in_grams;
                    $item->weight_in_kg = $weight_in_kg;
                    $item->bulk_item_id = $bulk_item_id;
                    $item->child_unit = $child_unit;
                    $item->child_item_id = $child_item_name;
                    $item->category_id = $category_id;
                    $item->brand_id = $brand_id;
                    $item->print_name_in_english = $print_name_in_english;
                    $item->print_name_in_language_1 = $print_name_in_language_1;
                    $item->print_name_in_language_2 = $print_name_in_language_2;
                    $item->print_name_in_language_3 = $print_name_in_language_3;
                    $item->hsn = $hsn;
                    $item->supplier_id = $supplier_id;
                    $item->mrp = $mrp;
                    $item->default_selling_price = $default_selling_price;
                    $item->uom_id = $uom_id;
                    $item->applicable_date = $applicable_date;
                    $item->remark = $remark;


                    if($item->save())
                    {
                        $location_name=$filesop[22];   echo "</br>";
                        $batch_no=$filesop[23];   echo "</br>";
                        $opening_qty=$filesop[24];   echo "</br>";
                        $rate=$filesop[25];   echo "</br>";
                        $amount=$filesop[26];   echo "</br>";
                        $applicable_date=$filesop[27];   echo "</br>";
                        $barcode=$filesop[28];   echo "</br>";

                        $openings = new OpeningStock();


                        $openings->item_id = $item->id;
                        $openings->location = $location_name;
                        $openings->batch_no = $batch_no;
                        $openings->opening_qty = $opening_qty;
                        $openings->rate = $rate;
                        $openings->amount = $amount;
                        $openings->applicable_date = $applicable_date;

                        $openings->save();

                        $barcodes = new ItemBracodeDetails();


                        $barcodes->item_id = $item->id;
                        $barcodes->barcode = $barcode;
                        

                        $barcodes->save();

                    }
                }

            }
            // exit();
        }

        return Redirect::back()->with('success', 'Uploaded');      
    }

    // function csvToArray($filename = '', $delimiter = ',')
    // {
    //     // echo $filename; exit();
    //     if (!file_exists($filename) || !is_readable($filename))
    //         return false;

    //     $header = null;
    //     $data = array();
    //     if (($handle = fopen($filename, 'r')) !== false)
    //     {
    //         while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
    //         {
    //             if (!$header)
    //                 $header = $row;
    //             else
                     
    //                 $data[] = array_combine($header, $row);
    //         }
    //         fclose($handle);
    //     }

    //     return $data;
    // }

    public function uomfactorconvertionforitem($id)
    {
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;
        $item = Item::find($id);
        $item_dets = Item::where(['item_type' => 'Repack'])->get();
        $uom = Uom::whereNotIn('id', [$item->uom_id])->get();
        $uom_factor_convertion_for_item = UomFactorConvertionForItem::where('item_id', $id)->get();
        return view('admin.master.item.uom_factor_convertion_for_item', compact('item_dets', 'item', 'category_1', 'category_2', 'category_3', 'uom', 'uom_factor_convertion_for_item'));
    }

    public function store_uom_factor_convertion_for_item(ItemRequest $request)
    {
        $input_array = [];
        $success_count = 0;
        if ($request->has('uom_id')) {
            foreach ($request->uom_id as $key => $value) {
                $data = array(
                    'item_id' => $request->item_id,
                    'category_1' => $request->category_1,
                    'category_2' => $request->category_2,
                    'category_3' => $request->category_3,
                    'default_uom_id' => $request->default_uom_id,
                    'uom_id' => $request->uom_id[$key],
                    'convertion_factor' => $request->convertion_factor[$key],
                    'created_by' => 0,
                );
                $input_array[] = $data;
            }

            if (count($input_array) > 0) {
                $success_count++;
                UomFactorConvertionForItem::insert($input_array);
            }
        }

        if ($request->has('old_uom_id')) {
            foreach ($request->old_uom_id as $key => $value) {
                $uom_factor_convertion_for_item = UomFactorConvertionForItem::find($request->uom_factor_convertion_id[$key]);
                $uom_factor_convertion_for_item->item_id = $request->item_id;
                $uom_factor_convertion_for_item->category_1 = $request->category_1;
                $uom_factor_convertion_for_item->category_2 = $request->category_2;
                $uom_factor_convertion_for_item->category_3 = $request->category_3;
                $uom_factor_convertion_for_item->default_uom_id = $request->default_uom_id;
                $uom_factor_convertion_for_item->uom_id = $request->old_uom_id[$key];
                $uom_factor_convertion_for_item->convertion_factor = $request->old_convertion_factor[$key];
                $uom_factor_convertion_for_item->updated_by = 0;
                if ($uom_factor_convertion_for_item->save()) {
                    $success_count++;
                }
            }
        }

        if ($success_count > 0) {
            return Redirect::back()->with('success', 'Added Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function delete_uom_factor_convertion_for_item(Request $request)
    {
        $uom_factor_convertion_id = $request->uom_factor_convertion_id;
        $uom_factor_convertion_for_item = UomFactorConvertionForItem::find($uom_factor_convertion_id);
        if ($uom_factor_convertion_for_item->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function remove_item_barcode_details(Request $request)
    {
        $item_barcode_details_id = $request->has('item_barcode_details_id') ? $request->item_barcode_details_id : "";
        if ($item_barcode_details_id != "") {
            $item_barcode_details = ItemBracodeDetails::find($item_barcode_details_id);
            if ($item_barcode_details->delete()) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function multiple_item(Request $request)
    {
            $language_1 = $this->language_1;
            $language_2 = $this->language_2;
            $language_3 = $this->language_3;
            $category = Category::orderBy('name', 'asc')->get();
            $brand = Brand::orderBy('name', 'asc')->get();
            $supplier = Supplier::orderBy('name', 'asc')->get();
            $uom = Uom::all();
            $tax = Tax::all();
            $tax_count = count($tax);
            $language = Language::all();
            $date = date('Y-m-d');
            $location = Location::all();
            $bulk_item = Item::where('item_type', 'Bulk')->get();
            $items = Item::all();

        if($request->item_types == 1)
        {
            
            return view('admin.master.item.direct_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'));
        }
        elseif($request->item_types == 2)
        {
            
            return view('admin.master.item.bulk_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'));
        }
        elseif ($request->item_types == 3) 
        {
            return view('admin.master.item.repack_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'));
        }
        elseif ($request->item_types == 4) 
        {
            return view('admin.master.item.parent_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count','items'));
        }
        
    }

    public function direct_items(Request $request)
    {
        foreach ($request->name as $key => $value) 
        {
        $item_name = str_replace(' ', '', $value);
        $item_code = str_replace(' ', '', $request->code[$key]);
        $name_duplicate=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$item_name."'")->count();
        $code_duplicate=Item::whereRaw("REPLACE(`code`, ' ' ,'') = '".$item_code."'")->count();

        if($name_duplicate == 0 && $code_duplicate == 0)
        {
            $item = new Item();
            $item->name = $value;

            if ($request->weight_in_grams[$key] != "" && $request->weight_in_grams[$key] > 0) {
                $item->weight_in_grams = $request->weight_in_grams[$key];
                $item->weight_in_kg = $request->weight_in_grams[$key] / 1000;
            } else {
                $item->weight_in_grams = 0;
                $item->weight_in_kg = 0;
            }


            $item->code = $request->code[$key];
            $item->item_type = 'Direct';
            $item->supplier_id = $request->supplier_id[$key];
            $item->category_id = $request->category_id[$key];
            $item->brand_id = $request->brand_id[$key];
            $item->print_name_in_english = $request->print_name_in_english[$key];
            $item->print_name_in_language_1 = $request->print_name_in_language_1[$key];
            $item->print_name_in_language_2 = $request->print_name_in_language_2[$key];
            $item->print_name_in_language_3 = $request->print_name_in_language_3[$key];
            $item->mrp = $request->mrp[$key];
            $item->hsn = $request->hsn[$key];
            $item->default_selling_price = $request->default_selling_price[$key];
            $item->uom_id = $request->uom_id[$key];

            $item->created_by = 0;

            $item->save();

                if($item->save())
                {

                    $openings = new OpeningStock();

                    $openings->item_id = $item->id;
                    $openings->location = $request->location[$key];
                    $openings->batch_no = $request->batch_no[$key];
                    $openings->opening_qty = $request->quantity[$key];
                    $openings->applicable_date = $request->applicable_date[$key];

                    $openings->save();

                    $tax = Tax::all();
                    foreach ($tax as $i => $value) 
                    {
                        $str_json = json_encode($value->name); //array to json string conversion
                        $tax_name = str_replace('"', '', $str_json);
                        $value_name = $tax_name.'_id';
                        

                           $tax_details = new ItemTaxDetails();
                           $tax_details->item_id =$item->id;
                           $tax_details->tax_master_id =$request->$tax_name[$key];
                           $tax_details->value =$request->$value_name[$key];
                           $date = date("Y-m-d", strtotime($request->valid_from[$key]));
                           $tax_details->valid_from =$date;

                           $tax_details->save();

                        }

                    $barcode_details = new ItemBracodeDetails();

                    $barcode_details->item_id = $item->id;
                    $barcode_details->barcode = $request->barcode[$key];
                    $barcode_details->created_by = 0;

                    $barcode_details->save();


                }
            }

        
        }

        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $category = Category::orderBy('name', 'asc')->get();
        $brand = Brand::orderBy('name', 'asc')->get();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        $uom = Uom::all();
        $tax = Tax::all();
        $tax_count = count($tax);
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();

            
            return view('admin.master.item.direct_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'))->with('successMsg','Saved Successfully .');
       
    }

    public function bulk_items(Request $request)
    {
        foreach ($request->name as $key => $value) 
        {
        $item_name = str_replace(' ', '', $value);
        $item_code = str_replace(' ', '', $request->code[$key]);
        $name_duplicate=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$item_name."'")->count();
        $code_duplicate=Item::whereRaw("REPLACE(`code`, ' ' ,'') = '".$item_code."'")->count();

        if($name_duplicate == 0 && $code_duplicate == 0)
        {
            $item = new Item();
            $item->name = $value;

            if ($request->weight_in_grams[$key] != "" && $request->weight_in_grams[$key] > 0) {
                $item->weight_in_grams = $request->weight_in_grams[$key];
                $item->weight_in_kg = $request->weight_in_grams[$key] / 1000;
            } else {
                $item->weight_in_grams = 0;
                $item->weight_in_kg = 0;
            }


            $item->code = $request->code[$key];
            $item->item_type = 'Bulk';
            $item->supplier_id = $request->supplier_id[$key];
            $item->category_id = $request->category_id[$key];
            $item->brand_id = $request->brand_id[$key];
            $item->print_name_in_english = $request->print_name_in_english[$key];
            $item->print_name_in_language_1 = $request->print_name_in_language_1[$key];
            $item->print_name_in_language_2 = $request->print_name_in_language_2[$key];
            $item->print_name_in_language_3 = $request->print_name_in_language_3[$key];
            $item->mrp = $request->mrp[$key];
            $item->hsn = $request->hsn[$key];
            $item->default_selling_price = $request->default_selling_price[$key];
            $item->uom_id = $request->uom_id[$key];

            $item->created_by = 0;

            $item->save();

                if($item->save())
                {

                    $openings = new OpeningStock();

                    $openings->item_id = $item->id;
                    $openings->location = $request->location[$key];
                    $openings->batch_no = $request->batch_no[$key];
                    $openings->opening_qty = $request->quantity[$key];
                    $openings->applicable_date = $request->applicable_date[$key];

                    $openings->save();

                    $tax = Tax::all();
                    foreach ($tax as $i => $value) 
                    {
                        $str_json = json_encode($value->name); //array to json string conversion
                        $tax_name = str_replace('"', '', $str_json);
                        $value_name = $tax_name.'_id';
                        

                           $tax_details = new ItemTaxDetails();
                           $tax_details->item_id =$item->id;
                           $tax_details->tax_master_id =$request->$tax_name[$key];
                           $tax_details->value =$request->$value_name[$key];
                           $date = date("Y-m-d", strtotime($request->valid_from[$key]));
                           $tax_details->valid_from =$date;

                           $tax_details->save();

                        }

                    $barcode_details = new ItemBracodeDetails();

                    $barcode_details->item_id = $item->id;
                    $barcode_details->barcode = $request->barcode[$key];
                    $barcode_details->created_by = 0;

                    $barcode_details->save();


                }
            }

        
        }

        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $category = Category::orderBy('name', 'asc')->get();
        $brand = Brand::orderBy('name', 'asc')->get();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        $uom = Uom::all();
        $tax = Tax::all();
        $tax_count = count($tax);
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();

            
            return view('admin.master.item.bulk_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'))->with('successMsg','Saved Successfully .');
       
    }

    public function repack_items(Request $request)
    {
        foreach ($request->name as $key => $value) 
        {
        $item_name = str_replace(' ', '', $value);
        $item_code = str_replace(' ', '', $request->code[$key]);
        $name_duplicate=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$item_name."'")->count();
        $code_duplicate=Item::whereRaw("REPLACE(`code`, ' ' ,'') = '".$item_code."'")->count();

        if($name_duplicate == 0 && $code_duplicate == 0)
        {
            $item = new Item();
            $item->name = $value;

            if ($request->weight_in_grams[$key] != "" && $request->weight_in_grams[$key] > 0) {
                $item->weight_in_grams = $request->weight_in_grams[$key];
                $item->weight_in_kg = $request->weight_in_grams[$key] / 1000;
            } else {
                $item->weight_in_grams = 0;
                $item->weight_in_kg = 0;
            }


            $item->code = $request->code[$key];
            $item->item_type = 'Repack';
            $item->bulk_item_id = $request->bulk_item_id[$key];
            $item->supplier_id = $request->supplier_id[$key];
            $item->category_id = $request->category_id[$key];
            $item->brand_id = $request->brand_id[$key];
            $item->print_name_in_english = $request->print_name_in_english[$key];
            $item->print_name_in_language_1 = $request->print_name_in_language_1[$key];
            $item->print_name_in_language_2 = $request->print_name_in_language_2[$key];
            $item->print_name_in_language_3 = $request->print_name_in_language_3[$key];
            $item->mrp = $request->mrp[$key];
            $item->hsn = $request->hsn[$key];
            $item->default_selling_price = $request->default_selling_price[$key];
            $item->uom_id = $request->uom_id[$key];

            $item->created_by = 0;

            $item->save();

                if($item->save())
                {

                    $openings = new OpeningStock();

                    $openings->item_id = $item->id;
                    $openings->location = $request->location[$key];
                    $openings->batch_no = $request->batch_no[$key];
                    $openings->opening_qty = $request->quantity[$key];
                    $openings->applicable_date = $request->applicable_date[$key];

                    $openings->save();

                    $tax = Tax::all();
                    foreach ($tax as $i => $value) 
                    {
                        $str_json = json_encode($value->name); //array to json string conversion
                        $tax_name = str_replace('"', '', $str_json);
                        $value_name = $tax_name.'_id';
                        

                           $tax_details = new ItemTaxDetails();
                           $tax_details->item_id =$item->id;
                           $tax_details->tax_master_id =$request->$tax_name[$key];
                           $tax_details->value =$request->$value_name[$key];
                           $date = date("Y-m-d", strtotime($request->valid_from[$key]));
                           $tax_details->valid_from =$date;

                           $tax_details->save();

                        }

                    $barcode_details = new ItemBracodeDetails();

                    $barcode_details->item_id = $item->id;
                    $barcode_details->barcode = $request->barcode[$key];
                    $barcode_details->created_by = 0;

                    $barcode_details->save();


                }
            }

        
        }

        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $category = Category::orderBy('name', 'asc')->get();
        $brand = Brand::orderBy('name', 'asc')->get();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        $uom = Uom::all();
        $tax = Tax::all();
        $tax_count = count($tax);
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();

            
            return view('admin.master.item.repack_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count'))->with('successMsg','Saved Successfully .');
       
    }

    public function parent_items(Request $request)
    {
        foreach ($request->name as $key => $value) 
        {
        $item_name = str_replace(' ', '', $value);
        $item_code = str_replace(' ', '', $request->code[$key]);
        $name_duplicate=Item::whereRaw("REPLACE(`name`, ' ' ,'') = '".$item_name."'")->count();
        $code_duplicate=Item::whereRaw("REPLACE(`code`, ' ' ,'') = '".$item_code."'")->count();

        if($name_duplicate == 0 && $code_duplicate == 0)
        {
            $item = new Item();
            $item->name = $value;

            if ($request->weight_in_grams[$key] != "" && $request->weight_in_grams[$key] > 0) {
                $item->weight_in_grams = $request->weight_in_grams[$key];
                $item->weight_in_kg = $request->weight_in_grams[$key] / 1000;
            } else {
                $item->weight_in_grams = 0;
                $item->weight_in_kg = 0;
            }


            $item->code = $request->code[$key];
            $item->item_type = 'Parent';
            $item->child_item_id = $request->child_item_id[$key];
            $item->child_unit = $request->child_unit[$key];
            $item->supplier_id = $request->supplier_id[$key];
            $item->category_id = $request->category_id[$key];
            $item->brand_id = $request->brand_id[$key];
            $item->print_name_in_english = $request->print_name_in_english[$key];
            $item->print_name_in_language_1 = $request->print_name_in_language_1[$key];
            $item->print_name_in_language_2 = $request->print_name_in_language_2[$key];
            $item->print_name_in_language_3 = $request->print_name_in_language_3[$key];
            $item->mrp = $request->mrp[$key];
            $item->hsn = $request->hsn[$key];
            $item->default_selling_price = $request->default_selling_price[$key];
            $item->uom_id = $request->uom_id[$key];

            $item->created_by = 0;

            $item->save();

                if($item->save())
                {

                    $openings = new OpeningStock();

                    $openings->item_id = $item->id;
                    $openings->location = $request->location[$key];
                    $openings->batch_no = $request->batch_no[$key];
                    $openings->opening_qty = $request->quantity[$key];
                    $openings->applicable_date = $request->applicable_date[$key];

                    $openings->save();

                    $tax = Tax::all();
                    foreach ($tax as $i => $value) 
                    {
                        $str_json = json_encode($value->name); //array to json string conversion
                        $tax_name = str_replace('"', '', $str_json);
                        $value_name = $tax_name.'_id';
                        

                           $tax_details = new ItemTaxDetails();
                           $tax_details->item_id =$item->id;
                           $tax_details->tax_master_id =$request->$tax_name[$key];
                           $tax_details->value =$request->$value_name[$key];
                           $date = date("Y-m-d", strtotime($request->valid_from[$key]));
                           $tax_details->valid_from =$date;

                           $tax_details->save();

                        }

                    $barcode_details = new ItemBracodeDetails();

                    $barcode_details->item_id = $item->id;
                    $barcode_details->barcode = $request->barcode[$key];
                    $barcode_details->created_by = 0;

                    $barcode_details->save();


                }
            }

        
        }

        $language_1 = $this->language_1;
        $language_2 = $this->language_2;
        $language_3 = $this->language_3;
        $category = Category::orderBy('name', 'asc')->get();
        $brand = Brand::orderBy('name', 'asc')->get();
        $supplier = Supplier::orderBy('name', 'asc')->get();
        $uom = Uom::all();
        $tax = Tax::all();
        $tax_count = count($tax);
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();
        $items = Item::all();

            
            return view('admin.master.item.parent_item',compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3','tax','date','location','tax_count','items'))->with('successMsg','Saved Successfully .');
       
    }
}
