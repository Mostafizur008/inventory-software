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
                <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Title</label>
                               <input type="text" name="title" value="{{$settings->title}}" class="form-control">
                           </div>
                        </div>    
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Sort Name</label>
                                <input type="text" name="sortname" value="{{$settings->sortname}}" class="form-control">
                            </div>
                         </div>   
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" value="{{$settings->description}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Contract</label>
                                <input type="text" name="contract" value="{{$settings->contract}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                          <div class="form-group">
                              <label>Contract</label>
                              <input type="text" name="contract2" value="{{$settings->contract2}}" class="form-control">
                          </div>
                       </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$settings->email}}" class="form-control">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                          <div class="form-group">
                              <label>Web Link</label>
                              <input type="text" name="link" value="{{$settings->link}}" class="form-control">
                          </div>
                       </div>
                       <div class="col-sm-6 col-md-3"></div>
                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Site Logo<span class="text-red"> *</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 mb-0">
                            <div class="form-group">
                                <img id="showImage" src="{{ (!empty($settings->image)) ? url('backend/all-images/web/logo/'.$settings->image) : url('backend/all-images/others/default/img.gif') }}" alt="image" class="profile-user-img" width="100px" height="100px"/>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-0">
                            <div class="form-group">
                                <label class="form-label">Favico Icon<span class="text-red"> *</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" id="photo">
                                    <label class="custom-file-label" for="photo">Choose file</label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 mb-0">
                            <div class="form-group">
                                <img id="showPhoto" src="{{ (!empty($settings->photo)) ? url('backend/all-images/web/logo/icon/'.$settings->photo) : url('backend/all-images/others/default/img.gif') }}" alt="image" class="profile-user-img" width="100px" height="100px"/>
                            </div>
                        </div>

                        
                        <div class="col-sm-12 col-md-12"><br/>
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