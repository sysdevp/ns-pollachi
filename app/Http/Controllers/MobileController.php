<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Employee;
use App\Models\SaleOrderItem;
use App\Models\SaleOrder;
use App\Models\SaleOrderExpense;
use App\Models\SaleOrderTax;
use App\Models\Item;
use App\Models\Tax;
use App\Models\Customer;
use App\Models\SaleEntry;
use App\Models\SaleEntryItem;
use App\Models\SaleEntryExpense;
use App\Models\SaleEntryTax;
use App\Models\SalesMan;
use App\Models\SaleEstimation;
use App\Models\Estimation_Item;
use App\Models\SaleEstimationItem;
use App\Models\SaleEstimationTax;
use App\Models\AddressDetails;
use App\Models\BankDetails;

class MobileController extends Controller
{
    //

    public function login(Request $request)
    {

        try
        {
            $username = $request->username;
            $password = $request->password;
            
            $usertest = User::where('user_name',$username)->get();
            
            $user = User::where('user_name',$username)->where('password',@$usertest[0]->password)->first();
            

            if($user)
            {
                
                $employee = Employee::where('id',$user->employee_id)->first();
                $response['status'] = 'Success';
                $response['msg'] = "";
                $response['data'] = $employee;
                return response()->json($response,200);
                echo json_encode($response['data']);
            }
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    	
    }

    public function employee()
    {
        try
        {
            $employee = Employee::all();
            $response['status'] = 'Success';
            $response['msg'] = "";
            $response['data'] = $employee;
            return response()->json($response,200);
            echo json_encode($response['data']);
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    }
    public function test()
    {
                    $data['sale_order'] = SaleOrder::all();
                                foreach ($data['sale_order'] as $key => $value) 
                                {

                                $data['sale_order_items'][] = SaleOrderItem::where('so_no',$value->so_no)->get();
                                }
                              // $data['sale_order_expenses'] = SaleOrder::join('sale_order_expenses','sale_orders.so_no','=','sale_order_expenses.so_no')->get();
                              // $data['sale_order_taxes'] = SaleOrder::join('sale_order_taxes','sale_orders.so_no','=','sale_order_taxes.so_no')->get();
                    
                              echo json_encode($data);
          //  echo"<pre>";print_r($data);

    }
    public function sale_order()
    {

        try
        {
            $sale_order = SaleOrder::all();

            //$data[] = SaleOrder::join('sale_order_items','sale_orders.so_no','=','sale_order_items.so_no')
              //                ->join('sale_order_expenses','sale_orders.so_no','=','sale_order_expenses.so_no')
               //               ->join('sale_order_taxes','sale_orders.so_no','=','sale_order_taxes.so_no')
               //               ->select('sale_order_items.*','sale_order_expenses.*')
               //  
               //             ->get();
            $response_data = [];
            
            foreach($sale_order as $sale_orders){
                $so_item = [];
				$cus_name = Customer::where('id',$sale_orders->customer_id)->select('name', 'phone_no')->get();
				$sale_orders->customer_name = $cus_name[0]->name;
				$sale_orders->mobile_no = $cus_name[0]->phone_no;
				$emp_name = SalesMan::where('id',$sale_orders->salesman_id)->select('name', 'phone_no')->get();
				$sale_orders->salesman_name = $emp_name[0]->name;
				$sale_orders->salesman_mobile_no = $emp_name[0]->phone_no;
                $sale_exp_det = [];
                $sale_exp_tax = [];
                
                $sale_order_expenses = SaleOrderExpense::where('so_no',$sale_orders->so_no)->get();

                foreach($sale_order_expenses as $sale_order_expense)
                { 
                  $exp_det = [];
				  $exp_det['expense_id']=$sale_order_expense->id;
                  $exp_det['expense_type']=$sale_order_expense->expense_type;
                  $exp_det['expense_amount']=$sale_order_expense->expense_amount;
                 array_push($sale_exp_det,$exp_det);
            
            }
			
			$sale_order_items = SaleOrderItem::where('so_no',$sale_orders->so_no)->get();

                foreach($sale_order_items as $sale_order_item)
                { 
                  $item_det = [];
				  $item_det['item_id']=$sale_order_item->id;
                  $item_name = Item::where('id',$sale_order_item->item_id)->pluck('name');
                  $item_det['item_name']=$item_name[0];
                  $item_det['mrp']=$sale_order_item->mrp;
                  $item_det['gst']=$sale_order_item->gst;
                  $item_det['rate_exclusive_tax']=$sale_order_item->rate_exclusive_tax;
                  $item_det['rate_inclusive_tax']=$sale_order_item->rate_inclusive_tax;
                  $item_det['qty']=$sale_order_item->qty;
                  $item_det['uom_id']=$sale_order_item->uom_id;
                  $item_det['discount']=$sale_order_item->discount;
                 array_push($so_item,$item_det);
            
            }
			
			 $sale_order_taxes = SaleOrderTax::where('so_no',$sale_orders->so_no)->get();

                foreach($sale_order_taxes as $sale_order_tax)
                { 
                  $exp_tax = [];
				  $exp_tax['tax_id']=$sale_order_tax->id;
				  $tax_name = Tax::where('id',$sale_order_tax->taxmaster_id)->pluck('name');
                  $exp_tax['tax_name']=isset($tax_name[0]) ? $tax_name[0] : false;
                  $exp_tax['value']=$sale_order_tax->value;
                 array_push($sale_exp_tax,$exp_tax);
            
            }
			
            $sale_orders['sale_order_expenses'] = $sale_exp_det;
            $sale_orders['sale_order_items'] = $so_item;
            $sale_orders['sale_order_tax'] = $sale_exp_tax;
             array_push($response_data,$sale_orders);   
            }

             
              
           
            return response()->json($response_data,200);
            
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    }
	
	public function sale_entry_view()
    {

        try
        {
            $sale_order = SaleEntry::all();

            //$data[] = SaleOrder::join('sale_order_items','sale_orders.so_no','=','sale_order_items.so_no')
              //                ->join('sale_order_expenses','sale_orders.so_no','=','sale_order_expenses.so_no')
               //               ->join('sale_order_taxes','sale_orders.so_no','=','sale_order_taxes.so_no')
               //               ->select('sale_order_items.*','sale_order_expenses.*')
               //  
               //             ->get();
            $response_data = [];
            
            foreach($sale_order as $sale_orders){
				
                $so_item = [];
				$cus_name = Customer::where('id',$sale_orders->customer_id)->select('name', 'phone_no')->get();
				$sale_orders->customer_name = $cus_name[0]->name;
				$sale_orders->mobile_no = $cus_name[0]->phone_no;
				$emp_name = SalesMan::where('id',$sale_orders->salesman_id)->select('name', 'phone_no')->get();
				$sale_orders->salesman_name = $emp_name[0]->name;
				$sale_orders->salesman_mobile_no = $emp_name[0]->phone_no;
                $sale_exp_det = [];
                $sale_exp_tax = [];
                
                $sale_order_expenses = SaleEntryExpense::where('s_no',$sale_orders->s_no)->get();

                foreach($sale_order_expenses as $sale_order_expense)
                { 
				
                  $exp_det = [];
				  $exp_det['expense_id']=$sale_order_expense->id;
                  $exp_det['expense_type']=$sale_order_expense->expense_type;
                  $exp_det['expense_amount']=$sale_order_expense->expense_amount;
                 array_push($sale_exp_det,$exp_det);
            
            }
			
			$sale_order_items = SaleEntryItem::where('s_no',$sale_orders->s_no)->get();

                foreach($sale_order_items as $sale_order_item)
                { 
                  $item_det = [];
				  $item_det['item_id']=$sale_order_item->id;
                  $item_name = Item::where('id',$sale_order_item->item_id)->pluck('name');
                  $item_det['item_name']=$item_name[0];
                  $item_det['mrp']=$sale_order_item->mrp;
                  $item_det['gst']=$sale_order_item->gst;
                  $item_det['rate_exclusive_tax']=$sale_order_item->rate_exclusive_tax;
                  $item_det['rate_inclusive_tax']=$sale_order_item->rate_inclusive_tax;
                  $item_det['qty']=$sale_order_item->qty;
                  $item_det['uom_id']=$sale_order_item->uom_id;
                  $item_det['discount']=$sale_order_item->discount;
                 array_push($so_item,$item_det);
            
            }
			
			 $sale_order_taxes = SaleEntryTax::where('s_no',$sale_orders->s_no)->get();

                foreach($sale_order_taxes as $sale_order_tax)
                { 
                  $exp_tax = [];
				  $exp_tax['tax_id']=$sale_order_tax->id;
				  $tax_name = Tax::where('id',$sale_order_tax->taxmaster_id)->pluck('name');
                  $exp_tax['tax_name']=isset($tax_name[0]) ? $tax_name[0] : false;
                  $exp_tax['value']=$sale_order_tax->value;
                 array_push($sale_exp_tax,$exp_tax);
            
            }
			
            $sale_orders['sale_order_expenses'] = $sale_exp_det;
            $sale_orders['sale_order_items'] = $so_item;
            $sale_orders['sale_order_tax'] = $sale_exp_tax;
             array_push($response_data,$sale_orders);   
            }

             
              
           
            return response()->json($response_data,200);
            
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    }
	
	public function list_customer(Request $request)
    {

        try
        {
            
             $customers = Customer::all();
            
            foreach($customers as $customer)
            {
				// $cus_add = [];
                $customer_address_details = AddressDetails::where('address_ref_id', $customer->id)->where('address_table', 'Cus')->get();
				$customer['address_line_1'] = $customer_address_details[0]->address_line_1;
				$customer['address_line_2'] = $customer_address_details[0]->address_line_2;
				$customer['land_mark'] = $customer_address_details[0]->land_mark;
				$customer['state_name'] = @$customer_address_details[0]->state->name;
				$customer['district_name'] = @$customer_address_details[0]->district->name;
				//$customer['city_name'] = $customer_address_details[0]->city->name;
				$customer['postal_code'] = $customer_address_details[0]->postal_code;
				
				 
               
            }
			    $response['status'] = 'Success';
                $response['msg'] = "";
                $response['data'] = $customers;
                return response()->json($response,200);
                
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    	
    }
    
    public function sale_estimations()
    {

        try
        {
            $sale_estimation = SaleEstimation::all();
            $response_data = [];
            $estimation_data = [];
            foreach($sale_estimation as $estimation_data)
            {

                              //  print_r($estimation_data->id);

                              $estimation_data['sale_estimation_items'] = SaleEstimationItem::where('sale_estimation_no',$estimation_data->sale_estimation_no)->get();
                              $estimation_data['sale_estimation_taxes'] = SaleEstimationTax::where('sale_estimation_no',$estimation_data->sale_estimation_no)->get();

                array_push($response_data,$estimation_data);   


            }
            
            return response()->json($response_data,200);

        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    }
	

	public function store_customer(CustomerRequest $request)
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
        $customer->company_name = isset($request->company_name) ? ($request->company_name) : '';
        $customer->name = isset($request->name) ? ($request->name) : '';
        $customer->customer_type = isset($request->customer_type) ? ($request->customer_type) : '';
        $customer->customer_id = isset($request->customer_id) ? ($request->customer_id) : '';
        $customer->salutation = isset($request->salutation) ? ($request->salutation) : '';
        $customer->phone_no = isset($request->phone_no) ? ($request->phone_no) : '';
        $customer->whatsapp_no = isset($request->whatsapp_no) ? ($request->whatsapp_no) : '';
        $customer->email = isset($request->email) ? ($request->email) : '';
        $customer->pan_card = isset($request->pan_card) ? ($request->pan_card) : '';
        $customer->gst_no = isset($request->gst_no) ? ($request->gst_no) : '';
        $customer->max_credit_limit = isset($request->max_credit_limit) ? ($request->max_credit_limit) : '';
        $customer->max_credit_days = isset($request->max_credit_days) ? ($request->max_credit_days) : '';
        $customer->opening_balance = isset($request->opening_balance) ? ($request->opening_balance) : '';
        $customer->remark = isset($request->remark) ? ($request->remark) : '';
        $customer->price_level = isset($request->price_level) ? ($request->price_level) : '';
        $customer->created_by = 0;
        $customer->updated_by = 0;
        $now = Carbon::now()->toDateTimeString();

        if ($customer->save()) {

            $batch_insert_array = array();
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
}
