<div class="modal fade" id="delModal">
    <form action="index.php" method="POST" enctype="multipart/form-data" id="delete-modal">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <input type="hidden" id="consumer_id" name="consumer_id" value="">
                </div>
                <div class="modal-body">
                    Please confirm your delete action
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="remove" class="btn btn-danger" id="deleteOne" value="Confirm">
                </div>
            </div>
        </div>
    </form>
</div>