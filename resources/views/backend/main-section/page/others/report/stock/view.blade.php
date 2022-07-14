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
                <br/>
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
                <div class="col-12" align="right">
                    <a href="{{route('stock.pdf.view')}}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-download md-2"></i> Download Pdf</a>
                </div><br/>
                <table id="mrs3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Supplier</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>In Qty</th>
                    <th>Out Qty</th>
                    <th>Unity</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                    @php
                    $buying_total = App\Models\Others\Purchase\Purchase::where('category_id',$user->category_id)->where('product_id',$user->id)->where('status','1')->sum('buying_qty');
                    $selling_total = App\Models\Others\Invoice\InvoiceDetail::where('category_id',$user->category_id)->where('product_id',$user->id)->where('status','1')->sum('selling_qty');
                    @endphp
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user['supplier']['name']}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user['cat']['name']}}</td>
                    <td>{{$buying_total}}</td>
                    <td>{{$selling_total}}</td>
                    <td>{{$user->quantity}} {{$user['unit']['name']}}</td>
                
                    @php
                    $count_product = App\Models\Others\Purchase\Purchase::where('product_id',$user->id)->count();
                    @endphp
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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

  @endsection