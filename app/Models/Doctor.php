<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable =['phone','name','specialty'];


    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }
    public function appointment()
    {
        return $this->belongsToMany('App\Models\Service');
    }


}
