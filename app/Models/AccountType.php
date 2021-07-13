<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = ['id','name','remark','active_status','created_by','updated_by'];
}
