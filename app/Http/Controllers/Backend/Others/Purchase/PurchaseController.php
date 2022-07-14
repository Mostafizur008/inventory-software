<?php

namespace App\Http\Controllers\Backend\Others\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;
use App\Models\Others\Purchase\Purchase;
use DB;
use Auth;

class PurchaseController extends Controller
{
    public function PurchaseView()
    {
       $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
       return view('backend.main-section.page.others.purchase.view',compact('allData'));
    }

    public function AddView()
    {
       $data ['product'] = Product::all();
       $data ['supply']  = Suppliers::all();
       $data ['unit']  = Unit::all();
       $data ['cat'] = Category::all();
       return view('backend.main-section.page.others.purchase.add',$data);
    }

    public function Store(Request $request)
    {
      if($request->category_id == null)
      {
         return redirect()->back();
      }else{
         $count_category = count($request->category_id);
         for ($i=0; $i <$count_category; $i++){
            $purchase = new Purchase();
            $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
            $purchase->purchase_no = $request->purchase_no[$i];
            $purchase->supplier_id = $request->supplier_id[$i];
            $purchase->category_id = $request->category_id[$i];
            $purchase->product_id = $request->product_id [$i];
            $purchase->buying_qty = $request->buying_qty[$i];
            $purchase->unit_price = $request->unit_price[$i];
            $purchase->buying_price = $request->buying_price[$i];
            $purchase->description = $request->description [$i];
            $purchase->status = '0';
            $purchase->save();
         }
      }
      return redirect()->route('purchase.view');
    }

    public function PendingView()
    {
       $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
       return view('backend.main-section.page.others.purchase.pending.view',compact('allData'));
    }

    public function ChangeStatus($id)
    {
      $purchase = Purchase::find($id);
      $product = Product::where('id',$purchase->product_id)->first();
      $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
      $product->quantity = $purchase_qty;
      if($product->save()){
         DB::table('purchases')->where('id',$id)->update(['status'=> 1]);
      }
      return redirect()->route('pending.view');
   }
}
