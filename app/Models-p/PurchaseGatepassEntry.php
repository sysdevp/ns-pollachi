<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseGatepassEntry extends Model
{
    public function supplier()
    {
    	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
