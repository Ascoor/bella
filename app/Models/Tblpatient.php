<?php

namespace App\Models;

use App\Models\GeneratedRelations\TblpatientRelations;
use Illuminate\Database\Eloquent\Model;

class Tblpatient extends Model
{
    use TblpatientRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblpatient';

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
