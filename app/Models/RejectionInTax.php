<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RejectionInTax extends Model
{
    public function taxes()
    {
    	return $this->belongsTo(Tax::class, 'taxmaster_id','id');
    }
}
