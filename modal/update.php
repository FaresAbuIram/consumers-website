<div class="modal fade" id="updateModal">
    <form action="index.php" method="POST"  enctype="multipart/form-data">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header">Update Consumer Information </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body flex-container column ">
                    <div class="form-group ">
                        <label>Consumer's name</label>
                        <input class="form-control" name="update_name" id="update_name" type="text" value="">
                        <input type="hidden" id="consumer_update_id" name="consumer_id" value="">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit"  name="update" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
</div>