<div class="modal fade" id="updateModal">
    <form action="sales.php" method="POST"  enctype="multipart/form-data">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-header">Update Commodity Information </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body flex-container column ">
                    <div class="form-group ">
                        <label>Commodity's name</label>
                        <input class="form-control" name="update_name" id="update_name" type="text" value="">
                        <input type="hidden" id="Commodity_update_id" name="Commodity_id" value="">
                        <input type="hidden" id="id" name="id" value="<?php echo $con_id ?>">
                    </div>
                    <div class="form-group ">
                        <label>Commodity's Price</label>
                        <input class="form-control" name="price" id="price_update" type="text">
                    </div>
                    <div class="form-group ">
                        <label>If Piad</label>
                        <select name="paid" id='piad_update' >
                            <option value="0">Not Paid</option>
                            <option value="1">Paid</option>
                        </select>
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