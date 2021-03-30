<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    public $timestamps = true;

	public function category()
	{
		return $this->belongsTo(Category::class, 'offers_category_id');
	}
}
