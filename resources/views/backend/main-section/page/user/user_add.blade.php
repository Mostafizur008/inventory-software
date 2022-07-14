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
              <li class="breadcrumb-item active">User List</li>
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
                <form action="{{route('Store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>First Name</label>
                               <input type="first_name" name="first_name" class="form-control" id="first_name" placeholder="Enter first name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Last Name</label>
                               <input type="last_name" name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group mb-3">
                               <label>Username</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">@</span>
                                   </div>
                                   <input type="name" name="name" class="form-control" id="name" placeholder="Username">
                               </div>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Sex</label>
                               <select name="gender" name="gender" id="gender" class="form-control" data-toggle="select2">
                                   <option disable="">Choose one</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Mobile</label>
                               <input type="mobile" name="mobile" class="form-control" id="mobile" data-a-sign="880 " placeholder="Enter Mobile">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Email</label>
                               <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                               </div>
                               <input type="email" name="email" id="email" class="form-control" placeholder="Enter Valid Email">
                           </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="form-group">
                              <label>Role</label>
                              <select name="role" name="role" id="role" class="form-control" data-toggle="select2">
                                  <option disabled selected>Choose one</option>
                                  <option value="Manager">Manager</option>
                                  <option value="Sells Manager">Sells Manager</option>
                              </select>
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