<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsToMany('App\Models\Invoice');
    }
    public function appointment()
    {
        return $this->belongsToMany('App\Models\Appointment');
    }
    protected $fillable =['email','name','phone','details'];

}

