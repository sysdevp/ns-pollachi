<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
	protected $fillable = ['id','name','remark'];
    public function item_tax_detail()
    {
    	// return $this->belongsTo(ItemTaxDetails::class, 'tax_master_id','id');
    	return $this->belongsTo(ItemTaxDetails::class,'id','tax_master_id');
    }
}
