<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceService extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'section_id',
        'invoice_id',

    ];




}
