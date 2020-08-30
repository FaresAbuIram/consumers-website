<div class="title-container flex-container space-around align-center" >
    <h2><?php echo $consumer_name.' sales' ?></h2>
    <h2><?php echo 'Total Price : '. $total ?></h2>

</div>
<div style="min-height:71px" class="browse-panel flex-container align-center space-between mr-bm-50">
    <div class="search-container flex-box-40">
        <form>
            <input type="text" name="searchString" placeholder="Search..." id="">
            <i class="fas fa-search search-icon"></i>

        </form>
    </div>
    <div class="fabs-container flex-box-20 flex-container center align-center">
        <button class="fab-button success large" data-toggle="modal" data-target="#addModal">
            <i class="fas fa-plus"></i>
        </button>

    </div>
</div>
<div class="bo-row browse-panel flex-container ">
    <div class="bo-row">
        <table class="bo-row browse-table table-hover">
            <thead>
                <tr style="line-height: 35px;">

                    <th>Good's Name </th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Paid</th>
                    <th>Actions</th>
            </thead>
            <tbody>
                <?php foreach ($sale_consumers as $name) : ?>
                    <tr>

                        <td> <?php echo $name['name']; ?> </td>
                        <td> <?php echo $name['price'] ?> </td>
                        <td> <?php echo $name['date'] ?> </td>
                        <td> <?php echo $name['paid'] ?> </td>

                        <td>
                            <div class="flex-container align-center center ">
                                <button class="fab-button danger small mr-rm-10" data-toggle="modal" data-target="#delModal" onclick="remove(<?php echo $name['_id']; ?>); ">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                <button class="fab-button edit small mr-rm-10" data-toggle="modal" data-target="#updateModal" id="name_cons" value=" " onclick=edit(this.parentElement.parentElement.parentElement.children[0].innerHTML,<?php echo $name['_id']; ?>);>
                                    <i class="fas fa-edit" style="font-weight: 500;"></i>
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>
<?php include 'modal/add_consumer.php'; ?>
<?php include 'modal/remove_consumer.php'; ?>
<?php include 'modal/update.php'; ?>