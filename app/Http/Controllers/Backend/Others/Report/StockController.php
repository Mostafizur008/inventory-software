<?php

namespace App\Http\Controllers\Backend\Others\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;
use PDF;

class StockController extends Controller
{
    public function StView()
    {
       $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('status','1')->get();
       return view('backend.main-section.page.others.report.stock.view',compact('allData'));
    }

    public function StockView()
    {
        $data ['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('status','1')->get();
        $pdf = PDF::loadView('backend.main-section.page.others.report.stock.pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }
}
