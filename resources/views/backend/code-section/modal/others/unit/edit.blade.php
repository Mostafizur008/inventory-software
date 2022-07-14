<div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <ul id="update_msgList"></ul>
                <input type="hidden" id="edit_ut_id"/> 
                <div class="row">
                 <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" id="edit_name" placeholder="Enter Name">
                    </div>
                 </div>

                 <div class="col-sm-12 col-md-12"><br/>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light edit_unit">Update</button>
                    </div>
                 </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>