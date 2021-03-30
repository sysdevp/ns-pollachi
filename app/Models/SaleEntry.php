<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleEntry extends Model
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
}
