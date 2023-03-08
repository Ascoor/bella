<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_date',
        'revenue_value',
        'revenue_type',
        'revenue_notes',
        'income_type_id'
    ];

    public function incomeType()
    {
        return $this->belongsTo(IncomeType::class);
    }
}
