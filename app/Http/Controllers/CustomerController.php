<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\AccountType;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Bank;
use App\Models\Bankbranch;
use App\Models\BankDetails;
use App\Models\Customer;
use App\Models\CustomerSupplier;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\PriceLevel;
use App\Models\SalesMan;
use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = Customer::all();
        return view('admin.master.customer.view', compact('customer'));
    }


    public function create()
    {
        $address_type = AddressType::all();
        $state = State::all();
        $bank = Bank::all();
        $price_level = PriceLevel::all();
        $account_type = AccountType::all();
        $salesman = SalesMan::all();
        $exist_customer_dets = CustomerSupplier::where('type', 'Customer')->get();
        return view('admin.master.customer.add', compact('address_type', 'state', 'bank', 'account_type', 'exist_customer_dets','price_level','salesman'));
    }


    public function store(Request $request)
    {
        $customer_id = "";
        if ($request->customer_type == 0) {
            $customer_supplier_dets = new CustomerSupplier();
            $customer_supplier_dets->name = $request->name;
            $customer_supplier_dets->type = "Customer";
            $customer_supplier_dets->save();
            $customer_id = $customer_supplier_dets->id;
        } else {
            $customer_id = $request->exist_customer_name;
        }

        $customer = new Customer();
        $customer->company_name = $request->company_name;
        $customer->name = $request->name;
        $customer->customer_type = $request->customer_type;
        $customer->customer_id = $customer_id;
        $customer->salutation = $request->salutation;
        $customer->phone_no = $request->phone_no;
        $customer->whatsapp_no = $request->whatsapp_no;
        $customer->email = $request->email;
        $customer->pan_card = $request->pan_card;
        $customer->gst_no = $request->gst_no;
        $customer->max_credit_limit = $request->max_credit_limit;
        $customer->max_credit_days = $request->max_credit_days;
        $customer->opening_balance = $request->opening_balance;
        $customer->remark = $request->remark;
        $customer->price_level = $request->price_level;
        $customer->salesman = $request->salesman;
        $customer->customer_mode = $request->customer_mode;
        $customer->created_by = 0;
        $customer->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();

        if ($customer->save()) {

            $batch_insert_array = array();
            if($request->has('address_line_1')){
            foreach ($request->address_type_id as $key => $value) {
                $data_to_store = array(
                    'address_table' => "Cus",
                    'address_type_id' => $request->address_type_id[$key],
                    'address_ref_id' => $customer->id,
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
            $batch_insert_for_bank_details = [];
            if ($request->has('bank_id')) {
                foreach ($request->bank_id as $bank_key => $bank_value) {
                    $bank_details_array = array(
                        'ref_table' => "Cus",
                        'bank_id' => $request->bank_id[$bank_key],
                        'bank_ref_id' => $customer->id,
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
            if (count($batch_insert_array) > 0) {
                AddressDetails::insert($batch_insert_array);
            }

            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }


    public function show(Customer $customer, $id)
    {
        $customer = Customer::find($id);
        $customer_bank_details = BankDetails::where('bank_ref_id', $id)->where('ref_table', 'Cus')->get();
        $customer_address_details = AddressDetails::where('address_ref_id', $id)->where('address_table', 'Cus')->get();
        return view('admin.master.customer.show', compact('customer', 'customer_bank_details', 'customer_address_details'));
    }


    public function edit(Customer $customer, $id)
    {
        $address_type = AddressType::all();
        $state = State::all();
        $bank = Bank::all();
        $account_type = AccountType::all();
        $customer = Customer::find($id);
        $price_level = PriceLevel::all();
        $salesman = SalesMan::all();
        // echo '<pre>';print_r($customer); exit();
        $exist_customer_dets = CustomerSupplier::where('type', 'Customer')->get();
        $customer_bank_details = BankDetails::where('bank_ref_id', $id)->where('ref_table', 'Cus')->get();
        $customer_address_details = AddressDetails::where('address_ref_id', $id)->where('address_table', 'Cus')->get();
        return view('admin.master.customer.edit', compact('exist_customer_dets', 'customer', 'customer_bank_details', 'customer_address_details', 'address_type', 'state', 'bank', 'account_type','price_level','salesman'));
    }


    public function update(Request $request, Customer $customer, $id)
    {
        $customer = Customer::find($id);
        $customer_id = "";
        $customer_type = "";
        if ($request->customer_type == 0) {

            $exist_customer_dets = CustomerSupplier::where('name', $request->name)->where('type', 'Customer')->get();

            if (count($exist_customer_dets) > 0) {
                $customer_id = $exist_customer_dets[0]->id;
                $customer_type = "1";
            } else {
                $customer_supplier_dets = new CustomerSupplier();
                $customer_supplier_dets->name = $request->name;
                $customer_supplier_dets->type = "Customer";
                $customer_supplier_dets->save();
                $customer_id = $customer_supplier_dets->id;
                $customer_type = "0";
            }
        } else {
            $customer_id = $request->exist_customer_name;
            $customer_type = "1";
        }
        $customer->company_name = $request->company_name;
        $customer->customer_type = $customer_type;
        $customer->name = $request->name;
        $customer->salutation = $request->salutation;
        $customer->phone_no = $request->phone_no;
        $customer->whatsapp_no = $request->whatsapp_no;
        $customer->email = $request->email;
        $customer->pan_card = $request->pan_card;
        $customer->gst_no = $request->gst_no;
        $customer->max_credit_limit = $request->max_credit_limit;
        $customer->max_credit_days = $request->max_credit_days;
        $customer->opening_balance = $request->opening_balance;
        $customer->remark = $request->remark;
        $customer->price_level = $request->price_level;
        $customer->salesman = $request->salesman;
        $customer->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();

        if ($customer->save()) {

            /* Insert New Address Details Start Here */
            $batch_insert_array = array();
            if ($request->has('address_type_id')) {
                foreach ($request->address_type_id as $key => $value) {
                    $data_to_store = array(
                        'address_table' => "Cus",
                        'address_type_id' => $request->address_type_id[$key],
                        'address_ref_id' => $customer->id,
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
            /* Insert New Address Details Start Here */

            /* Insert New Bank Details Start Here */
            $batch_insert_for_bank_details = [];
            if ($request->has('bank_id')) {
                foreach ($request->bank_id as $bank_key => $bank_value) {
                    $bank_details_array = array(
                        'ref_table' => "Cus",
                        'bank_id' => $request->bank_id[$bank_key],
                        'bank_ref_id' => $customer->id,
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


            /* Update Existing Address Details Start Here */
            if ($request->has('old_address_type_id')) {
                foreach ($request->old_address_type_id as $key => $value) {
                    $address_details = AddressDetails::find($request->address_details_id[$key]);
                    $address_details->address_table = "Cus";
                    $address_details->address_type_id = $request->old_address_type_id[$key];
                    $address_details->address_ref_id = $customer->id;
                    $address_details->address_line_1 = $request->old_address_line_1[$key];
                    $address_details->address_line_2 = $request->old_address_line_2[$key];
                    $address_details->land_mark = $request->old_land_mark[$key];
                    // $address_details->country_id = $request->old_country_id[$key];
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
                    $bank_details->ref_table = "Cus";
                    $bank_details->bank_id = $request->old_bank_id[$old_bank_key];
                    $bank_details->bank_ref_id = $customer->id;
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


            if (count($batch_insert_for_bank_details) > 0) {
                BankDetails::insert($batch_insert_for_bank_details);
            }
            if (count($batch_insert_array) > 0) {
                AddressDetails::insert($batch_insert_array);
            }



            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, $id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function import()
    {
       return view('admin.master.customer.index');
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
                    $pan_card=$filesop[8];   echo "</br>";
                    $gst_no=$filesop[9];   echo "</br>";
                    $max_credit_limit=$filesop[10];   echo "</br>";
                    $max_credit_days=$filesop[11];   echo "</br>";
                    $opening_balance=$filesop[12];   echo "</br>";
                    $remark=$filesop[13];   echo "</br>";
                    // $price_level=$filesop[14];   echo "</br>";
                    // $salesman=$filesop[15];   echo "</br>";

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
                    $pan_card=$filesop[8];   echo "</br>";
                    $gst_no=$filesop[9];   echo "</br>";
                    $max_credit_limit=$filesop[10];   echo "</br>";
                    $max_credit_days=$filesop[11];   echo "</br>";
                    $opening_balance=$filesop[12];   echo "</br>";
                    $remark=$filesop[13];   echo "</br>";
                    // $price_level=$filesop[14];   echo "</br>";
                    // $salesman=$filesop[15];   echo "</br>";

                    $customer =new Customer();

                    $customer->company_name       = $company_name;
                    $customer->name       = $name;
                    $customer->code      =  $code;
                    $customer->phone_no      =  $phone_no;
                    $customer->email      =  $email;
                    $customer->whatsapp_no      =  $whatsapp_no;
                    $customer->pan_card      =  $pan_card;
                    $customer->gst_no      =  $gst_no;
                    $customer->max_credit_limit      =  $max_credit_limit;
                    $customer->max_credit_days      =  $max_credit_days;
                    $customer->opening_balance      =  $opening_balance;
                    $customer->remark      =  $remark;
                    // $customer->price_level      =  $price_level;
                    // $customer->salesman      =  $salesman;

                    // $customer->save();

                    if($customer->save())
                    {
                        $address_line_1=$filesop[16];   echo "</br>";
                        $address_line_2=$filesop[17];   echo "</br>";
                        $land_mark=$filesop[18];   echo "</br>";
                        $state_name=$filesop[19];   echo "</br>";
                        $district_name=$filesop[20];   echo "</br>";
                        $city_name=$filesop[21];   echo "</br>";
                        $postal_code=$filesop[22];   echo "</br>";

                        $bank_name=$filesop[23];   echo "</br>";
                        $branch_name=$filesop[24];   echo "</br>";
                        $ifsc=$filesop[25];   echo "</br>";
                        $account_type=$filesop[26];   echo "</br>";
                        $account_holder_name=$filesop[27];   echo "</br>";
                        $account_no=$filesop[28];   echo "</br>";

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

                        $customer_address =new AddressDetails();

                        $customer_address->address_table='Cus';
                        $customer_address->address_ref_id=$customer->id;
                        $customer_address->address_line_1=$address_line_1;
                        $customer_address->address_line_2=$address_line_2;
                        $customer_address->land_mark=$land_mark;
                        $customer_address->state_id=$state_id;
                        $customer_address->district_id=$district_id;
                        $customer_address->city_id=$city_id;
                        $customer_address->postal_code=$postal_code;

                        $customer_address->save();

                        $bank_details =new BankDetails();

                        $bank_details->ref_table='Cus';
                        $bank_details->bank_ref_id=$customer->id;
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

        $customer = Customer::all();

        foreach ($customer as $key => $value) {
            $customer_name = preg_replace('/\s+/', '', $value->name);
            $name_data = strtolower($customer_name);
            if($string == $name_data)
            {
                return '1';
            }
        }

    }

    public function delete_customer_address_details(Request $request)
    {
        $address_details_id = $request->address_details_id;
        $address_details = AddressDetails::find($address_details_id);
        if ($address_details->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete_customer_bank_details(Request $request)
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
