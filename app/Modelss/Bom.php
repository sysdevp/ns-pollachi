<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
	public function items()
	{
		return $this->belongsTo(Item::class, 'product_item_id', 'id');	
	}
    
}
