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
              <li class="breadcrumb-item active">Products List</li>
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
                    <a href="{{route('add.product')}}" class="btn btn-sm btn-info"><i class="fas fa-plus-circle md-2"></i> Add Product</a>
                </div><br/>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Supplier</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Unity</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user['supplier']['name']}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user['cat']['name']}}</td>
                    <td>{{$user['unit']['name']}}</td>
                    <td> <img src="{{ (!empty($user->image))? url('backend/all-images/others/product/'.$user->image):url('upload/no_image.jpg') }}" style="width: 80px; height: 40px;"></td>
                    @php
                    $count_product = App\Models\Others\Purchase\Purchase::where('product_id',$user->id)->count();
                    @endphp
                    <td>
                        <a href="{{route('product.edit',$user->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                        @if($count_product < 1) <button type="button" value="{{$user->id}}" class="btn btn-xs btn-danger deletebtn"><i class="fas fa-trash"></i></button> @endif
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