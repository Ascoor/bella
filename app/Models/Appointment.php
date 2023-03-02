<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Appointment extends Model
{
    use HasFactory;
use Notifiable;
    protected $fillable = ['client_id','doctor_id','apt_datetime','remarks','edited_by','status'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }



}


