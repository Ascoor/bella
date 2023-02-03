<?php

namespace App\Models;

use App\Models\GeneratedRelations\TblmedicalhistoryRelations;
use Illuminate\Database\Eloquent\Model;

class Tblmedicalhistory extends Model
{
    use TblmedicalhistoryRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblmedicalhistory';

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
