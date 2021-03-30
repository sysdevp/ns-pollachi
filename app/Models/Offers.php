<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    public $timestamps = true;

    protected $fillable = ['id','offer_name','item_id','offers_category_id','offer_type','valid_from','valid_to','day_range_offers','variable','percentage','fixed_amount','from_time','to_time','comments','active_status'];

	public function category()
	{
		return $this->belongsTo(Category::class, 'offers_category_id');
	}
}
