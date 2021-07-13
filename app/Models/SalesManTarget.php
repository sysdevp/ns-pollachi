<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesManTarget extends Model
{
	public function salesman()
	{
		return $this->belongsTo(SalesMan::class, 'salesman_id','id');
	}
    
}
