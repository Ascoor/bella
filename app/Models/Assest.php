<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assest extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_name', 'section_id'
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
