<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'section_id','phone','specialization','photo'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
   public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }
}

