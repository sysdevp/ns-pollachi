<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['id','name','level','parent_id','remark','active_status','created_by','updated_by'];
    public function parent_category(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
 
    // This is method where we implement recursive relationship
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }
}
