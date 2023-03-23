<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAttachment extends Model
{
    use HasFactory;

    protected $table = 'invoice_attachments';


    public function clientHistories()
    {
        return $this->belongsToMany(ClientHistory::class, 'client_history_invoice')->withPivot('amount_paid');
    }
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}
