<div class="modal fade" id="update_email">
    <form action="profile.php" method="POST" enctype="multipart/form-data" >
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Eamil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group ">
                        <label>New Email</label>
                        <input class="form-control" name="email" id="name" type="text">
                        <input type="hidden" id="emails" name="" value="<?php echo $emails ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="update_email" class="btn btn-primary" id="update_email" value="Confirm">
                </div>
            </div>
        </div>
    </form>
</div>