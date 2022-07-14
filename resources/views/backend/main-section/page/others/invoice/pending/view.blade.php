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
              <li class="breadcrumb-item active">Pending List</li>
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
                <table id="mrs3" class="table table-bordered table-striped">
                  <thead align="center">
                  <tr>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody align="center">
                    @foreach ($allData as $key=>$user)
                  <tr>
                    <td>#{{$user->invoice_no}}</td>
                    <td>{{$user['payment']['customer']['name']}}</td>
                    <td>{{$user['payment']['customer']['mobile']}}</td>
                    <td>{{date('d-m-Y',strtotime($user->date))}}</td>
                    <td>BDT. {{$user['payment']['total_amount']}}/-</td>
                    <td>
                        @if($user->status == '0')
                        <a href="{{ route('pending.invoice.view',$user->id)}}" class="btn  btn-xs btn-danger">Pendding</a>
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

  @endsection
  
  @section('scripts')