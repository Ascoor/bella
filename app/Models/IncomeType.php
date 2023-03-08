<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }
}
