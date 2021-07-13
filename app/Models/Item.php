<?php

namespace App\Models;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','name','code','item_type','weight_in_grams','weight_in_kg','bulk_item_id','child_unit','child_item_id','uom_for_repack_item','category_id','brand_id','print_name_in_english','print_name_in_language_1','print_name_in_language_2','print_name_in_language_3','hsn','supplier_id','mrp','default_selling_price','uom_id','rate','amount','applicable_date','is_minimum_sales_qty_applicable','minimum_sales_price','minimum_sales_qty','uom_for_minimum_sales_item','is_expiry_date','is_machine_weight_applicable','expiry_date','remark','active_status','created_by','updated_by'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function category_one()
    {
        return $this->belongsTo(Category_one::class, 'category_1', 'id');
    }

    public function category_two()
    {
        return $this->belongsTo(Category_two::class, 'category_2', 'id');
    }

    public function category_three()
    {
        return $this->belongsTo(Category_three::class, 'category_3', 'id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }

    public function bulk_item()
    {
        return $this->belongsTo(Item::class, 'bulk_item_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function item_tax_details()
    {
        return $this->hasMany(ItemTaxDetails::class, 'item_id', 'id');
        
    }

    public function item_barcode_details()
    {
        return $this->hasMany(ItemBracodeDetails::class, 'item_id', 'id');
    }

    public function delete()
    {
        // delete all related photos 
        $this->item_tax_details()->delete();
        $this->item_barcode_details()->delete();
       

        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

     public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
 
    // This is method where we implement recursive relationship
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

     public function items()
    {
        return $this->belongsTo(Item::class, 'child_item_id','id');
    }
 
    // This is method where we implement recursive relationship
    public function childItem()
    {
        return $this->hasMany(Item::class, 'id','child_item_id')->with('items');
    }




     public function items_parent()
    {
        return $this->belongsTo(Item::class, 'child_item_id','id');
    }
 
    // This is method where we implement recursive relationship
    public function parentItem()
    {
        return $this->hasMany(Item::class, 'child_item_id')->with('items_parent');
    }
}
