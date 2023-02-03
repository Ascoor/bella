<?php

namespace App\Models;

use App\Models\GeneratedRelations\PasswordResetRelations;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use PasswordResetRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'password_resets';

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
