<?php

namespace App\Http\Controllers;

use App\CategoryName;
use App\Models\Category_one;
use App\Models\Item;
use App\Models\Uom;
use App\Models\UomFactorConvertionForItem;
use Illuminate\Http\Request;

class UomFactorConvertionForItemController extends Controller
{
  
    public $category;
    public $category_1;
    public $category_2;
    public $category_3;

    public function __construct()
     {
      
        $this->category=CategoryName::all();
        $this->category_1=isset($this->category[0]->category_1) && !empty($this->category[0]->category_1) ? $this->category[0]->category_1 : "Category 1 " ;
        $this->category_2=isset($this->category[0]->category_2) && !empty($this->category[0]->category_2) ? $this->category[0]->category_2 : "Category 2 " ;
        $this->category_3=isset($this->category[0]->category_3) && !empty($this->category[0]->category_3) ? $this->category[0]->category_3 : "Category 3 " ;
        
    
    }
    public function index()
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $uom_factor_convertion_for_item=UomFactorConvertionForItem::all();
        return view('admin.master.uom_factor_convertion_for_item.view',compact('uom_factor_convertion_for_item','category_1','category_2','category_3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $category_one=Category_one::all();
        $uom=Uom::all();
        $item=Item::all();
        return view('admin.master.uom_factor_convertion_for_item.add',compact('item','category_one','uom','category_1','category_2','category_3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UomFactorConvertionForItem  $uomFactorConvertionForItem
     * @return \Illuminate\Http\Response
     */
    public function show(UomFactorConvertionForItem $uomFactorConvertionForItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UomFactorConvertionForItem  $uomFactorConvertionForItem
     * @return \Illuminate\Http\Response
     */
    public function edit(UomFactorConvertionForItem $uomFactorConvertionForItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UomFactorConvertionForItem  $uomFactorConvertionForItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UomFactorConvertionForItem $uomFactorConvertionForItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UomFactorConvertionForItem  $uomFactorConvertionForItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(UomFactorConvertionForItem $uomFactorConvertionForItem)
    {
        //
    }
}
