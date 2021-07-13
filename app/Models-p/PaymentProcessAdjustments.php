<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentProcessAdjustments extends Model
{
    public function supplier_det()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function purchase_entries_det()
    {
        return $this->belongsTo(PurchaseEntry::class, 'purchase_id', 'id');
    }
}
