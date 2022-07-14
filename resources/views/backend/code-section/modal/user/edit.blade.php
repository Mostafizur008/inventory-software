<div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-sm-6">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <ul id="update_msgList"></ul>
                <input type="hidden" id="edit_usr_id"/> 
                <div class="row">
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="first_name" class="form-control" id="edit_first_name" placeholder="Enter first name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="last_name" class="form-control" id="edit_last_name" placeholder="Enter last name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="name" class="form-control" id="edit_name" placeholder="Username">
                        </div>
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="gender" id="edit_gender" class="form-control">
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
                        <input type="mobile" class="form-control" id="edit_mobile" data-a-sign="880 " placeholder="Enter Mobile">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" id="edit_email" class="form-control" placeholder="Enter Valid Email">
                    </div>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="role" id="edit_role" class="form-control">
                            <option disable="">Choose one</option>
                            <option value="Manager">Manager</option>
                            <option value="Sells Manager">Sells Manager</option>
                        </select>
                    </div>
                 </div>

                 <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light edit_user">Update</button>
                    </div>
                 </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>