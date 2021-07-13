<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptProcessAdjustments extends Model
{
    public function customer_det()
    {
        return $this->belongsTo(Customer::class, 'supplier_id', 'id');
    }
    public function sale_entries_det()
    {
        return $this->belongsTo(SaleEntry::class, 'purchase_id', 'id');
    }
}
