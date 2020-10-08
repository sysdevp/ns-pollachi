<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountGroupTax extends Model
{
	public function under_data()
	{
		return $this->belongsTo(AccountGroup::class, 'account_group','id');
	}

	public function taxes()
	{
		return $this->belongsTo(Tax::class, 'tax_id','id');
	}
    
}
