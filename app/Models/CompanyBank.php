<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyBank extends Model
{

    protected $fillable = ['id','bank_id','bank_branch_id','account_type_id','holder_name','account_no'];

    public function bank()
    {
    	return $this->belongsTo(Bank::class, 'bank_id' ,'id');
    }

    public function bank_branch()
    {
    	return $this->belongsTo(Bankbranch::class, 'bank_branch_id' ,'id');
    }
    public function account_types()
    {
    	return $this->belongsTo(AccountType::class, 'account_type_id' ,'id');
    }
}
