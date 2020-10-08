<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimation_Expense extends Model
{
     public function expense_types()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type', 'id');
    }
}
