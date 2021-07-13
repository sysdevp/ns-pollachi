<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalesManTarget;
use App\Models\TargetDetails;
use App\Models\SalesMan;
use App\Models\Location;
use App\Models\SaleEntry;
use Illuminate\Support\Facades\Redirect;

class SalesManTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$target_details = SalesManTarget::all();

        // echo "<pre>"; print_r($target_details); exit();
        if($target_details)
        {
            $total_target_amount[] = 0;
            $total_achieved[] = 0;
        }
        foreach ($target_details as $key => $value) {
            $total_target_amount[] = TargetDetails::where('target_id',$value->target_id)->sum('target_amount');

            $total_achieved[] = SaleEntry::where('salesman_id',$value->salesman_id)->sum('total_net_value');

        }
        return view('admin.master.target_details.view',compact('target_details','total_target_amount','total_achieved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales_man = SalesMan::all();
        $locations = Location::all();
        return view('admin.master.target_details.add',compact('sales_man','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_date = date('Y-m-d');
        $sales_man_target = new SalesManTarget();

        $sales_man_target->salesman_id = $request->salesman_id;
        $sales_man_target->created_date = $current_date;

        $sales_man_target->save();
        $target_id = $sales_man_target->id;
        foreach ($request->target_amount as $key => $value) 
        {
            $target_details = new TargetDetails();

            $target_details->target_id = $target_id;
            $target_details->location_id = $request->location_id[$key];
            $value = ($value == '')? $value=0: $value = $value;
            $target_details->target_amount = $value;
            $target_details->target_date = $request->target_date[$key];
            $target_details->target_from_date = $request->target_from_date[$key];

            $target_details->save();

        }   
        return Redirect::back()->with('success','Successfully Created');     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_man = SalesMan::all();
        $locations = Location::all();
        $target_details = TargetDetails::where('target_id',$id)->get();
        $salesman_target = SalesManTarget::where('target_id',$id)->first();

        foreach ($target_details as $key => $value) {
            
            $achieved[] = SaleEntry::where('salesman_id',$salesman_target->salesman_id)->whereBetween('s_date',[$value->target_from_date,$value->target_date])->where('location',$value->location_id)->sum('total_net_value');

        }
        // echo "<pre>"; print_r($achieved); exit();
        return view('admin.master.target_details.show',compact('sales_man','locations','target_details','salesman_target','achieved'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // echo $id; exit();
        $sales_man = SalesMan::all();
        $locations = Location::all();
        $target_details = TargetDetails::where('target_id',$id)->get();
        $salesman_target = SalesManTarget::where('target_id',$id)->first();
        return view('admin.master.target_details.edit',compact('sales_man','locations','target_details','salesman_target'));
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
        $current_date = date('Y-m-d');
        $sales_man_target = SalesManTarget::where('target_id',$id)->update(['salesman_id' => $request->salesman_id, 'updated_date' => $current_date]);

        // echo "<pre>";print_r($sales_man_target); exit();

        // $sales_man_target->salesman_id = $request->salesman_id;
        // $sales_man_target->updated_date = $current_date;

        // $sales_man_target->save();

        $target_details = TargetDetails::where('target_id',$id)->get();
        foreach ($target_details as $key => $value) 
        {
            
            $values = ($request->target_amount[$key] == '')? $values=0: $values = $request->target_amount[$key];
            $value->target_amount = $values;
            $value->target_date = $request->target_date[$key];
            $value->target_from_date = $request->target_from_date[$key];

            $value->save();

        }   
        return Redirect::back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales_man_target = SalesManTarget::where('target_id',$id);
        $target_details = TargetDetails::where('target_id',$id);

        $sales_man_target->delete();
        $target_details->delete();

        return Redirect::back()->with('success', 'Deleted Successfully');
    }
}
