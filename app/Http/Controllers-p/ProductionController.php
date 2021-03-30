<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Production;
use App\Models\Location;
use App\Models\Uom;
use App\Models\Bom;
use App\Models\AccountGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$items = Production::get();
        return view('admin.production.view', compact('items'));
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
        $account_group = AccountGroup::where('under',"Expense")->get();
       // print_r($account_group);exit;
        return view('admin.production.add', compact('locations','items','uoms','account_group'));
    }
    public function account_group(Request $request)
    {
       $account_group = Bom::where('product_item_id',$request->item_id)->first('account_group');
      // $explode = explode(",",$account_group);
       echo $account_group->account_group;
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amount = implode(",",$request->amount);
        $account_group_id = implode(",",$request->account_group_id);
        // print_r($amount);exit;
        //  print_r($request->request->all());exit;

        
        // print_r($account_group);exit;

        $itemwastage = new Production();
        
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->production_date      = date("Y-m-d", strtotime($request->entry_date));
        $itemwastage->item_id = $request->item_id;
        $itemwastage->quantity = $request->quantity;
        $itemwastage->uom_id = $request->uom_id;
        $itemwastage->remark = $request->remark;
        $itemwastage->amount = $amount;
        $itemwastage->account_group_id = $account_group_id;
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
    public function edit(Production $itemwise_offer, $id)
    {
        $item_wastage = Production::find($id);
        $locations = Location::all();
        $items = Item::all();
        $uoms = Uom::all();
        $explode = explode(",",$item_wastage->account_group_id);
        $explode_amount = explode(",",$item_wastage->amount);
        $count = count($explode);
        $account_group = AccountGroup::where('under',"Expense")->get();

      //  print_r($explode);exit;        
        // for($i=0;$i<$count;$i++)
        // {
        //     $account_group[] = AccountGroup::where('id',$explode[$i])->get();
        //     $amount = $explode_amount[$i];
        // }
        // $account_groups =      $account_group;
     
         return view('admin.production.edit', compact('item_wastage','account_group','explode','explode_amount', 'items','locations','uoms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $itemwise_offer, $id)
    {
        $amount = implode(",",$request->amount);
        $account_group_id = implode(",",$request->account_group_id);
        $itemwastage = Production::find($id);
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->production_date      = date("Y-m-d", strtotime($request->entry_date));
        $itemwastage->item_id = $request->item_id;
        $itemwastage->quantity = $request->_quantity;
        $itemwastage->remark = $request->remark;
        $itemwastage->amount = $amount;
        $itemwastage->account_group_id = $account_group_id;
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
    public function destroy(Production $item_wastage, $id)
    {
        $itemwise_offer = Production::find($id);
        if ($itemwise_offer->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    
}
