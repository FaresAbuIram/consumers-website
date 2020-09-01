<div class="modal fade" id="update_name">
    <form action="profile.php" method="POST" enctype="multipart/form-data" >
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update User Name</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group ">
                        <label>New Name</label>
                        <input class="form-control" name="user_name" id="name" type="text" value="<?php echo $userName ?>" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="update_name" class="btn btn-primary" id="update_email" value="Confirm">
                </div>
            </div>
        </div>
    </form>
</div>