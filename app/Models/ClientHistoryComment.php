<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHistoryComment extends Model
{
    use HasFactory;
    protected $table = 'client_history_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function clientHistory()
    {
        return $this->belongsTo(ClientHistory::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
