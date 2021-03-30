<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    
    }
}
