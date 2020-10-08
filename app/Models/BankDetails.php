<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BankDetails extends Model
{
    use SoftDeletes;

    public function bank(){
        return $this->belongsTo('App\Models\Bank','bank_id','id');
    }

    public function branch(){
        return $this->belongsTo('App\Models\Bankbranch','branch_id','id');
    }

    public function account_type(){
        return $this->belongsTo('App\Models\AccountType','account_type_id','id');
    }

    

    
}
