<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User  as Authenticatable;
class Assest extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password', 'assest_name', 'section_id','phone','gender','photo'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
