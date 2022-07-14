<?php

namespace App\Models\Others\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Others\Invoice\Payment;
use App\Models\Others\Invoice\InvoiceDetail;

class Invoice extends Model
{
    public function payment()
    {
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }

    public function invoice_details()
    {
        return $this->hasMany(InvoiceDetail::class,'invoice_id','id');
    }
}
