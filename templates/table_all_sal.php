<div class="title-container flex-container space-around align-center" >
<h2><?php echo 'Total Unpaid Price : '. $total ?></h2>


</div>
<div style="min-height:71px" class="browse-panel flex-container align-center space-between mr-bm-50">
    <div class="search-container flex-box-40">
        <form>
            <input type="text" name="searchString" placeholder="Search..." id="search" onkeyup=searchElement();>
            <i class="fas fa-search search-icon"></i>

        </form>
    </div>
    
</div>
<div class="bo-row browse-panel flex-container ">
    <div class="bo-row">
        <table class="bo-row browse-table table-hover">
            <thead>
                <tr style="line-height: 35px;">

                    <th>Commodity's Name </th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Paid</th>
            </thead>
            <tbody>
                <?php foreach ($allSale as $name) : ?>
                    <tr>

                        <td> <?php echo $name['name']; ?> </td>
                        <td> <?php echo $name['price'] ?> </td>
                        <td> <?php echo $name['date'] ?> </td>
                        <td> <?php echo $name['paid'] ?> </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>