<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Client extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'client_name', 'email', 'client_phone','note','address','note'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


    // public function routeNotificationForAppointment()
    // {
    //     return $this->phone;
    // }
}
