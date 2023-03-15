<?php

namespace App\Models;

use CreateClientsTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User  as Authenticatable;
class Doctor extends  Authenticatable
{
    use HasFactory;
use Notifiable;
protected $fillable = [
    'name',
    'username',
    'password',
    'specialization',
    'phone',
    'photo',
    'section_id',
];
    public function appointments()
    {
        return $this->BelongsToMany(Appointment::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
   public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    protected $hidden = [
        'password',
    ];
    public function clients()
    {
        return $this->hasMany(Client::class);
        }
}

