<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'client_id',
        'comment_text',
        'parent_id',
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
