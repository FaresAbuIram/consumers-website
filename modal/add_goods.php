<div class="modal fade" id="addModal">
    <form action="sales.php" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header">Add new Commodity </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body flex-container column ">
                    <div class="form-group ">
                        <label>Commodity's name</label>
                        <input class="form-control" name="name" id="name" type="text">
                        <input type="hidden" id="id" name="id" value="<?php echo $con_id ?>">
                    </div>
                    <div class="form-group ">
                        <label>Commodity's Price</label>
                        <input class="form-control" name="price" id="name" type="text">
                    </div>
                    <div class="form-group ">
                        <label>If Piad</label>
                        <select name="paid">
                            <option value="0">Not Paid</option>
                            <option value="1">Paid</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
</div>