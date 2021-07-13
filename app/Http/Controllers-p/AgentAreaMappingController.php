<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentAreaMapping;
use App\Models\AgentAreaMappingDetails;
use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AgentAreaMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent_area_mapping=AgentAreaMapping::all();
        return view('admin.master.agent_area_mapping.view',compact('agent_area_mapping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area=Area::all();
        $agent=Agent::all();
        return view('admin.master.agent_area_mapping.add',compact('area','agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agent_id' => 'required|unique:agent_area_mappings,agent_id,NULL,id,deleted_at,NULL',
            'area_id' => 'required|unique:agent_area_mapping_details,area_id,NULL,id,deleted_at,NULL,agent_area_mapping_id,NULL',
          ])->validate();

        $agent_area_mapping = new AgentAreaMapping();
        $agent_area_mapping->agent_id       = $request->agent_id;
        $agent_area_mapping->created_by = 0;
        $now = Carbon::now()->toDateTimeString();
       if ($agent_area_mapping->save()) {
        $batch_insert_array=[];
        foreach($request->area_id as $area_key=>$area_value)
        {
            $data_to_store=array(
                'area_id'=>$area_value,
                'agent_area_mapping_id'=>$agent_area_mapping->id,
                'created_by'=>0,
                'created_at'=>$now,
             );
             $batch_insert_array[]=$data_to_store;
         }

         if(count($batch_insert_array)>0){
            AgentAreaMappingDetails::insert($batch_insert_array);
        }
          return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgentAreaMapping  $agentAreaMapping
     * @return \Illuminate\Http\Response
     */
    public function show(AgentAreaMapping $agentAreaMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgentAreaMapping  $agentAreaMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(AgentAreaMapping $agentAreaMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgentAreaMapping  $agentAreaMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgentAreaMapping $agentAreaMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgentAreaMapping  $agentAreaMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgentAreaMapping $agentAreaMapping)
    {
        //
    }
}
