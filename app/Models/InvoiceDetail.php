<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'status',
        'value_status',
        'payment_date',
        'payment_amount',
        'note',
        'user_id',
    ];
    public function  invoice()
{
   return $this->belongsTo(Invoice::class, 'invoice_id');
}
    public function  user()
{
   return $this->belongsTo(User::class);
}


}
