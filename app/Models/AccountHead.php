<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
	protected $fillable = ['id','name','under','tax','name_of_tax','rate_of_tax','opening_balance','dr_or_cr','status'];
    public function under_data()
    {
    	return $this->belongsTo(AccountGroup::class,'under','id');
    }
    public function taxes()
    {
    	return $this->belongsTo(Tax::class,'name_of_tax','id');
    }
}
