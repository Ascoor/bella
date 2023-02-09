<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable =['phone','name','specialty'];


    public function service()
    {
        return $this->belongsToMany('App\Models\Service','service_id');
    }
    public function appointment()
    {
        return $this->belongsToMany('App\Models\Appointment');
    }

    public function section()
    {
    return $this->belongsTo('App\Models\Section');
    }

}
