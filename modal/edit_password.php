<div class="modal fade" id="update_password">
    <form action="profile.php" method="POST" enctype="multipart/form-data" >
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Update Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label>Old Password</label>
                        <input class="form-control" name="old_password" id="name" type="password">
                    </div>
                    <div class="form-group ">
                        <label>New Password</label>
                        <input class="form-control" name="new_password" id="new_password" type="password">
                    </div>
                    <div class="form-group ">
                        <label>Re-type New Password</label>
                        <input class="form-control" name="re_new_password" id="name" type="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="update_password" class="btn btn-primary" id="update_password" value="Confirm">
                </div>
            </div>
        </div>
    </form>
</div>