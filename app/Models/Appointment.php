<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 * 
 * @property int $id
 * @property string|null $doctorSpecialization
 * @property int|null $doctorId
 * @property int|null $userId
 * @property int|null $consultancyFees
 * @property string|null $appointmentDate
 * @property string|null $appointmentTime
 * @property int|null $userStatus
 * @property int|null $doctorStatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Appointment extends Model
{
	protected $table = 'appointments';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'doctorId' => 'int',
		'userId' => 'int',
		'consultancyFees' => 'int',
		'userStatus' => 'int',
		'doctorStatus' => 'int'
	];

	protected $fillable = [
		'id',
		'doctorSpecialization',
		'doctorId',
		'userId',
		'consultancyFees',
		'appointmentDate',
		'appointmentTime',
		'userStatus',
		'doctorStatus'
	];
}
