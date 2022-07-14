<div class="modal fade" id="addmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Create User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                     <div class="modal-body p-4">
                        <ul id="save_msgList"></ul>
                        <div class="row">
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="first_name" class="first_name form-control" id="first_name" placeholder="Enter first name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="last_name" class="last_name form-control" id="last_name" placeholder="Enter last name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="name" class="name form-control" id="name" placeholder="Username">
                                </div>
                            </div>
                         </div>

                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="gender" id="gender" class="gender form-control" data-toggle="select2">
                                    <option disabled selected>Choose one</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                     <option value="Others">Others</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="mobile" class="mobile form-control" id="mobile" data-a-sign="880 " placeholder="Enter Mobile">
                            </div>
                         </div>
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" id="email" class="email form-control" placeholder="Enter Valid Email">
                            </div>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="role form-control" data-toggle="select2">
                                    <option disabled selected>Choose one</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Sells Manager">Sells Manager</option>
                                </select>
                            </div>
                         </div>

                         <div class="col-sm-12 col-md-12"><br/><br/>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light add_user">Save</button>
                            </div>
                         </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
