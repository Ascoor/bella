<?php

namespace App\Models;

use App\Models\GeneratedRelations\DoctorspecilizationRelations;
use Illuminate\Database\Eloquent\Model;

class Doctorspecilization extends Model
{
    use DoctorspecilizationRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctorspecilization';

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
