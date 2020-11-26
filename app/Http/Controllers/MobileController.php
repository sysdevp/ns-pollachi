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
            //$sale_order_item = SaleOrderItem::all();
            //$sale_order_expense = SaleOrderExpense::all();
            //$sale_order_tax = SaleOrderTax::all();

            $data[] = SaleOrder::join('sale_order_items','sale_orders.so_no','=','sale_order_items.so_no')
                              ->join('sale_order_expenses','sale_orders.so_no','=','sale_order_expenses.so_no')
                              ->join('sale_order_taxes','sale_orders.so_no','=','sale_order_taxes.so_no')
                              ->select('sale_order_items.*','sale_order_expenses.*')
                              ->get();
                // $sale_order_item = SaleOrderItem::whereJsonContains('so_no',$value->so_no)->get();
                //$response['sale_order_expense'] = SaleOrderExpense::where('so_no',$value->so_no)->get();
                //$response['sale_order_item'] = SaleOrderItem::where('so_no',$value->so_no)->get();
            
           // echo "<pre>"; print_r($data); exit();
            echo json_encode($data);exit;
            $response['status'] = 'Success';
            $response['msg'] = "";
            $response['sale_order'] = $sale_order;
            //$response['sale_order_item'] = $sale_order_item;
            //$response['sale_order_expense'] = $sale_order_expense;
            //$response['sale_order_tax'] = $sale_order_tax;
            foreach ($sale_order_item as $key => $value) 
            {
                $response['items'] = Item::where('id', $value->item_id)->get();
            }
            return response()->json($response,200);
            echo json_encode($response);
        }

        catch(Exception $e)
        {
            $response['status'] = 'Error';
            $response['msg'] = \Lang::get('api.global_error');
            return response()->json($response, 401);
        }

    }
}
