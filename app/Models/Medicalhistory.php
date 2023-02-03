<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicalhistory
 *
 * @property int $ID
 * @property int|null $PatientID
 * @property string|null $BloodPressure
 * @property string $BloodSugar
 * @property string|null $Weight
 * @property string|null $Temperature
 * @property string|null $MedicalPres
 * @property Carbon $CreationDate
 *
 * @package App\Models
 */
class Medicalhistory extends Model
{
	protected $table = 'medicalhistory';
	protected $primaryKey = 'ID';

	protected $casts = [
		'PatientID' => 'int'
	];



	protected $fillable = [
		'PatientID',
		'BloodPressure',
		'BloodSugar',
		'Weight',
		'Temperature',
		'MedicalPres',

	];
}
