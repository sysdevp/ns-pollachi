<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetDetails extends Model
{
    public function locations()
    {
    	return $this->belongsTo(Location::class, 'location_id','id');
    }
}
