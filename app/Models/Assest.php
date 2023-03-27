<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assest extends Model
{
    use HasFactory;

    protected $fillable = [
        'assest_name', 'section_id','phone','gender','photo'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
<<<<<<< HEAD
=======


>>>>>>> e727e2bfbd2b734ab974cd862890dad48cf08476
}
