<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LocationType;
use App\Models\ProofDetails;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Image;
use Storage;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employee=Employee::all();
        return view('admin.master.employee.view',compact('employee'));
    }

   
    public function create()
    {
        $department=Department::all();
        $address_type=AddressType::all();
        $state=State::all();
        return view('admin.master.employee.add',compact('department','address_type','state'));
    }

   
    public function store(Request $request)
    {

        $employee = new Employee();
        $profile_name="";
        $destinationPath = 'storage/employee_profile/';
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }

        $employee->salutation       = $request->salutation;
        $employee->name       = $request->name;
        $employee->code      =  $request->code;
        $employee->phone_no      =  $request->phone_no;
        $employee->email      =  $request->email;
        $dob = ($request->dob !="")  ? $dob = date('Y-m-d',strtotime($request->dob)) :$dob = null ;
        $employee->dob      =  $dob;
        $employee->department_id      =  $request->department_id;
        $employee->father_name      =  $request->father_name;
        $employee->blood_group      =  $request->blood_group;
        $employee->material_status      =  $request->material_status;
        $employee->access_no      =  $request->access_no;
        $employee->profile      =  $profile_name;
        $employee->created_by = 0;
        $employee->updated_by = 0;




        $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
      if ($employee->save()) {
        $batch_insert_array=array();
        if($request->has('address_line_1')){
        foreach($request->address_type_id as $key=>$value){
            $data_to_store=array(
                'address_table'=>"Emp",
                'address_type_id'=>$request->address_type_id[$key],
                'address_ref_id'=>$employee->id,
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
        }

        $batch_insert_for_proof_details=array();
         if($request->hasfile('proof_file'))
                {
                    foreach($request->file('proof_file') as $keys=>$image)
                   {
                       $name=date('Y-m-d').time().'.'.$image->getClientOriginalName();
                       $image->move('storage/employee_proof_details', $name);  
                       $proof_details=array(
                        'proof_table'=>"Emp",
                        'proof_ref_id'=>$employee->id,
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

    public function show(Employee $employee,$id)
    {
        $employee=Employee::find($id);
        $employee_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Emp')->get();
        $employee_proof_details=ProofDetails::where('proof_ref_id',$id)->where('proof_table','Emp')->get();
        return view('admin.master.employee.show',compact('employee','employee_address_details','employee_proof_details'));
    }

   
    public function edit(Employee $employee,$id)
    {
       $employee=Employee::find($id);
        $department=Department::all();
        $state=State::all();
        $address_type =AddressType::all();
        $employee_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Emp')->get();
        $employee_proof_details=ProofDetails::where('proof_ref_id',$id)->where('proof_table','Emp')->get();
        return view('admin.master.employee.edit',compact('employee_proof_details','employee','department','state','employee_address_details','address_type'));
    }

    
    public function update(Request $request, Employee $employee,$id)
    { 
       // echo "<pre>";print_r($request->all());exit;

        $user=User::where('employee_id',$id)->update(['email' => $request->email]);

        // print_r($request->email); exit();

        $employee = Employee::find($id);
        $profile_name=$employee->profile;
        $destinationPath = 'storage/employee_profile/';
        if ($request->hasFile('profile')) {
            if(file_exists($destinationPath.$profile_name)){
                @unlink($destinationPath.$profile_name);
            }
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
           
            $profile->move($destinationPath, $profile_name);
          
           }

   
    $employee->salutation       = $request->salutation;
    $employee->name       = $request->name;
    $employee->code      =  $request->code;
    $employee->phone_no      =  $request->phone_no;
    $employee->email      =  $request->email;
    $dob = ($request->dob !="")  ? $dob = date('Y-m-d',strtotime($request->dob)) :$dob = null ;
        $employee->dob      =  $dob;
    $employee->department_id      =  $request->department_id;
    $employee->father_name      =  $request->father_name;
    $employee->blood_group      =  $request->blood_group;
    $employee->material_status      =  $request->material_status;
    $employee->access_no      =  $request->access_no;
    $employee->profile      =  $profile_name;
    $employee->created_by = 0;
    $employee->updated_by = 0;
    $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
      if ($employee->save()) {
        $batch_insert_array=array();

        /* Insert New Address Details Start Here */
        if(isset($request->address_type_id)){
        foreach($request->address_type_id as $key=>$value){
            $data_to_store=array(
                'address_table'=>"Emp",
                'address_type_id'=>$request->address_type_id[$key],
                'address_ref_id'=>$employee->id,
                'address_line_1'=>$request->address_line_1[$key],
                'address_line_2'=>$request->address_line_2[$key],
                'land_mark'=>$request->land_mark[$key],
                // 'country_id'=>$request->country_id[$key],
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


         $batch_insert_for_proof_details=array();
         if($request->hasfile('proof_file'))
                {
                    foreach($request->file('proof_file') as $keys=>$image)
                   {
                       $name=date('Y-m-d').time().'.'.$image->getClientOriginalName();
                       $image->move('storage/employee_proof_details', $name);  
                       $proof_details=array(
                        'proof_table'=>"Emp",
                        'proof_ref_id'=>$employee->id,
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

                      if(count($batch_insert_for_proof_details)>0){
                        ProofDetails::insert($batch_insert_for_proof_details);
                     }
                }

         /* Update Existing Address Deatils Start Here */
         if(isset($request->old_address_type_id)){
            foreach($request->old_address_type_id as $key=>$value){
                $address_details=AddressDetails::find($request->address_details_id[$key]);

                $address_details->address_table="Emp";
                $address_details->address_type_id=$request->old_address_type_id[$key];
                $address_details->address_ref_id=$employee->id;
                $address_details->address_line_1=$request->old_address_line_1[$key];
                $address_details->address_line_2=$request->old_address_line_2[$key];
                $address_details->land_mark=$request->old_land_mark[$key];
                // $address_details->country_id=$request->old_country_id[$key];
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

         /* Update Exsiting Proof Details Start Here */
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
                        $image->move('storage/employee_proof_details', $name);  
                    }
                    $proof_details->proof_table="Emp";
                    $proof_details->proof_ref_id=$employee->id;
                    $proof_details->name=$request->old_proof_name[$proof_key];
                    $proof_details->number=$request->old_proof_number[$proof_key];
                    $proof_details->file=$name;
                    $proof_details->updated_by=0;
                    $proof_details->save();
                }
            }

         /* Update Exsiting Proof Details End Here */






            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

   
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::where('employees.id',$id)->delete();
        if ($employee) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.employee.index');
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

                    $salutation=$filesop[0];   echo "</br>";
                    $name=$filesop[1];   echo "</br>";
                    $code=$filesop[2];   echo "</br>";
                    $phone_no=$filesop[3];   echo "</br>";
                    $email=$filesop[4];   echo "</br>";
                    $dob=$filesop[5];   echo "</br>";
                    $department_id=$filesop[6];   echo "</br>";
                    $father_name=$filesop[7];   echo "</br>";
                    $blood_group=$filesop[8];   echo "</br>";
                    $material_status=$filesop[9];   echo "</br>";
                    $access_no=$filesop[10];   echo "</br>";

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
                    $department_name=$filesop[7];   echo "</br>";
                    $father_name=$filesop[8];   echo "</br>";
                    $blood_group=$filesop[9];   echo "</br>";
                    $material_status=$filesop[10];   echo "</br>";
                    $access_no=$filesop[11];   echo "</br>";
                    // echo $dob;
                    $department = Department::where('name',$department_name)->first();
                    $depart_id = @$department->id;

                    $employee =new Employee();

                    $employee->name       = $name;
                    $employee->code      =  $code;
                    $employee->phone_no      =  $phone_no;
                    $employee->email      =  $email;
                    $employee->dob      =  $dob;
                    $employee->department_id      =  $depart_id;
                    $employee->father_name      =  $father_name;
                    $employee->blood_group      =  $blood_group;
                    $employee->material_status      =  $material_status;
                    $employee->access_no      =  $access_no;

                    // $employee->save();

                    if($employee->save())
                    {
                        $address_line_1=$filesop[12];   echo "</br>";
                        $address_line_2=$filesop[13];   echo "</br>";
                        $land_mark=$filesop[14];   echo "</br>";
                        $state_name=$filesop[15];   echo "</br>";
                        $district_name=$filesop[16];   echo "</br>";
                        $city_name=$filesop[17];   echo "</br>";
                        $postal_code=$filesop[18];   echo "</br>";
                        $proof_name=$filesop[19];   echo "</br>";
                        $proof_number=$filesop[20];   echo "</br>";

                        $state = State::where('name',$state_name)->first();
                        $state_id = @$state->id;

                        $district = District::where('name',$district_name)->first();
                        $district_id = @$district->id;

                        $city = City::where('name',$city_name)->first();
                        $city_id = @$city->id;

                        $employee_address =new AddressDetails();

                        $employee_address->address_table='Emp';
                        $employee_address->address_ref_id=$employee->id;
                        $employee_address->address_line_1=$address_line_1;
                        $employee_address->address_line_2=$address_line_2;
                        $employee_address->land_mark=$land_mark;
                        $employee_address->state_id=$state_id;
                        $employee_address->district_id=$district_id;
                        $employee_address->city_id=$city_id;
                        $employee_address->postal_code=$postal_code;

                        $employee_address->save();

                        $employee_proof =new ProofDetails();

                        $employee_proof->proof_table='Emp';
                        $employee_proof->proof_ref_id=$employee->id;
                        $employee_proof->name=$proof_name;
                        $employee_proof->number=$proof_number;

                        $employee_proof->save();

                    }

            }
            // exit();
        }

        return Redirect::back()->with('success', 'Uploaded');    
    }


    public function delete_employee_address_details(Request $request){
        $address_details_id=$request->address_details_id;
        $address_details=AddressDetails::find($address_details_id);
        if($address_details->delete()){
             echo 1;
        }else{
            echo 0;
        }
    }

    
    public function delete_employee_proof_details(Request $request){
        $proof_details_id=$request->proof_details_id;
        $proof_details=ProofDetails::find($proof_details_id);
        $destinationPath = 'storage/employee_proof_details/';
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
