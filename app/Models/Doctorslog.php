<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctorslog
 *
 * @property int $id
 * @property int|null $uid
 * @property string|null $username
 * @property string|null $userip
 * @property Carbon|null $loginTime
 * @property string|null $logout
 * @property int|null $status
 *
 * @package App\Models
 */
class Doctorslog extends Model
{
	protected $table = 'doctorslog';


	protected $casts = [
		'uid' => 'int',
		'userip' => 'binary',
		'status' => 'int'
	];

	protected $dates = [
		'loginTime'
	];

	protected $fillable = [
		'uid',
		'username',
		'userip',
		'loginTime',
		'logout',
		'status'
	];
}
