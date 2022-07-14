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
              <li class="breadcrumb-item active">Supplier List</li>
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
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addmodal"><i class="fas fa-plus-circle md-2"></i> Add Suppliers</button>
                </div><br/>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Staff</th>
                    <th>Company</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user->staff_name}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->email}}</td>
                    @php
                    $count_supplier = App\Models\Others\Product\Product::where('supplier_id',$user->id)->count();
                    @endphp
                    <td>
                        <button type="button" value="{{$user->id}}" class="btn btn-xs btn-primary editbtn"><i class="fas fa-edit"></i></button>
                     @if($count_supplier < 1)   <button type="button" value="{{$user->id}}" class="btn btn-xs btn-danger deletebtn"><i class="fas fa-trash"></i></button> @endif
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

  @include('backend.code-section.modal.others.suppliers.add')
  @include('backend.code-section.modal.others.suppliers.edit')
  @include('backend.code-section.modal.others.suppliers.delete')

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.others.suppliers.all')

@endsection