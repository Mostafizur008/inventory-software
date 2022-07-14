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
              <li class="breadcrumb-item active">Edit Credit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">

                @php
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
                    <b>Invoice #{{$payment['invoice']['invoice_no']}}</b><br> 
                    <b>Payment Due :</b> {{date('d-m-Y',strtotime($payment['invoice']['date']))}}<br>
                    <b>Account:</b>
                  </div>
                  <!-- /.col -->
                </div>

                                <!-- /.row -->
             <form method="post" action="{{route('update.credit',$payment->invoice_id)}}">
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
                        $invoice_details = App\Models\Others\Invoice\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                      @endphp
                      @foreach ($invoice_details as $key => $details)
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
                        <td>
                          <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                          BDT. {{$payment->due_amount}}
                        </td>
                      </tr>
                    </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                            <select name="paid_status" id="paid_status" class="form-control">
                                <option disabled selected>Paid Status</option>
                              <option value="full_paid">Full Paid</option>
                              <option value="partial_paid">Partial Paid</option>
                            </select>
                            <input type="text" name="paid_amount" id="paid_amount" class="form-control form-control-sm text-right paid_amount" placeholder="Paid Amount" style="display: none;">
                          </div>
                        </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input type="text" name="date" id="date" required class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                          </div>
                </div>
            </div>
          </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <script type="text/javascript">
    $(document).on('change','#paid_status',function(){
    var paid_status = $(this).val();
      if(paid_status == 'partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    });
  </script>

@endsection