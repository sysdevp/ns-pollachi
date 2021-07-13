<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosPayment extends Model
{
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer', 'id');
    }
}
