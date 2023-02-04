<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsToMany('App\Models\client');
    }
    public function service()
    {
        return $this->belongsToMany('App\Models\Invoice');
    }

    protected $fillable =['email','name','phone','details'];

}
