<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemTaxDetails extends Model
{
    use SoftDeletes;

    public function category_one()
    {
        return $this->belongsTo(Category_one::class,'category_1','id');
    }

    public function category_two()
    {
        return $this->belongsTo(Category_two::class,'category_2','id');
    }

    public function category_three()
    {
        return $this->belongsTo(Category_three::class,'category_3','id');
    }

    public function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }

    public function tax(){
        return $this->belongsTo(Tax::class,'tax_master_id','id');
    }

    
}

