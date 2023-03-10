<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_date',
        'expense_value',

        'expense_to',
        'expense_notes',
        'expense_type_id',
        'add_id'
    ];

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
