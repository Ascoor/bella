<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_name','description'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function assests()
    {
        return $this->hasMany('App\Models\Assest');
    }
    public function Appointment()
    {
        return $this->hasMany('App\Models\Assest');
    }
}
