<?php

namespace App\Http\Controllers\Backend\Others\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Customer\Customer;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;
use App\Models\Others\Purchase\Purchase;
use App\Models\Others\Invoice\Invoice;
use App\Models\Others\Invoice\InvoiceDetail;
use App\Models\Others\Invoice\Payment;
use App\Models\Others\Invoice\PaymentDetail;
use DB;
use Auth;
use PDF;

class InvoiceController extends Controller
{
    public function InvoiceView()
    {
       $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
       return view('backend.main-section.page.others.invoice.view',compact('allData'));
    }

    public function AddView()
    {
       $data ['cat'] = Category::all();
       $invoice_data = Invoice::orderBy('id','desc')->first();
       if($invoice_data == null)
       {
        $firstReg = '0';
        $data ['invoice_no'] = $firstReg+1;
       }else{
        $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
        $data ['invoice_no'] = $invoice_data+1;
       }
       $data ['customer'] = Customer::all();
       $data ['date'] = date('d-m-Y');
       return view('backend.main-section.page.others.invoice.add',$data);
    }

    public function Store(Request $request)
    {
      if($request->category_id == null)
      {
         return redirect()->back();
      }else{
         if($request->paid_amount>$request->estimated_amount){
            return redirect()->back();
         }else{
            $invoice = new Invoice();
            $invoice->invoice_no = $request->invoice_no;
            $invoice->date = date('Y-m-d',strtotime($request->date));
            $invoice->status = '0';
            $invoice->created_by = Auth::user()->id;
            $invoice->save();
            DB::transaction(function() use($request,$invoice){
               if($invoice->save()){
                  $count_category = count($request->category_id);
                  for($i=0; $i <$count_category; $i++){
                     $invoice_details = new InvoiceDetail();
                     $invoice_details->date = date('Y-m-d',strtotime($request->date));
                     $invoice_details->invoice_id = $invoice->id;
                     $invoice_details->category_id = $request->category_id[$i];
                     $invoice_details->product_id = $request->product_id[$i];
                     $invoice_details->selling_qty = $request->selling_qty[$i];
                     $invoice_details->unit_price = $request->unit_price[$i];
                     $invoice_details->selling_price = $request->selling_price[$i];
                     $invoice_details->status = '0';
                     $invoice_details->save();
            }
            if($request->customer_id == '0'){
               $customer = new Customer();
               $customer->name = $request->name;
               $customer->mobile = $request->mobile;
               $customer->address = $request->address;
               $customer->save();
               $customer_id = $customer->id;
            }else{
               $customer_id = $request->customer_id;
            }
            $payment = new Payment();
            $payment_details = new PaymentDetail();
            $payment->invoice_id = $invoice->id;
            $payment->customer_id = $customer_id;
            $payment->paid_status = $request->paid_status;
            $payment->paid_amount = $request->paid_amount;
            $payment->discount_amount = $request->discount_amount;
            $payment->total_amount = $request->estimated_amount;
            if($request->paid_status == 'full_paid'){
               $payment->paid_amount = $request->estimated_amount;
               $payment->due_amount = '0';
               $payment_details->current_paid_amount = '0';
            }elseif($request->paid_status == 'full_due'){
               $payment->paid_amount = '0';
               $payment->due_amount = $request->estimated_amount;
               $payment_details->current_paid_amount = $request->estimated_amount;
               }elseif($request->paid_status == 'partial_paid'){
                  $payment->paid_amount = $request->paid_amount;
                  $payment->due_amount = $request->estimated_amount-$request->paid_amount;
                  $payment_details->current_paid_amount = $request->paid_amount;
               }
               $payment->save();
               $payment_details->invoice_id = $invoice->id;
               $payment_details->date = date('Y-m-d',strtotime($request->date));
               $payment_details->save();
         }
         });
       }
      }
      return redirect()->route('approve.view');
   }

   public function ApproveView()
   {
      $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
      return view('backend.main-section.page.others.invoice.pending.view',compact('allData'));
   }

   public function PendingInvoice($id)
   {
      $allData = Invoice::with(['invoice_details'])->find($id);
      return view('backend.main-section.page.others.invoice.pending.approve',compact('allData'));
   }

   public function InvoiceStatus(Request $request,$id)
   {
      foreach ($request->selling_qty as $key => $val){
         $invoice_details = InvoiceDetail::where('id',$key)->first();
         $product = Product::where('id',$invoice_details->product_id)->first();
         if($product->quantity < $request->selling_qty[$key]){
            return redirect()->back();
         }
      }
      $invoice = Invoice::find($id);
      $invoice->approved_by = Auth::user()->id;
      $invoice->status = '1';
      DB::transaction(function() use($request,$invoice,$id){
         foreach ($request->selling_qty as $key => $val){
            $invoice_details = InvoiceDetail::where('id',$key)->first();
            $invoice_details->status = '1';
            $invoice_details->save();
            $product = Product::where('id',$invoice_details->product_id)->first();
            $product->quantity = ((float)$product->quantity)-((float)$request->selling_qty[$key]);
            $product->save();
         }
         $invoice->save();
      });
      return redirect()->route('invoice.view');
  }

  public function Invoice($id)
  {
      $data ['allData'] = Invoice::with(['invoice_details'])->find($id);
      $pdf = PDF::loadView('backend.main-section.page.others.invoice.detail', $data);
      return  $pdf->stream('invoice.pdf');
  }

}
