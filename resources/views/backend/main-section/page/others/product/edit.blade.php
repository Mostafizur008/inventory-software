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
              <li class="breadcrumb-item active">Products Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('product.update',$editData->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Supplier Name <span class="text-red"> *</span></label>
                                <select name="supplier_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($supply as $sp)
                                    <option value="{{$sp->id}}" {{ ($editData->supplier_id == $sp->id)? "selected":"" }}>{{$sp->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Product Name</label>
                               <input type="name" name="name" value="{{$editData->name}}" class="form-control" id="name" placeholder="Enter Product Name">
                           </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Category <span class="text-red"> *</span></label>
                                <select name="category_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($cat as $sp)
                                    <option value="{{$sp->id}}" {{ ($editData->category_id == $sp->id)? "selected":"" }}>{{$sp->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Unity<span class="text-red"> *</span></label>
                                <select name="unit_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($unit as $ut)
                                    <option value="{{$ut->id}}" {{ ($editData->unit_id == $ut->id)? "selected":"" }}>{{$ut->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <label class="form-label">Product Image<span class="text-red"> *</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image" value="{{$editData->image}}">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <div class="form-group">
                                <img id="showImage" src="{{ (!empty($editData->images)) ? url('backend/all-images/others/product/'.$editData->image): url('backend/all-images/others/default/img.gif') }}" alt="image" class="profile-user-img" width="100px" height="100px"/>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                           </div>
                        </div>
                  </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

@endsection