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
        $language = Language::all();
        $date = date('Y-m-d');
        $location = Location::all();
        $bulk_item = Item::where('item_type', 'Bulk')->get();
        return view('admin.master.item.add', compact('supplier', 'brand', 'category', 'bulk_item', 'uom', 'language', 'language_1', 'language_2', 'language_3', 'category_1', 'category_2', 'category_3','tax','date','location'));
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
                                    
         foreach ($tax_details as $key => $value) 
         {
                $tax_value[] = ItemTaxDetails::where('item_id',$value->item_id)
                                            ->where('valid_from',$value->valid_from)
                                            ->get();
        }      

        // echo "<pre>"; print_r($tax_value); exit();                         

               
                                       
        $tax_count = count($tax);
        $tax_detail_count = count($tax_details);

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
}
