<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHistory extends Model
{
    use HasFactory;
    protected $table = 'client_histories'; // updated table name
    protected $primaryKey = 'id';
    protected $guarded = [];
    // rest of your code ...

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'client_history_doctor')->withPivot('comment');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'client_history_service')->withPivot('price');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'client_history_invoice')->withPivot('amount_paid');
    }

    public function comments()
    {
        return $this->hasMany(ClientHistoryComment::class);
    }


public function appointments()
{
    return $this->hasMany(Appointment::class);
}

}
