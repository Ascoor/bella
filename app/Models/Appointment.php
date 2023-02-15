<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'date', 'time', 'notes'
    ];

    public function  doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
