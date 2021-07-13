<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Agent;
use App\Models\ProofDetails;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    
    public function index()
    {
        $agent=Agent::all();
        return view('admin.master.agent.view',compact('agent'));
    }

    
    public function create()
    {
        
        $address_type=AddressType::all();
        $state=State::all();
        return view('admin.master.agent.add',compact('address_type','state'));
    }

    
    public function store(AgentRequest $request)
    {
        $agent = new Agent();
         $profile_name="";
         $destinationPath = 'storage/agent_profile/';
         if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }
        $agent->salutation       = $request->salutation;
        $agent->name       = $request->name;
        $agent->code      =  $request->code;
        $agent->phone_no      =  $request->phone_no;
        $agent->email      =  $request->email;
        $agent->dob      =  isset($request->dob) && $request->dob !="" ? date('Y-m-d',strtotime($request->dob)) : "" ;
        $agent->father_name      =  $request->father_name;
        $agent->blood_group      =  $request->blood_group;
        $agent->material_status      =  $request->material_status;
        $agent->profile      =  $profile_name;
        $agent->created_by = 0;
        $agent->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();
        if ($agent->save()) {
            $batch_insert_array=array();
            foreach($request->address_type_id as $key=>$value){
                $data_to_store=array(
                    'address_table'=>"Agent",
                    'address_type_id'=>$request->address_type_id[$key],
                    'address_ref_id'=>$agent->id,
                    'address_line_1'=>$request->address_line_1[$key],
                    'address_line_2'=>$request->address_line_2[$key],
                    'land_mark'=>$request->land_mark[$key],
                    'country_id'=>1,
                    'state_id'=>$request->state_id[$key],
                    'district_id'=>$request->district_id[$key],
                    'city_id'=>$request->city_id[$key],
                    'postal_code'=>$request->postal_code[$key],
                    'created_by'=>0,
                    'updated_by'=>0,
                    'created_at'=>$now,
                    'updated_at'=>$now,
                   );
                   $batch_insert_array[]=$data_to_store;
                }
                $batch_insert_for_proof_details=array();



                if($request->hasfile('proof_file'))
                {
        
                   foreach($request->file('proof_file') as $keys=>$image)
                   {
                       $name=date('Y-m-d').time().'.'.$image->getClientOriginalName();
                       $image->move('storage/agent_proof_details', $name);  
                       $proof_details=array(
                        'proof_table'=>"Agent",
                        'proof_ref_id'=>$agent->id,
                        'name'=>$request->proof_name[$keys],
                        'number'=>$request->proof_number[$keys],
                        'file'=>$name,
                        'created_by'=>0,
                        'updated_by'=>0,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                       );

                       $batch_insert_for_proof_details[]=$proof_details;
                    }
                }

            if(count($batch_insert_array)>0){
                    AddressDetails::insert($batch_insert_array);
                }

                if(count($batch_insert_for_proof_details)>0){
                  
                   ProofDetails::insert($batch_insert_for_proof_details);
                }
               
 
    
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent,$id)
    {
        $agent=Agent::find($id);
        $agent_proof_details=ProofDetails::where('proof_ref_id',$id)->where('proof_table','Agent')->get();
        $agent_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Agent')->get();
         return view('admin.master.agent.show',compact('agent','agent_address_details','agent_proof_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent,$id)
    {
        $address_type=AddressType::all();
        $state=State::all();
        $agent=Agent::find($id);
        $agent_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Agent')->get();
        $agent_proof_details=ProofDetails::where('proof_ref_id',$id)->where('proof_table','Agent')->get();
         return view('admin.master.agent.edit',compact('agent','agent_address_details','address_type','state','agent_proof_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(AgentRequest $request, Agent $agent,$id)
    {
        //echo "<pre>";print_r($request->all());exit;
       $agent = Agent::find($id);
        $profile_name=$agent->profile;
        $destinationPath = 'storage/agent_profile/';
        if ($request->hasFile('profile')) {
            if(file_exists($destinationPath.$profile_name)){
                @unlink($destinationPath.$profile_name);
            }
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
           
            $profile->move($destinationPath, $profile_name);
          
           }
     
    $agent->salutation       = $request->salutation;
    $agent->name       = $request->name;
    $agent->code      =  $request->code;
    $agent->phone_no      =  $request->phone_no;
    $agent->email      =  $request->email;
    $agent->dob      =  isset($request->dob) && $request->dob !="" ? date('Y-m-d',strtotime($request->dob)) : "" ;
    $agent->father_name      =  $request->father_name;
    $agent->blood_group      =  $request->blood_group;
    $agent->material_status      =  $request->material_status;
    $agent->profile      =  $profile_name;
   $agent->created_by = 0;
    $agent->updated_by = 0;
    $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
      if ($agent->save()) {
        $batch_insert_array=array();

        /* Insert New Address Details Start Here */
        if(isset($request->address_type_id)){
        foreach($request->address_type_id as $key=>$value){
            $data_to_store=array(
                'address_table'=>"Agent",
                'address_type_id'=>$request->address_type_id[$key],
                'address_ref_id'=>$agent->id,
                'address_line_1'=>$request->address_line_1[$key],
                'address_line_2'=>$request->address_line_2[$key],
                'land_mark'=>$request->land_mark[$key],
                'country_id'=>$request->country_id[$key],
                'state_id'=>$request->state_id[$key],
                'district_id'=>$request->district_id[$key],
                'city_id'=>$request->city_id[$key],
                'postal_code'=>$request->postal_code[$key],
                'created_by'=>0,
                'updated_by'=>0,
                'created_at'=>$now,
                'updated_at'=>$now,
               );
               $batch_insert_array[]=$data_to_store;
            }
            
            if(count($batch_insert_array)>0){
                AddressDetails::insert($batch_insert_array);
              
            }
        }
         /* Insert New Address Details End Here */

         /* Update Existing Address Deatils Start Here */
         if(isset($request->old_address_type_id)){
            foreach($request->old_address_type_id as $key=>$value){
                $address_details=AddressDetails::find($request->address_details_id[$key]);

                $address_details->address_table="Agent";
                $address_details->address_type_id=$request->old_address_type_id[$key];
                $address_details->address_ref_id=$agent->id;
                $address_details->address_line_1=$request->old_address_line_1[$key];
                $address_details->address_line_2=$request->old_address_line_2[$key];
                $address_details->land_mark=$request->old_land_mark[$key];
                $address_details->country_id=$request->old_country_id[$key];
                $address_details->state_id=$request->old_state_id[$key];
                $address_details->district_id=$request->old_district_id[$key];
                $address_details->city_id=$request->old_city_id[$key];
                $address_details->postal_code=$request->old_postal_code[$key];
                $address_details->created_by=0;
                $address_details->updated_by=0;
                $address_details->created_at=$now;
                $address_details->updated_at=$now;
                $address_details->save();   
                }
                
            }
         /* Update Existing Address Detils End Here */
         $batch_insert_for_proof_details=[];
         /* Insert New Proof Details Start Here */
         if(isset($request->proof_name))
         {
         if($request->hasfile('proof_file'))
                {
        
                   foreach($request->file('proof_file') as $keys=>$image)
                   {
                       $name=date('Y-m-d').time().'.'.$image->getClientOriginalName();
                       $image->move('storage/agent_proof_details', $name);  
                        $proof_details=array(
                        'proof_table'=>"Agent",
                        'proof_ref_id'=>$agent->id,
                        'name'=>$request->proof_name[$keys],
                        'number'=>$request->proof_number[$keys],
                        'file'=>$name,
                        'created_by'=>0,
                        'updated_by'=>0,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                       );

                       $batch_insert_for_proof_details[]=$proof_details;
                    }
                }
            }

            if(count($batch_insert_for_proof_details)>0){
                  
                ProofDetails::insert($batch_insert_for_proof_details);
             }
         /* Insert New Proof Details End Here */






         /* Update Proof Details Start Here */
         if(isset($request->old_proof_name))
         {
                foreach($request->old_proof_name as $proof_key=>$value)
                {
                    
                    $proof_details=ProofDetails::find($request->proof_details_id[$proof_key]);
                    $name=$proof_details->file;
                    
                    if(isset($request->old_proof_file[$proof_key]) && $request->old_proof_file[$proof_key] !="")
                    {
                        $image=$request->old_proof_file[$proof_key];
                        $name=date('Y-m-d').time().'.'.$image->getClientOriginalName();
                        $image->move('storage/agent_proof_details', $name);  
                    }
                    $proof_details->proof_table="Agent";
                    $proof_details->proof_ref_id=$agent->id;
                    $proof_details->name=$request->old_proof_name[$proof_key];
                    $proof_details->number=$request->old_proof_number[$proof_key];
                    $proof_details->file=$name;
                    $proof_details->updated_by=0;
                    $proof_details->save();
                }
            }
         /* Update Proof Details End Here */







            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent,$id)
    {
       
        $agent = Agent::where('agents.id',$id)->delete();
        if ($agent) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }

    public function import()
    {
       return view('admin.master.agent.index');
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

                    $salutation=$filesop[1];   echo "</br>";
                    $name=$filesop[2];   echo "</br>";
                    $code=$filesop[3];   echo "</br>";
                    $phone_no=$filesop[4];   echo "</br>";
                    $email=$filesop[5];   echo "</br>";
                    $dob=$filesop[6];   echo "</br>";
                    $father_name=$filesop[7];   echo "</br>";
                    $blood_group=$filesop[8];   echo "</br>";
                    $material_status=$filesop[9];   echo "</br>";

                    $insert  = TRUE;
                   
        }
        if($insert == 1)
        {
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                    $salutation=$filesop[1];   echo "</br>";
                    $name=$filesop[2];   echo "</br>";
                    $code=$filesop[3];   echo "</br>";
                    $phone_no=$filesop[4];   echo "</br>";
                    $email=$filesop[5];   echo "</br>";
                    $dob=$filesop[6];   echo "</br>";
                    $father_name=$filesop[7];   echo "</br>";
                    $blood_group=$filesop[8];   echo "</br>";
                    $material_status=$filesop[9];   echo "</br>";

                    $agent =new Agent();

                    $agent->name       = $name;
                    $agent->code      =  $code;
                    $agent->phone_no      =  $phone_no;
                    $agent->email      =  $email;
                    $agent->dob      =  $dob;
                    $agent->father_name      =  $father_name;
                    $agent->blood_group      =  $blood_group;
                    $agent->material_status      =  $material_status;

                    if($agent->save())
                    {
                        $address_line_1=$filesop[10];   echo "</br>";
                        $address_line_2=$filesop[11];   echo "</br>";
                        $land_mark=$filesop[12];   echo "</br>";
                        $state_name=$filesop[13];   echo "</br>";
                        $district_name=$filesop[14];   echo "</br>";
                        $city_name=$filesop[15];   echo "</br>";
                        $postal_code=$filesop[16];   echo "</br>";
                        $proof_name=$filesop[17];   echo "</br>";
                        $proof_number=$filesop[18];   echo "</br>";

                        $state = State::where('name',$state_name)->first();
                        $state_id = @$state->id;

                        $district = District::where('name',$district_name)->first();
                        $district_id = @$district->id;

                        $city = City::where('name',$city_name)->first();
                        $city_id = @$city->id;

                        $agent_address =new AddressDetails();

                        $agent_address->address_table='Agent';
                        $agent_address->address_ref_id=$agent->id;
                        $agent_address->address_line_1=$address_line_1;
                        $agent_address->address_line_2=$address_line_2;
                        $agent_address->land_mark=$land_mark;
                        $agent_address->state_id=$state_id;
                        $agent_address->district_id=$district_id;
                        $agent_address->city_id=$city_id;
                        $agent_address->postal_code=$postal_code;

                        $agent_address->save();

                        $agent_proof =new ProofDetails();

                        $agent_proof->proof_table='Agent';
                        $agent_proof->proof_ref_id=$agent->id;
                        $agent_proof->name=$proof_name;
                        $agent_proof->number=$proof_number;

                        $agent_proof->save();


                    }

            }
            // exit();
        }

        return Redirect::back()->with('success', 'Uploaded');    
    }

    public function delete_agent_address_details(Request $request){
        $address_details_id=$request->address_details_id;
        $address_details=AddressDetails::find($address_details_id);
        if($address_details->delete()){
             echo 1;
        }else{
            echo 0;
        }


    }

    public function checkname(Request $request)
    {
        $name = strtolower($request->name);
        $string = preg_replace('/\s+/', '', $name);

        $agent = Agent::all();

        foreach ($agent as $key => $value) {
            $agent_name = preg_replace('/\s+/', '', $value->name);
            $name_data = strtolower($agent_name);
            if($string == $name_data)
            {
                return '1';
            }
        }

    }

    public function delete_agent_proof_details(Request $request){
        $proof_details_id=$request->proof_details_id;
        $proof_details=ProofDetails::find($proof_details_id);
        $destinationPath = 'storage/agent_proof_details/';
        if(file_exists($destinationPath.$proof_details->file)){
            @unlink($destinationPath.$proof_details->file);
        }

        if($proof_details->delete()){
             echo 1;
        }else{
            echo 0;
        }

    }
}
