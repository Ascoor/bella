<?php

namespace App\Models;

use App\Models\GeneratedRelations\DoctorslogRelations;
use Illuminate\Database\Eloquent\Model;

class Doctorslog extends Model
{
    use DoctorslogRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctorslog';

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
