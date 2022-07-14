<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Product\Product;
use App\Models\Others\Purchase\Purchase;
use App\Models\Others\Invoice\Invoice;
use App\Models\User;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $count = User::count();
        $product = Product::count();
        $purchase = Purchase::where('status','0')->count();
        $invoice = Invoice::where('status','0')->count();
        return view('backend.main-section.body.index',compact('count','product','purchase','invoice'));
    }
}
