<?php

namespace App\Models;

use App\Models\GeneratedRelations\AppointmentRelations;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use AppointmentRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointment';

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
