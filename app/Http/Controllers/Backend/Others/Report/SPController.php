<?php

namespace App\Http\Controllers\Backend\Others\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;
use PDF;

class SPController extends Controller
{
    public function SpView()
    {
        $data ['supplier'] = Suppliers::all();
        $data ['cat'] = Category::all();
       return view('backend.main-section.page.others.report.sp.view',$data);
    }

    public function SpPdf(Request $request)
    {
        $data ['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.main-section.page.others.report.sp.pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }

    public function ProductPdf(Request $request)
    {
        $data ['details'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf = PDF::loadView('backend.main-section.page.others.report.sp.productpdf', $data);
        return  $pdf->stream('invoice.pdf');
    }
}
