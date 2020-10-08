<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseEntryExpense extends Model
{
    public function expense_types()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type', 'id');
    }
}
