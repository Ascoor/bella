<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable =['name','doctor_name','cost'];


    public function doctor()
    {
    return $this->hasOne('App\Models\Doctor','doctor_name');
}
}
