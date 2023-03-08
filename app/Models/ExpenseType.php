<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExpenseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
