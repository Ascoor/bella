<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


   protected $table = 'profile_users';
   protected $fillable = [
      'nickname', 'user_id', 'postion'

   ];
   public function user()
   {
      return $this->beLongsTo('App\User', 'user_id');
   }
}
