<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesVoucherType extends Model
{
    protected $fillable = ['id','name','type','prefix','suffix','starting_no','no_digits'];
}
