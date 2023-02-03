<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 *
 * @property int $ID
 * @property int|null $Docid
 * @property string|null $PatientName
 * @property int|null $PatientContno
 * @property string|null $PatientEmail
 * @property string|null $PatientGender
 * @property string|null $PatientAdd
 * @property int|null $PatientAge
 * @property string|null $PatientMedhis
 * @property Carbon|null $CreationDate
 * @property Carbon|null $UpdationDate
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $table = 'patients';
	protected $primaryKey = 'ID';


	protected $casts = [
		'Docid' => 'int',
		'PatientContno' => 'int',
		'PatientAge' => 'int'
	];



	protected $fillable = [
		'Docid',
		'PatientName',
		'PatientContno',
		'PatientEmail',
		'PatientGender',
		'PatientAdd',
		'PatientAge',
		'PatientMedhis',

	];
}
