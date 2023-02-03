<?php

namespace App\Models;

use App\Models\GeneratedRelations\DoctorRelations;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use DoctorRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctors';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
