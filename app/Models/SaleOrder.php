<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function salesman()
    {
        return $this->belongsTo(SalesMan::class, 'salesman_id', 'id');
    }
    public function locations()
    {
    	return $this->belongsTo(Location::class, 'location', 'id');
    }
     public function sale_order_expense_det()
    {
        return $this->belongsTo(SaleOrderExpense::class, 'so_no', 'so_no');
    }
     public function sale_order_items_det()
    {
        return $this->belongsTo(SaleOrderItem::class, 'so_no', 'so_no');
    }
     public function sale_order_tax_det()
    {
        return $this->belongsTo(SaleOrderTax::class, 'so_no', 'so_no');
    }
}
