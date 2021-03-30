<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankbranch extends Model
{

protected $fillable = ['id','bank_id','branch','ifsc','active_status','created_by','updated_by'];	

public function bank()
{
    return $this->belongsTo(Bank::class,'bank_id','id');
}
}
