<div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm-6">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Profile Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12" align="center">
                        <img id="showImage" src="{{ (!empty($user->image)) ? url('backend/all-images/database/user/'.$user->image): url('backend/all-images/database/default/mps.png') }}" alt="image" class="profile-user-img img-fluid img-circle" width="110px" height="110px"/><br/>
                        <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                    </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="first_name" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}" placeholder="Enter first name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="last_name" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}" placeholder="Enter last name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="name" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Username">
                        </div>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="gender" id="gender" class="form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="Male" {{ ($user->gender == "Male" )? "selected": ""}}>Male</option>
                            <option value="Female" {{ ($user->gender == "Female" )? "selected": ""}}>Female</option>
                            <option value="Others" {{ ($user->gender == "Others" )? "selected": ""}}>Others</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Blood</label>
                        <select name="blood" id="blood" class="form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="A+" {{ ($user->blood == "A+" )? "selected": ""}}>A+</option>
                            <option value="A-" {{ ($user->blood == "A-" )? "selected": ""}}>A-</option>
                            <option value="B+" {{ ($user->blood == "B+" )? "selected": ""}}>B+</option>
                            <option value="B-" {{ ($user->blood == "B-" )? "selected": ""}}>B-</option>
                            <option value="O+" {{ ($user->blood == "O+" )? "selected": ""}}>O+</option>
                            <option value="O-" {{ ($user->blood == "O-" )? "selected": ""}}>O-</option>
                            <option value="AB+" {{ ($user->blood == "AB+" )? "selected": ""}}>AB+</option>
                            <option value="AB-" {{ ($user->blood == "AB-" )? "selected": ""}}>AB-</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="mobile" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" data-a-sign="880 " placeholder="Enter Mobile">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Valid Email">
                    </div>
                    </div>
                 </div>

                 <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                 </div>
                </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>