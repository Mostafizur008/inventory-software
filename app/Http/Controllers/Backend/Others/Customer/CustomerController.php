<?php

namespace App\Http\Controllers\Backend\Others\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Customer\Customer;
use App\Models\Others\Invoice\Invoice;
use App\Models\Others\Invoice\InvoiceDetail;
use App\Models\Others\Invoice\Payment;
use App\Models\Others\Invoice\PaymentDetail;
use Illuminate\Support\Facades\Validator;
use Auth;
use PDF;

class CustomerController extends Controller
{
    public function CustomerView()
    {
       $allData = Customer::all();
       return view('backend.main-section.page.others.customer.view',compact('allData'));
    }

    public function fetchuser()
    {
        $all = User::all();
        return response()->json([
            'users'=>$all,
        ]);
    }

    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'address'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $data = new Customer();
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->mobile = $request->input('mobile');
            $data->email = $request->input('email');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'Customer Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if($customer)
        {
            return response()->json([
                'status'=>200,
                'customer'=> $customer,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Customer Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'address'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $customer = Customer::find($id);
            if($customer)
            {
            $customer->name = $request->input('name');
            $customer->address = $request->input('address');
            $customer->mobile = $request->input('mobile');
            $customer->email = $request->input('email');
            $customer->update();
            return response()->json([
                'status'=>200,
                'message'=>'Suppliers Edit Successfully.'
            ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No User Found.'
                ]);
            }
        }


    }


    public function destroy($id)
    {
        $all = Customer::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Customer Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Customer Found.'
            ]);
        }
    }
    public function CreditView()
    {
       $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
       return view('backend.main-section.page.others.customer.credit_view',compact('allData'));
    }

    public function CreditPdf()
    {
        $data ['allData'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        $pdf = PDF::loadView('backend.main-section.page.others.customer.credit_pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }

    public function EditCredit($id){
        $payment = Payment::where('invoice_id',$id)->first();
        return view('backend.main-section.page.others.customer.credit_edit',compact('payment'));
    }

    public function UpdateCredit(Request $request,$invoice_id){
        if($request->new_paid_amount < $request->paid_amount){
            return redirect()->back();
        }else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;
            if($request->paid_status == 'full_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;
            }elseif($request->paid_status == 'partial_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }
            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->save();
            return redirect()->route('credit.customer');
        }
    }

    public function PdfCredit($invoice_id)
    {
        $data ['payment'] = Payment::where('invoice_id',$invoice_id)->first();
        $pdf = PDF::loadView('backend.main-section.page.others.customer.pdf_credit', $data);
        return  $pdf->stream('invoice.pdf');
    }

    public function PaidView()
    {
       $allData = Payment::where('paid_status','!=','full_due')->get();
       return view('backend.main-section.page.others.customer.paid_view',compact('allData'));
    }

    public function PaidPdf()
    {
        $data ['allData'] = Payment::where('paid_status','!=','full_due')->get();
        $pdf = PDF::loadView('backend.main-section.page.others.customer.paid_pdf', $data);
        return  $pdf->stream('invoice.pdf');
    }
}
