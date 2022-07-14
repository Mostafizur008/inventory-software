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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" align="center" src="{{ (!empty($user->image)) ? url('backend/all-images/database/user/'.$user->image): url('backend/all-images/database/default/mps.png') }}" width="110px" height="110px" alt="Generic placeholder image">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <strong><i class="fas fa-mobile mr-1"></i> Mobile</strong>
                    <p class="text-muted">{{$user->mobile}}</p>
                  </li>
                  <li class="list-group-item">
                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{$user->email}}</p>
                  </li><br/>
                    <strong><i class="fas fa-calendar mr-1"></i> Join Date</strong>
                    <p class="text-muted">{{$user->created_at}}</p>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="card-body" align="right">
                        <div class="col-md-12">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#profilemodal">Edit Profile</button>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td class="fw-bold"  style="width: 30%;">First Name</td>
                            <td style="width: 3%;">:</td>
                            <td>{{$user->first_name}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">Last Name</td>
                            <td style="width: 3%;">:</td>
                            <td>{{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">Name</td>
                            <td style="width: 3%;">:</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">Gender</td>
                            <td style="width: 3%;">:</td>
                            <td>{{$user->gender}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">Blood</td>
                            <td style="width: 3%;">:</td>
                            <td>{{$user->blood}}</td>
                        </tr>
                    </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form action="{{route('user.change.password.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf  
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
                    <div class="modal-footer">
                        <button class="btn btn-primary add_user">UPDATE</button>
                    </div>
                  </div>                          
                </form>
                </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
@include('backend.code-section.modal.user.profile.edit')
@endsection