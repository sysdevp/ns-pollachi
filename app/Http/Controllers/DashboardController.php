<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pos;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\ReceiptProcess;
use App\Models\PaymentProcess;
use App\Models\SaleEntry;
use App\Models\PurchaseEntry;
use App\Models\Expense;
use App\Models\PosItem;
use App\Models\Item;
use App\Models\Uom;
use App\Models\PosPayment;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier_cnt = Supplier::count('id');
        $customer_cnt = Customer::count('id');
        $customer    = Customer::all();
        $supplier    = Supplier::all();
        //pie chart
        $from_date = date('Y-m-01');
        $to_date = date('Y-m-31');

        $current_month_received_amount = ReceiptProcess::whereBetween('voucher_date', [$from_date, $to_date])->sum('receipt_amount');
    //receipt process
        $collection =  ReceiptProcess::join('customers','customers.id','=','receipt_processes.customer_id')->get();

        $current_month_payment_amount = PaymentProcess::whereBetween('voucher_date',[$from_date, $to_date])->sum('payment_amount');
        $payment = PaymentProcess::join('suppliers','suppliers.id','=','payment_processes.supplier_id')->get();
        $sales_entry = SaleEntry::sum('total_net_value');
   
        $purchase_entry = PurchaseEntry::sum('total_net_value');
   
        $received_amount = ReceiptProcess::sum('receipt_amount');
   
        $payment_amount = PaymentProcess::sum('payment_amount');
   
//        $receivables = $sales_entry - $received_amount;
        $receivables = $received_amount - $sales_entry;
   
//        $payables    = $purchase_entry - $payment_amount;
        $payables    = $payment_amount - $purchase_entry;
   
        $expenses = Expense::sum('debit_amount');
        $expenses_popup =Expense::join('account_heads','account_heads.id','=','expenses.debit_account_head')->get();

        $array_det = [];



        $item = Item::all();
        foreach($item as $data)
        {
        $new_array = [];
        $pos = PosItem::whereBetween('so_date', [$from_date, $to_date])->where('item_id',$data->id)->sum('qty');
        $new_array['item_name'] = $data->name;
        $new_array['item_code'] = $data->code;
        $new_array['mrp'] = $data->mrp;
        $uom = Uom::find($data->uom_id);
        $new_array['uom'] = @$uom->name;
        $new_array['pos'] = $pos;



        if($pos>0){
            array_push($array_det,$new_array);    
        }
       
        }
        //Bar Chart
        $new_array = [];
        $monday = date('Y-m-d',strtotime('last monday'));
        $tuesday = date('Y-m-d',strtotime('last tuesday'));
        $wednesday = date('Y-m-d',strtotime('last wednesday'));
        $thursday = date('Y-m-d',strtotime('last thursday'));
        $friday = date('Y-m-d',strtotime('last friday'));
        $saturday = date('Y-m-d',strtotime('last saturday'));
        $sunday = date('Y-m-d',strtotime('last sunday'));

        $new_array1 = [];
        $bar_chart = [];
        $new_array1['monday_payable'] = Dashboard::bar_chart_payables($monday);
        $new_array1['monday_receivable'] = Dashboard::bar_chart_receivables($monday);

        $new_array1['tuesday_payable'] = Dashboard::bar_chart_payables($tuesday);
        $new_array1['tuesday_receivable'] = Dashboard::bar_chart_receivables($tuesday);

        $new_array1['wednesday_payable'] = Dashboard::bar_chart_payables($wednesday);
        $new_array1['wednesday_receivable'] = Dashboard::bar_chart_receivables($wednesday);

        array_push($bar_chart,$new_array1);    


        //Uncleared Cheque
        $receipt_process = ReceiptProcess::where('payment_mode',4)->where('cleared_status',0)->sum('receipt_amount');
        $pos_payment = PosPayment::where('cheque','!=','')->where('cleared_status',0)->sum('cheque');
        $uncleared_cheque = $receipt_process + $pos_payment;

        


        return view('admin.master.empty',compact('array_det','bar_chart','uncleared_cheque','receivables','payables','expenses','current_month_received_amount','current_month_payment_amount','supplier_cnt','customer_cnt','sales_entry','received_amount','payment_amount','purchase_entry','customer','supplier','collection','payment','expenses_popup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
