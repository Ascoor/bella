<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Doctor extends Model
{
    use HasFactory;
use Notifiable;
    protected $fillable = [
        'name', 'section_id','phone','specialization','photo'
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
}

