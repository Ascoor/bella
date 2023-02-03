<?php

namespace App\Models;

use App\Models\GeneratedRelations\TblcontactuRelations;
use Illuminate\Database\Eloquent\Model;

class Tblcontactu extends Model
{
    use TblcontactuRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblcontactus';

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
