<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_three extends Model
{
    use SoftDeletes;
   
    public function category_one(){
        return $this->belongsTo(Category_one::class,'category_one_id','id');
    }
    
     public function category_two(){
        return $this->belongsTo('App\Models\Category_two','category_two_id','id');
    }
}
