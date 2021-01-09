<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemTaxRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Category_one;
use App\Models\Category_three;
use App\Models\Category_two;
use App\Models\CategoryName;
use App\Models\Item;
use App\Models\Tax;
use App\Models\Taxdummy;
use App\Models\ItemTaxDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ItemTaxDetailsController extends Controller
{
    public $category;
    public $category_1;
    public $category_2;
    public $category_3;

    public function __construct()
    {

        $this->category = CategoryName::all();
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
        
        $item_tax_details = ItemTaxDetails::with('item')->with('tax')->get();
        $taxes = Tax::with('item_tax_detail')->get();
        $items = Item::all();
        $tax_details = ItemTaxDetails::all();
        // foreach ($item_tax_details as $key => $value) {
        //   echo "<pre>"; print_r($value->item->id);
        // }
        // exit;
        return view('admin.master.item_tax_details.view', compact('items','item_tax_details','taxes','tax_details'));
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

        $category_one = Category_one::all();
        $category_two = Category_two::all();
        $category_three = Category_three::all();
        $category = Category::all();
        $taxes = Tax::all();
        $brand = Brand::orderBy('name', 'asc')->get();
        return view('admin.master.item_tax_details.add', compact('brand','category', 'category_one', 'category_two', 'category_three', 'category_1', 'taxes', 'category_2', 'category_3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $taxes = Tax::all();
        $tax_count = count($taxes); 
        $table_count = $request->table_count;

        $name  = array();


        for($i=0;$i<$table_count;$i++)
        {
            $item_id = $request->item_id[$i];
            $valid_from = $request->valid_from[$i];
            $date = date("Y-m-d", strtotime($valid_from));

            foreach ($taxes as $key => $value) 
            {
                
                $str_json = json_encode($value->name); //array to json string conversion
                $names = str_replace('"', '', $str_json);
                $value_name = $names.'_id';
            
                $tax_details = new ItemTaxDetails();
                $tax_details->item_id = $item_id;
                $tax_details->tax_master_id = $request->$names[$i];
                $tax_details->value = $request->$value_name[$i];
                $tax_details->valid_from = $date;
                $tax_details->save();

            }

        }

        return Redirect::back()->with('success', 'Saved Successfully');

      //   $input = $request->all();
      // // echo "<pre>"; print_r($input);exit;


      //   foreach ($input['valid_from'] as $key => $value) {
      //       $input['valid_from'][$key] = $input['valid_from'][$key] != "" ? date('Y-m-d', strtotime($input['valid_from'][$key])) : "";
      //   }

      //   $request->replace($input);
      //   $rule = [
      //      // 'category_1' => 'required',
      //       'item_id.*' => 'required',
      //       'cgst.*' => 'required',
      //       'igst.*' => 'required',
      //       'sgst.*' => 'required',
      //       'valid_from.*' => 'required',
      //       //'valid_from.*' => 'date_format:Y-m-d|required|unique:item_tax_details,valid_from,NULL,id,deleted_at,NULL,item_id,' . $request->item_id,
      //   ];

      //   foreach($request->item_id as $item_Key=>$item_value)
      //   {
            
      //   }

      //   if ($request->has('item_id')) {
      //       foreach($request->item_id as $item_Key=>$item_value){
                
      //           $rule['valid_from.' . $item_Key] = 'required|unique:item_tax_details,valid_from,NULL,id,deleted_at,NULL,item_id,' . $item_value;
      //       }
      //   }


      //   $messages = array(
      //       'item_id.*.required' => 'Item field is required',
      //       'cgst.*.required' => 'CGST field is required',
      //       'igst.*.required' => 'IGST field is required',
      //       'sgst.*.required' => 'SGST field is required',
      //       'valid_from.*.required' => 'Effective From Date  field is required',
      //       //'valid_from.*.distinct' => 'Please Check Duplication Date',
      //      'valid_from.*.unique' => ' The Effective From Date has already been taken for this item.',
      //   );



      //   $validator = Validator::make($request->all(), $rule, $messages);

      //   if ($validator->fails()) {
      //       return back()->withInput()->withErrors($validator);
      //   } else {
      //       $now = Carbon::now()->toDateTimeString();
      //       $batch_insert = [];
      //       foreach ($request->cgst as $key => $value) {
      //           $data = [
      //               'item_id' => isset($request->item_id[$key]) ? $request->item_id[$key] : "",
      //               'cgst' => isset($request->cgst[$key]) ? $request->cgst[$key] : "",
      //               'igst' => isset($request->igst[$key]) ? $request->igst[$key] : "",
      //               'sgst' => isset($request->sgst[$key]) ? $request->sgst[$key] : "",
      //               'valid_from' => isset($request->valid_from[$key]) ? date('Y-m-d', strtotime($request->valid_from[$key])) : "",
      //               'created_by' => 0,
      //               'created_at' => $now,
      //               'updated_at' => $now,
      //           ];

      //           $batch_insert[] = $data;
      //       }

      //       if (count($batch_insert) > 0) {
      //           ItemTaxDetails::insert($batch_insert);
      //           return Redirect::back()->with('success', 'Successfully created');
      //       } else {
      //           return Redirect::back()->with('failure', 'Something Went Wrong..!');
      //       }
      //   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemTaxDetails  $itemTaxDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ItemTaxDetails $itemTaxDetails, $id)
    {
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;

        $category_one = Category_one::all();
        $category_two = Category_two::all();
        $category_three = Category_three::all();
        $item = Item::all();
        $tax = Tax::all();
        $item_tax_details = ItemTaxDetails::with('tax')->with('item')->find($id);
        

        return view('admin.master.item_tax_details.show', compact('item_tax_details', 'category_one', 'category_two', 'category_three', 'category_1', 'category_2', 'category_3','item','tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemTaxDetails  $itemTaxDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemTaxDetails $itemTaxDetails, $id)
    {
        echo $id; exit();
        $category_1 = $this->category_1;
        $category_2 = $this->category_2;
        $category_3 = $this->category_3;

        $category_one = Category_one::all();
        $category_two = Category_two::all();
        $category_three = Category_three::all();
        $item = Item::all();
        $tax = Tax::all();
        $item_tax_details = ItemTaxDetails::with('tax')->with('item')->find($id);
        //echo "<pre>"; print_r($item_tax_details); exit;
        return view('admin.master.item_tax_details.edit', compact('item_tax_details', 'category_one', 'category_two', 'category_three', 'category_1', 'category_2', 'category_3','item','tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemTaxDetails  $itemTaxDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item_tax_details = ItemTaxDetails::find($id);

        $item_tax_details->item_id = $request->item_id;
        $item_tax_details->tax_master_id = $request->tax_id;
        $item_tax_details->value = $request->tax_value;
        $item_tax_details->valid_from = $request->valid_from;

        $item_tax_details->save();

        return Redirect::back()->with('success','Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemTaxDetails  $itemTaxDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemTaxDetails $itemTaxDetails, $id)
    {
        $item_tax_details = ItemTaxDetails::find($id);
        if ($item_tax_details->delete()) {
            return Redirect::back()->with('success', 'Deleted Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function search_item_by_category(Request $request)
    {
        $taxes = Tax::all();
        $category_id = $request->has('category_id') ? $request->category_id : "";
        $item_id = $request->has('item_id') ? $request->item_id : "";
        $brand_id = $request->has('brand_id') ? $request->brand_id : "";

        $condition = [];
        $category_id != "" ? $condition['items.category_id'] = $category_id : "";
        $item_id != "" ? $condition['items.id'] = $item_id : "";
        $brand_id != "" ? $condition['items.brand_id'] = $brand_id : "";
        
        if (count($condition) > 0) {
            $item_dets = Item::where($condition)->get();
            $cnt = count($item_dets);
        } else {
            $item_dets = array();
        }

        $page = view('admin.master.item_tax_details.search_item_by_category')->with('item_dets', $item_dets)->with('taxes',$taxes)->render();
        return json_encode(array("page" => $page, 'taxes'=> $taxes, 'count'=>$cnt));
        /* return response()->json([
            'page' => view('admin.master.item_tax_details.search_item_by_category')->with('item_dets', $item_dets)->render()
        ]); */
    }

    public function tax_details($id)
    {
        $taxes = Tax::all();
        $count = count($taxes);
        $tax_details = ItemTaxDetails::where('item_id',$id)
                                    ->select('item_id')
                                     ->groupBy('item_id')
                                     ->first();
        if($tax_details == '')
        {
        return Redirect::back()->with('success','There are no tax details for this item' );        
        } 

        $tax_value = ItemTaxDetails::where('item_id',$tax_details->item_id)->get();
        $valid_from = ItemTaxDetails::where('item_id',$tax_details->item_id)
                                    ->select('valid_from')
                                     ->groupBy('valid_from')
                                    ->get();

                                   
         return view('admin.master.item_tax_details.tax_details',compact('taxes','count','tax_details','tax_value','valid_from'));
    }
}
