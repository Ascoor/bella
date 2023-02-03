<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Userlog
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
class Userlog extends Model
{
	protected $table = 'userlog';
	public $timestamps = false;

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
