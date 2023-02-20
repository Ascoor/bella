<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'amount_collection',
        'discount',
        'value_vat',
        'rate_vat',
        'total',
        'note',
        'client_id',
        'created_by',
    ];




        public function client()
        {
            return $this->belongsTo(Client::class);
        }

        public function section()
        {
            return $this->belongsTo(Section::class);
        }

        public function services()
        {
            return $this->belongsToMany(Service::class);
        }

        public function attachments()
        {
            return $this->hasMany(Attachment::class);
        }
        public function invoice_details()
        {
            return $this->hasMany(InvoiceDetail::class);
        }
    }

