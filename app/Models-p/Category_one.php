<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_one extends Model
{
    use SoftDeletes;

    public function category_twos()
    {
        return $this->hasmany(Category_two::class);

    }
    public function category_threes()
    {
        return $this->hasmany(Category_three::class);

    }
}
