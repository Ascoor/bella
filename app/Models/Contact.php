<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $PostingDate
 * @property int    $LastupdationDate
 * @property int    $IsRead
 * @property string $fullname
 * @property string $email
 * @property string $message
 * @property string $AdminRemark
 */
class Contact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'contactno', 'message', 'PostingDate', 'AdminRemark', 'LastupdationDate', 'IsRead'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'fullname' => 'string', 'email' => 'string', 'message' => 'string', 'PostingDate' => 'timestamp', 'AdminRemark' => 'string', 'LastupdationDate' => 'timestamp', 'IsRead' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'PostingDate', 'LastupdationDate'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
