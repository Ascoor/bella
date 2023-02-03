<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property int $id
 * @property string|null $fullname
 * @property string|null $email
 * @property int|null $contactno
 * @property string|null $message
 * @property string|null $AdminRemark
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $IsRead
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'contactno' => 'int',
		'IsRead' => 'int'
	];

	protected $fillable = [
		'fullname',
		'email',
		'contactno',
		'message',
		'AdminRemark',
		'IsRead'
	];
}
