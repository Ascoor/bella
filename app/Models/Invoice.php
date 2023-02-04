<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Invoice extends Model
{
    use HasFactory;

    protected $fillable =['user_id','invoice_id','client_name','service_list','amount'];

public function services()
{
    return $this->belongsToMany(Service::class);
}
    public function appointment()
{
    return $this->belongsTo(Appointment::class);
}
    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_id');
    }
}