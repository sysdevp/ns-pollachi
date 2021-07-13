<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\PosMaster;
use App\Models\Location;

class PosMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pos_master = PosMaster::all();
        return view('admin.master.pos_master.view',compact('pos_master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::all();
        return view('admin.master.pos_master.add',compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $var = PosMaster::where('pos_no',$request->pos_number)->count();

        if($var == 0)
        {
            $insert = new PosMaster();

            $insert->pos_no = $request->pos_number;
            $insert->pos_name = $request->pos_name;
            $insert->location_id = $request->location;

            $insert->save();

            return Redirect::back()->with('success','Successfully Created');
        }    
        else
        {
            return Redirect::back()->with('success','Pos Number Already Taken!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pos_master = PosMaster::find($id);
        return view('admin.master.pos_master.show',compact('pos_master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pos_master = PosMaster::find($id);
        $location = Location::all(); 
        return view('admin.master.pos_master.edit',compact('pos_master','location'));
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
        $var = PosMaster::where('pos_no',$request->pos_number)->where('id','!=',$id)->count();

        if($var == 0)
        {
            PosMaster::where('id',$id)->update(['pos_no' => $request->pos_number, 'pos_name' => $request->pos_name, 'location_id' => $request->location]);

            return Redirect::back()->with('success','Successfully Updated');
        }    
        else
        {
            PosMaster::where('id',$id)->update(['pos_name' => $request->pos_name, 'location_id' => $request->location]);

            return Redirect::back()->with('success','Pos Number Already Taken! and Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = PosMaster::find($id);

       $delete->delete();
       return Redirect::back()->with('success','Deleted Successfully');
    }
}
