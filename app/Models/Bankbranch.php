<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankbranch extends Model
{

public function bank(){
    return $this->belongsTo('App\Models\Bank','bank_id','id');
}
}
