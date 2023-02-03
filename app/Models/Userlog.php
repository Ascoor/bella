<?php

namespace App\Models;

use App\Models\GeneratedRelations\UserlogRelations;
use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    use UserlogRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userlog';

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
