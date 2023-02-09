<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable =['name','doctor_id','section_id','description','cost'];


    public function doctor()
    {

        return $this->hasOne('App\Models\Doctor','doctor_id');
        }

        public function section()
        {
        return $this->belongsTo('App\Models\Section','section_id');
        }


     }



