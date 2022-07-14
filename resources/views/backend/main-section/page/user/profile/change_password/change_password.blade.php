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
              <li class="breadcrumb-item active">Change-password</li>
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
                <form action="{{route('user.change.password.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Old Password<span class="text-red">*</span></label>
                                <input  type="password" id="current_password" class="form-control" name="oldpassword">
                            </div>
                            @error ('oldpassword')
                            <span class = "text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">New Password <span class="text-red">*</span></label>
                                <input  type="password" id="password" class="form-control" name="password">
                            </div>
                            @error ('password')
                                <span class = "text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">New Password <span class="text-red">*</span></label>
                                <input  type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                            </div>
                            @error ('password_confirmation')
                                <span class = "text-danger">{{$message}}</span>
                                @enderror
                        </div>                                         
                    </div>
                </div>                          
            <div class="modal-footer">
            <button class="btn btn-primary add_user">UPDATE</button>
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