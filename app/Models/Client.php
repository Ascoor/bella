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
        'client_name','gender','birthdate','pid', 'email', 'client_phone','note','address','note'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // public function routeNotificationForAppointment()
    // {
    //     return $this->phone;
    // }
}
