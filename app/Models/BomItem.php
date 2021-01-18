<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BomItem extends Model
{
    public function items()
	{
		return $this->belongsTo(Item::class, 'item_id', 'id');	
	}
	public function uoms()
	{
		return $this->belongsTo(Uom::class, 'uom_id', 'id');	
	}
}
