<?php

namespace App\Models;

use App\Models\GeneratedRelations\AdminRelations;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use AdminRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';

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
