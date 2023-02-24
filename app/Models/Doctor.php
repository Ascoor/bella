<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Doctor extends Model
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
}

