<?php

namespace App\Models\Others\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;

class Purchase extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Suppliers::class,'supplier_id','id');
    }

    public function cat()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
