<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [

        'revenue_value',

        'revenue_date',
        'revenue_notes',
        'revenue_from',
        'income_type_id',
        'add_id'
    ];

    public function incomeType()
    {
        return $this->belongsTo(IncomeType::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
