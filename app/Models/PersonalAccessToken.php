<?php

namespace App\Models;

use App\Models\GeneratedRelations\PersonalAccessTokenRelations;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use PersonalAccessTokenRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_access_tokens';

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
    public $timestamps = true;
}
