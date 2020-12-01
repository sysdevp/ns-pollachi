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
use App\Models\AddressDetails;

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
}
