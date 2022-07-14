<?php

namespace App\Http\Controllers\Backend\Others\Default;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;

class DefaultController extends Controller
{
    public function GetCat(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['cat'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    }

    public function GetProduct(Request $request)
    {
        $category_id = $request->category_id;
        $allProduct = Product::where('category_id',$category_id)->get();
        return response()->json($allProduct);
    }

    public function GetStock(Request $request)
    {
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
}
