<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VendorMarginSetup;
use Illuminate\Support\Facades\Redirect;

class VendorMarginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor_margin_setup = VendorMarginSetup::first();
        if($vendor_margin_setup != '')
        {
            $count = 1;
        }
        else
        {
            $count = 0;
        }
        return view('admin.settings.vendor_margin',compact('vendor_margin_setup','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor_margin_setup = VendorMarginSetup::all();

        if(count($vendor_margin_setup) != 1)
        {
            $insert = new VendorMarginSetup();

            $insert->setup = $request->vendor_margin_setup;

            $insert->save();
        }

       else
       {

        $update = VendorMarginSetup::where('id',1)->first();

        $update->setup = $request->vendor_margin_setup;

        $update->save();
       
       }  

       return Redirect::back()->with('success', 'Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
