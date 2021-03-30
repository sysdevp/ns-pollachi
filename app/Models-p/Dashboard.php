<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    //
    public static function bar_chart_receivables($day)
    {
      
        $sales_entry = SaleEntry::where('s_date',$day)->sum('total_net_value');
   
   
        $received_amount = ReceiptProcess::where('voucher_date',$day)->sum('receipt_amount');
   
   
//        $receivables = $sales_entry - $received_amount;
        $receivables = $received_amount - $sales_entry;
   
//        $payables    = $purchase_entry - $payment_amount;

            
            return $receivables;

    }
    public static function bar_chart_payables($day)
    {

        $purchase_entry = PurchaseEntry::where('p_date',$day)->sum('total_net_value');
        $payment_amount = PaymentProcess::where('voucher_date',$day)->sum('payment_amount');

        $payables    = $payment_amount - $purchase_entry;
        return $payables;
    }
    public static function customer_name($id)
    {
        $customer = Customer::find($id);
        return $customer->name;
    }
}
