<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosMaster extends Model
{
    public function location()
    {
    	return $this->belongsTo(Location::class, 'location_id', 'id');
    }
}
