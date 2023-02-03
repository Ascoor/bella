<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctorspecilization
 *
 * @property int $id
 * @property string|null $specilization
 * @property Carbon|null $creationDate
 * @property Carbon|null $updationDate
 *
 * @package App\Models
 */
class Doctorspecilization extends Model
{
	protected $table = 'doctorspecilization';



	protected $fillable = [
		'specilization',

	];
}
