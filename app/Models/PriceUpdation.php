<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceUpdation extends Model
{
    //
    public function item()
    {
    	return $this->belongsTo(Item::class, 'item_id','id');
    }
    public function brand()
    {
    	return $this->belongsTo(Brand::class, 'brand_id','id');
    }
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
