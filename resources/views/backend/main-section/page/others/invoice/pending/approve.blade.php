@extends('backend.main-section.body.main')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                </div>
                <br/>
                <!-- /.col -->
              </div>
              <!-- info row -->
              @php
              $payment = App\Models\Others\Invoice\Payment::where('invoice_id',$allData->id)->first();
              $setting = DB::table('settings')->first();  
              @endphp

              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/loader.png') }}" alt="" class="brand-image" height="50px" width="180px">
                  <address>
                    Address : {{$setting->address}}<br>
                    Phone : (88) {{$setting->contract}}<br>
                    Email : {{$setting->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>{{$payment['customer']['name']}}</strong><br>
                    {{$payment['customer']['address']}}<br>
                    Phone : {{$payment['customer']['mobile']}}<br>
                    Email : {{$payment['customer']['email']}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$allData->invoice_no}}</b><br> 
                  <b>Payment Due :</b> {{date('d-m-Y',strtotime($payment['invoice']['date']))}}<br>
                  <b>Account:</b>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <form method="post" action="{{route('invoice.status',$allData->id)}}">
                @csrf
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Stock</th>
                      <th>Quantity</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                        $total_sum = '0';
                      @endphp
                      @foreach ($allData['invoice_details'] as $key => $details)
                      <input type="hidden" name="category_id[]" value="{{$details->category_id}}">
                      <input type="hidden" name="product_id[]" value="{{$details->product_id}}">
                      <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}">
                      <tr>
                        <td>#{{$key+1}}</td>
                        <td>{{$details['product']['name']}}</td>
                        <td>{{$details['cat']['name']}}</td>
                        <td>{{$details['product']['quantity']}}</td>
                        <td>{{$details->selling_qty}}</td>
                        <td>BDT. {{$details->selling_price}}</td>
                      </tr>
                      @php
                      $total_sum += $details->selling_price;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <table class="table table-striped">
                      <tr>
                        <th style="width:50%">Subtotal :</th>
                        <td>BDT. {{$total_sum}}</td>
                      </tr>
                      <tr>
                        <th>Discount :</th>
                        <td>BDT. {{$payment->discount_amount}}</td>
                      </tr>
                      <tr>
                        <th>Total :</th>
                        <td>BDT. {{$payment->total_amount}}</td>
                      </tr>
                      <tr>
                        <th>Paid Amount :</th>
                        <td>BDT. {{$payment->paid_amount}}</td>
                      </tr>
                      <tr>
                        <th>Due Amount :</th>
                        <td>BDT. {{$payment->due_amount}}</td>
                      </tr>
                    </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;"><i class="fas fa-check"> Approve</i></button>
                 <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>-->
                </div>
              </div>
            </div>
          </form>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  @endsection