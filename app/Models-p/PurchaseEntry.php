<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseEntry extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location', 'id');
    }
}
