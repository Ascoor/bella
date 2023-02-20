<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name', 'price', 'section_id','description'
    ];



    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function invoice()
    {
        return $this->belongsToMany(invoice::class);
    }
}
