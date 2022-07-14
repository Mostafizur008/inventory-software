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
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addmodal"><i class="fas fa-plus-circle md-2"></i> Add User</button>
                </div><br/>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Postion</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <button type="button" value="{{$user->id}}" class="btn btn-xs btn-primary editbtn"><i class="fas fa-edit"></i></button>
                        <button type="button" value="{{$user->id}}" class="btn btn-xs btn-danger deletebtn"><i class="fas fa-trash"></i></button>
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

  @include('backend.code-section.modal.user.add')
  @include('backend.code-section.modal.user.edit')
  @include('backend.code-section.modal.user.delete')

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.user.all')

@endsection