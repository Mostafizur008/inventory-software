<?php

namespace App\Models\Others\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Others\Customer\Customer;
use App\Models\Others\Invoice\Payment;

class Payment extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
}
