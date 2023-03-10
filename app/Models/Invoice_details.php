<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    use HasFactory;
    protected $filable = [
        'invoice_id',
        'status',
        'value_status',
        'note',
        'payment_date',
        'user_id',

];


public function  invoice()
{
   return $this->belongsTo(Invoice::class, 'invoice_id');
}
}