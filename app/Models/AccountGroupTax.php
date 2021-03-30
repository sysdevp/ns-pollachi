<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountGroupTax extends Model
{
	protected $fillable = ['id','account_group','tax_id','tax_value','type'];
	public function under_data()
	{
		return $this->belongsTo(AccountGroup::class, 'account_group','id');
	}

	public function taxes()
	{
		return $this->belongsTo(Tax::class, 'tax_id','id');
	}
    
}
