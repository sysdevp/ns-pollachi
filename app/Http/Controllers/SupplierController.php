<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\AccountType;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Bank;
use App\Models\BankDetails;
use App\Models\CustomerSupplier;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.master.supplier.view', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address_type = AddressType::all();
        $state = State::all();
        $bank = Bank::all();
        $account_type = AccountType::all();
        $exist_supplier_dets = CustomerSupplier::where('type', 'Supplier')->get();

        return view('admin.master.supplier.add', compact('exist_supplier_dets', 'address_type', 'state', 'bank', 'account_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $supplier_id = "";
        if ($request->supplier_type == 0) {
            $customer_supplier_dets = new CustomerSupplier();
            $customer_supplier_dets->name = $request->name;
            $customer_supplier_dets->type = "Supplier";
            $customer_supplier_dets->save();
            $supplier_id = $customer_supplier_dets->id;
        } else {
            $supplier_id = $request->exist_supplier_name;
        }
        $supplier = new Supplier();
        $supplier->company_name = $request->company_name;
        $supplier->name = $request->name;
        $supplier->supplier_type = $request->supplier_type;
        $supplier->supplier_id = $supplier_id;
        $supplier->salutation = $request->salutation;
        $supplier->phone_no = $request->phone_no;
        $supplier->whatsapp_no = $request->whatsapp_no;
        $supplier->email = $request->email;
        $supplier->gst_no = $request->gst_no;
        $supplier->opening_balance = $request->opening_balance;
        $supplier->remark = $request->remark;
        $supplier->created_by = 0;
        $supplier->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();
        if ($supplier->save()) {
            /* Store Supplier Address Details Start Here */
            $batch_insert_array = array();
            foreach ($request->address_type_id as $key => $value) {
                $data_to_store = array(
                    'address_table' => "Supplier",
                    'address_type_id' => $request->address_type_id[$key],
                    'address_ref_id' => $supplier->id,
                    'address_line_1' => $request->address_line_1[$key],
                    'address_line_2' => $request->address_line_2[$key],
                    'land_mark' => $request->land_mark[$key],
                    'country_id' => 1,
                    'state_id' => $request->state_id[$key],
                    'district_id' => $request->district_id[$key],
                    'city_id' => $request->city_id[$key],
                    'postal_code' => $request->postal_code[$key],
                    'created_by' => 0,
                    'updated_by' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                );
                $batch_insert_array[] = $data_to_store;
            }

            if (count($batch_insert_array) > 0) {
                AddressDetails::insert($batch_insert_array);
            }

            /* Store Supplier Address Details End Here */

            /* Store Supplier Bank Details Start Here */
            $batch_insert_for_bank_details = [];
            if ($request->has('bank_id')) {
                foreach ($request->bank_id as $bank_key => $bank_value) {
                    $bank_details_array = array(
                        'ref_table' => "Supplier",
                        'bank_id' => $request->bank_id[$bank_key],
                        'bank_ref_id' => $supplier->id,
                        'branch_id' => $request->branch_id[$bank_key],
                        'account_type_id' => $request->account_type_id[$bank_key],
                        'ifsc' => $request->ifsc[$bank_key],
                        'account_holder_name' => $request->account_holder_name[$bank_key],
                        'account_no' => $request->account_no[$bank_key],
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => $now,
                        'updated_at' => $now,
                    );
                    $batch_insert_for_bank_details[] = $bank_details_array;
                }
            }
            if (count($batch_insert_for_bank_details) > 0) {
                BankDetails::insert($batch_insert_for_bank_details);
            }
            /* Store Supplier Bank Details End Here */
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier, $id)
    {
        $supplier = Supplier::find($id);
        $supplier_bank_details = BankDetails::where('bank_ref_id', $id)->where('ref_table', 'Supplier')->get();
        $supplier_address_details = AddressDetails::where('address_ref_id', $id)->where('address_table', 'Supplier')->get();
        return view('admin.master.supplier.show', compact('supplier', 'supplier_bank_details', 'supplier_address_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier, $id)
    {
        $address_type = AddressType::all();
        $state = State::all();
        $bank = Bank::all();
        $account_type = AccountType::all();
        $supplier = Supplier::find($id);
        $exist_supplier_dets = CustomerSupplier::where('type', 'Supplier')->get();
        $supplier_bank_details = BankDetails::where('bank_ref_id', $id)->where('ref_table', 'Supplier')->get();
        $supplier_address_details = AddressDetails::where('address_ref_id', $id)->where('address_table', 'Supplier')->get();
        return view('admin.master.supplier.edit', compact('exist_supplier_dets', 'supplier', 'supplier_bank_details', 'supplier_address_details', 'address_type', 'state', 'bank', 'account_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier, $id)
    {
        $supplier = Supplier::find($id);
        $supplier_id = "";
        $supplier_type = "";
        if ($request->supplier_type == 0) {

            $exist_supplier_dets = CustomerSupplier::where('name', $request->name)->where('type', 'Supplier')->get();

            if (count($exist_supplier_dets) > 0) {
                $supplier_id = $exist_supplier_dets[0]->id;
                $supplier_type = "1";
            } else {
                $customer_supplier_dets = new CustomerSupplier();
                $customer_supplier_dets->name = $request->name;
                $customer_supplier_dets->type = "Supplier";
                $customer_supplier_dets->save();
                $supplier_id = $exist_supplier_dets->id;
                $supplier_type = "0";
            }
        } else {
            $supplier_id = $request->exist_supplier_name;
            $supplier_type = "1";
        }
        $supplier->company_name = $request->company_name;
        $supplier->name = $request->name;
        $supplier->supplier_type = $supplier_type;
        $supplier->supplier_id = $supplier_id;
        $supplier->salutation = $request->salutation;
        $supplier->phone_no = $request->phone_no;
        $supplier->whatsapp_no = $request->whatsapp_no;
        $supplier->email = $request->email;
        $supplier->gst_no = $request->gst_no;
        $supplier->opening_balance = $request->opening_balance;
        $supplier->remark = $request->remark;
        $supplier->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();
        if ($supplier->save()) {
            /* Store Supplier Address Details Start Here */
            $batch_insert_array = array();
            if ($request->has('address_type_id')) {
                foreach ($request->address_type_id as $key => $value) {
                    $data_to_store = array(
                        'address_table' => "Supplier",
                        'address_type_id' => $request->address_type_id[$key],
                        'address_ref_id' => $supplier->id,
                        'address_line_1' => $request->address_line_1[$key],
                        'address_line_2' => $request->address_line_2[$key],
                        'land_mark' => $request->land_mark[$key],
                        'country_id' => 1,
                        'state_id' => $request->state_id[$key],
                        'district_id' => $request->district_id[$key],
                        'city_id' => $request->city_id[$key],
                        'postal_code' => $request->postal_code[$key],
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => $now,
                        'updated_at' => $now,
                    );
                    $batch_insert_array[] = $data_to_store;
                }
            }

            if (count($batch_insert_array) > 0) {
                AddressDetails::insert($batch_insert_array);
            }

            /* Store Supplier Address Details End Here */

            /* Store Supplier Bank Details Start Here */
            $batch_insert_for_bank_details = [];
            if ($request->has('bank_id')) {
                foreach ($request->bank_id as $bank_key => $bank_value) {
                    $bank_details_array = array(
                        'ref_table' => "Supplier",
                        'bank_id' => $request->bank_id[$bank_key],
                        'bank_ref_id' => $supplier->id,
                        'branch_id' => $request->branch_id[$bank_key],
                        'account_type_id' => $request->account_type_id[$bank_key],
                        'ifsc' => $request->ifsc[$bank_key],
                        'account_holder_name' => $request->account_holder_name[$bank_key],
                        'account_no' => $request->account_no[$bank_key],
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => $now,
                        'updated_at' => $now,
                    );
                    $batch_insert_for_bank_details[] = $bank_details_array;
                }
            }
            if (count($batch_insert_for_bank_details) > 0) {
                BankDetails::insert($batch_insert_for_bank_details);
            }
            /* Store Supplier Bank Details End Here */


            /* Update Existing Address Details Start Here */
            if ($request->has('old_address_type_id')) {
                foreach ($request->old_address_type_id as $key => $value) {
                    $address_details = AddressDetails::find($request->address_details_id[$key]);
                    $address_details->address_table = "Supplier";
                    $address_details->address_type_id = $request->old_address_type_id[$key];
                    $address_details->address_ref_id = $supplier->id;
                    $address_details->address_line_1 = $request->old_address_line_1[$key];
                    $address_details->address_line_2 = $request->old_address_line_2[$key];
                    $address_details->land_mark = $request->old_land_mark[$key];
                    $address_details->country_id = 1;
                    $address_details->state_id = $request->old_state_id[$key];
                    $address_details->district_id = $request->old_district_id[$key];
                    $address_details->city_id = $request->old_city_id[$key];
                    $address_details->postal_code = $request->old_postal_code[$key];
                    $address_details->updated_by = 0;
                    $address_details->updated_at = $now;
                    $address_details->save();
                }
            }

            /* Update Existing Address Details End Here */



            /* Update Existing Bank Details Start Here */
            if ($request->has('old_bank_id')) {
                foreach ($request->old_bank_id as $old_bank_key => $value) {
                    $bank_details = BankDetails::find($request->bank_details_id[$old_bank_key]);
                    $bank_details->ref_table = "Supplier";
                    $bank_details->bank_id = $request->old_bank_id[$old_bank_key];
                    $bank_details->bank_ref_id = $supplier->id;
                    $bank_details->branch_id = $request->old_branch_id[$old_bank_key];
                    $bank_details->account_type_id = $request->old_account_type_id[$old_bank_key];
                    $bank_details->ifsc = $request->old_ifsc[$old_bank_key];
                    $bank_details->account_holder_name = $request->old_account_holder_name[$old_bank_key];
                    $bank_details->account_no = $request->old_account_no[$old_bank_key];
                    $bank_details->updated_by = 1;
                    $bank_details->updated_at = $now;
                    $bank_details->save();
                }
            }

            /* Update Existing Bank Details End Here */




            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier, $id)
    {
        $supplier = Supplier::find($id);
        if ($supplier->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.supplier.index');
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
                    $company_name=$filesop[2];   echo "</br>";
                    $name=$filesop[3];   echo "</br>";
                    $code=$filesop[4];   echo "</br>";
                    $phone_no=$filesop[5];   echo "</br>";
                    $whatsapp_no=$filesop[6];   echo "</br>";
                    $email=$filesop[7];   echo "</br>";
                    $gst_no=$filesop[8];   echo "</br>";
                    $opening_balance=$filesop[9];   echo "</br>";
                    $remark=$filesop[10];   echo "</br>";
                    // $supplier_mode=$filesop[14];   echo "</br>";
                    // $status=$filesop[15];   echo "</br>";

                    $insert  = TRUE;
                   
        }
        if($insert == 1)
        {
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                    $salutation=$filesop[1];   echo "</br>";
                    $company_name=$filesop[2];   echo "</br>";
                    $name=$filesop[3];   echo "</br>";
                    $code=$filesop[4];   echo "</br>";
                    $phone_no=$filesop[5];   echo "</br>";
                    $whatsapp_no=$filesop[6];   echo "</br>";
                    $email=$filesop[7];   echo "</br>";
                    $gst_no=$filesop[8];   echo "</br>";
                    $opening_balance=$filesop[9];   echo "</br>";
                    $remark=$filesop[10];   echo "</br>";
                    // $supplier_mode=$filesop[14];   echo "</br>";
                    // $status=$filesop[15];   echo "</br>";

                    $supplier =new Supplier();

                    $supplier->company_name       = $company_name;
                    $supplier->name       = $name;
                    $supplier->code      =  $code;
                    $supplier->phone_no      =  $phone_no;
                    $supplier->email      =  $email;
                    $supplier->whatsapp_no      =  $whatsapp_no;
                    $supplier->gst_no      =  $gst_no;
                    $supplier->opening_balance      =  $opening_balance;
                    $supplier->remark      =  $remark;
                    // $supplier->save();

                    if($supplier->save())
                    {
                        $address_line_1=$filesop[11];   echo "</br>";
                        $address_line_2=$filesop[12];   echo "</br>";
                        $land_mark=$filesop[13];   echo "</br>";
                        $state_name=$filesop[14];   echo "</br>";
                        $district_name=$filesop[15];   echo "</br>";
                        $city_name=$filesop[16];   echo "</br>";
                        $postal_code=$filesop[17];   echo "</br>";

                        $bank_name=$filesop[18];   echo "</br>";
                        $branch_name=$filesop[19];   echo "</br>";
                        $ifsc=$filesop[20];   echo "</br>";
                        $account_type=$filesop[21];   echo "</br>";
                        $account_holder_name=$filesop[22];   echo "</br>";
                        $account_no=$filesop[23];   echo "</br>";

                        $state = State::where('name',$state_name)->first();
                        $state_id = @$state->id;

                        $district = District::where('name',$district_name)->first();
                        $district_id = @$district->id;

                        $city = City::where('name',$city_name)->first();
                        $city_id = @$city->id;

                        $bank_name = str_replace(' ', '', $bank_name);
                        $banks=Bank::whereRaw("REPLACE(`name`, ' ' ,'') = '".$bank_name."'")->first();

                        $branch_name = str_replace(' ', '', $branch_name);
                        $branches=Bankbranch::whereRaw("REPLACE(`name`, ' ' ,'') = '".$branch_name."'")->first();

                        $account_type = str_replace(' ', '', $account_type);
                        $accounttypes=AccountType::whereRaw("REPLACE(`name`, ' ' ,'') = '".$account_type."'")->first();

                        $bank_id = @$banks->id;
                        $branch_id = @$branches->id;
                        $account_type_id = @$accounttypes->id;

                        $supplier_address =new AddressDetails();

                        $supplier_address->address_table='Supplier';
                        $supplier_address->address_ref_id=$supplier->id;
                        $supplier_address->address_line_1=$address_line_1;
                        $supplier_address->address_line_2=$address_line_2;
                        $supplier_address->land_mark=$land_mark;
                        $supplier_address->state_id=$state_id;
                        $supplier_address->district_id=$district_id;
                        $supplier_address->city_id=$city_id;
                        $supplier_address->postal_code=$postal_code;

                        $supplier_address->save();

                        $bank_details =new BankDetails();

                        $bank_details->ref_table='Supplier';
                        $bank_details->bank_ref_id=$supplier->id;
                        $bank_details->bank_id=$bank_id;
                        $bank_details->branch_id=$branch_id;
                        $bank_details->account_type_id=$account_type_id;
                        $bank_details->ifsc=$ifsc;
                        $bank_details->account_holder_name=$account_holder_name;
                        $bank_details->account_no=$account_no;
                        
                        $bank_details->save();

                    }

            }
            // exit();
        }

        return Redirect::back()->with('success', 'Uploaded');    
    }

    public function checkname(Request $request)
    {
        $name = strtolower($request->name);
        $string = preg_replace('/\s+/', '', $name);

        $supplier = Supplier::all();

        foreach ($supplier as $key => $value) {
            $supplier_name = preg_replace('/\s+/', '', $value->name);
            $name_data = strtolower($supplier_name);
            if($string == $name_data)
            {
                return '1';
            }
        }

    }

    public function delete_supplier_address_details(Request $request)
    {
        $address_details_id = $request->address_details_id;
        $address_details = AddressDetails::find($address_details_id);
        if ($address_details->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete_supplier_bank_details(Request $request)
    {
        $bank_details_id = $request->bank_details_id;
        $bank_details = BankDetails::find($bank_details_id);
        if ($bank_details->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
