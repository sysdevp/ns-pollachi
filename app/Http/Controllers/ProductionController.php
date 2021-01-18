<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Production;
use App\Models\Location;
use App\Models\Uom;
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
        return view('admin.production.add', compact('locations','items','uoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $itemwastage = new Production();
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->production_date      = date("Y-m-d", strtotime($request->entry_date));
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
    public function edit(Production $itemwise_offer, $id)
    {
        $item_wastage = Production::find($id);
        $locations = Location::all();
        $items = Item::all();
        $uoms = Uom::all();
        
        return view('admin.production.edit', compact('item_wastage', 'items','locations','uoms'));
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
        
        $itemwastage = Production::find($id);
        $itemwastage->location_id      = $request->location_id;
        $itemwastage->production_date      = date("Y-m-d", strtotime($request->entry_date));
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
