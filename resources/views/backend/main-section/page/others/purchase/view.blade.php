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
              <li class="breadcrumb-item active">Purchase List</li>
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
                    <a href="{{route('add.purchase')}}" class="btn btn-sm btn-info"><i class="fas fa-plus-circle md-2"></i> Add Purchase</a>
                </div><br/>
                <table id="mrs3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Purchase No</th>
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Buying Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user->purchase_no}}</td>
                    <td>{{$user->date}}</td>
                    <td>{{$user['supplier']['name']}}</td>
                    <td>{{$user['cat']['name']}}</td>
                    <td>{{$user['product']['name']}}</td>
                    <td>{{$user->buying_qty}} {{$user['product']['unit']['name']}}</td>
                    <td>{{$user->unit_price}}</td>
                    <td>{{$user->buying_price}}</td>
                    <td>
                      @if ($user->status == '0')
                    <span class="btn btn-xs btn-danger">Pending</span>
                    @elseif ($user->status == '1')
                    <span class="btn btn-xs btn-primary">Active</span>
                    @endif
                   </td>
                    <td>
                      @if ($user->status == '0')
                        <button type="button" value="{{$user->id}}" class="btn btn-xs btn-danger deletebtn"><i class="fas fa-trash"></i></button>
                      @endif
                    </td>
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

  @include('backend.code-section.modal.others.product.delete')

  @endsection
  
  @section('scripts')      
  
  @include('backend.code-section.ajax-script.others.product.all')
  
  @endsection