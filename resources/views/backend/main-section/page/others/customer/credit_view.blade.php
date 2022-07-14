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
              <li class="breadcrumb-item active">Credit List</li>
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
                    <a href="{{route('credit.pdf')}}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-download md-2"></i> Download Pdf</a>
                </div><br/>
                <table id="mrs3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>{{$user['customer']['name']}}</td>
                    <td>#{{$user['invoice']['invoice_no']}}</td>
                    <td>{{date('d-m-Y',strtotime($user['invoice']['date']))}}</td>
                    <td>BDT. {{$user->due_amount}}</td>
                    <td>
                        <a href="{{route('edit.credit',$user->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{route('pdf.credit',$user->id)}}" target="_blank" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
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

@endsection