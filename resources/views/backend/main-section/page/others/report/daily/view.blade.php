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
                <br/>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <!-- left column -->
            <div class="col-md-8">
              <!-- jquery validation -->
              <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('pdf.view')}}" method="post" target="_blank">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input type="text" name="sdate" id="sdate" placeholder="Start Date"  required class="form-control" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" >
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                        </div>    
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input type="text" name="edate" id="edate" placeholder="End Date" required class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                         </div> 
                         <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Search</button>
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