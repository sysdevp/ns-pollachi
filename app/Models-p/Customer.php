<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function pricelevel()
    {
    	return $this->belongsTo(PriceLevel::class, 'price_level','id');
    }

    public function sales_man()
    {
    	return $this->belongsTo(SalesMan::class, 'salesman','id');
    }
}
