<?php

namespace App\Models\Others\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Others\Category\Category;
use App\Models\Others\Product\Product;

class InvoiceDetail extends Model
{
    public function cat()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
