<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 * 
 * @property int $id
 * @property string|null $specilization
 * @property string|null $doctorName
 * @property string|null $address
 * @property string|null $docFees
 * @property int|null $contactno
 * @property string|null $docEmail
 * @property string|null $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Doctor extends Model
{
	protected $table = 'doctors';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'contactno' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'id',
		'specilization',
		'doctorName',
		'address',
		'docFees',
		'contactno',
		'docEmail',
		'password'
	];
}
