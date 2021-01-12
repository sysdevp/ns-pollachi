<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function pricelevel()
    {
    	return $this->belongsTo(PriceLevel::class, 'price_level','id');
    }
}
