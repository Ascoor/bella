<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'client_id',
        'start_datetime',
        'end_datetime',
        'status',

    ];


        public function doctor()
        {
            return $this->belongsTo(Doctor::class);
        }

        public function client()
        {
            return $this->belongsTo(Client::class);
        }

        public function getDoctorNameAttribute()
        {
            return $this->doctor->name;
        }

        public function getClientNameAttribute()
        {
            return $this->client->client_name;
        }
    }
