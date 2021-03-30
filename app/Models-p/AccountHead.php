<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    public function under_data()
    {
    	return $this->belongsTo(AccountGroup::class,'under','id');
    }
    public function taxes()
    {
    	return $this->belongsTo(Tax::class,'name_of_tax','id');
    }
}
