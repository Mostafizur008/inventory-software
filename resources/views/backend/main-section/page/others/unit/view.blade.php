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
              <li class="breadcrumb-item active">Unit List</li>
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
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addmodal"><i class="fas fa-plus-circle md-2"></i> Add Unit</button>
                </div><br/>
                <table id="mrs3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Unit Name</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_by}}</td>
                    <td>{{$user->updated_by}}</td>
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

  @include('backend.code-section.modal.others.unit.add')
  @include('backend.code-section.modal.others.unit.edit')
  @include('backend.code-section.modal.others.unit.delete')

@endsection

@section('scripts')      

@include('backend.code-section.ajax-script.others.unit.all')

@endsection