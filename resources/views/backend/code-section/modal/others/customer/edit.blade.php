<div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-sm-6">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <ul id="update_msgList"></ul>
                <input type="hidden" id="edit_cs_id"/> 
                <div class="row">
                 <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" id="edit_name" placeholder="Enter Name">
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
                        <label>Address</label>
                        <input type="address" class="form-control" id="edit_address"  placeholder="Enter Adress">
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

                 <div class="col-sm-12 col-md-12"><br/>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light edit_customer">Update</button>
                    </div>
                 </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>