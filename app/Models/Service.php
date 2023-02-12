<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name', 'price', 'doctor_id', 'section_id','description'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
