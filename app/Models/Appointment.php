<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    


    protected $fillable =['apt_number','status','email','name','user_id','phone','apt_date','apt_time'];
    public function service()
    {
        return $this->belongsToMany('App\Models\Service');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'phone_number');
    }
}
