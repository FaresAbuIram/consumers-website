<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<?php
include('auth/auth.php');
include('database/db.php');
$user_id = $_SESSION['user_id'];
if (isset($_POST['submit'])) {
    $cons_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $paid = $_POST['paid'];

    $price_name = $_POST['name'];
    $con1 = "INSERT INTO goods(`user_id`, `consumer_id`, `name`, `price`, `if_paid`) VALUES ('$user_id','$cons_id','$name', '$price','$paid')";
    $result1 = mysqli_query($connect, $con1);

    header("Location: sales.php?id=$cons_id");
}
if (isset($_POST['remove'])) {
    $cons_id = $_POST['id'];
    $commodity_id = $_POST['Commodity_id'];
    $con2 = "DELETE FROM goods WHERE _id = $commodity_id";
    $result2 = mysqli_query($connect, $con2);

    header("Location: sales.php?id=$cons_id");
}
if (isset($_POST['update'])) {
    $cons_id = $_POST['id'];
    $Commodity_id = $_POST['Commodity_id'];
    $price = $_POST['price'];
    $paid = $_POST['paid'];
    $update_name = $_POST['update_name'];

    $con4 = "UPDATE goods SET name = '$update_name', price = $price, if_paid = $paid WHERE _id = $Commodity_id";
  
    $result4 = mysqli_query($connect, $con4);

    header("Location: sales.php?id=$cons_id");
}
$sale_consumers = [];
$total = '';
$consumer_name = '';
$con_id = '';
if (isset($_GET)) {
    $con_id = $_GET['id'];
    $con = 'SELECT * FROM consumers';
    $result = mysqli_query($connect, $con);
    $consumers = mysqli_fetch_all($result);
    foreach ($consumers as $consumer) {
        if ($consumer[0] == $con_id) {
            $consumer_name = $consumer[2];
            break;
        }
    }

    $con = 'SELECT * FROM goods ORDER BY name';
    $result = mysqli_query($connect, $con);
    $sales = mysqli_fetch_all($result);

    $arr = array('_id' => '', 'name' => '', 'price' => '', 'date' => '', 'paid' => '');
    $total = 0;
    foreach ($sales as $sale) {
        if ($sale[1] == $_SESSION['user_id'] && $sale[2] == $con_id) {
            $arr['name'] = $sale[3];
            $arr['_id'] = $sale[0];
            $arr['price'] = $sale[4];
            $arr['date'] = $sale[6];
            if ($sale[5] == 0) {
                $arr['paid'] = 'Not Paid';
                $total += $sale[4];
            } else {
                $arr['paid'] = 'Paid';
            }
            array_push($sale_consumers, $arr);
        }
    }
}


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>My website</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/browse.css" rel="stylesheet" />
    <link href="assets/css/global.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

</head>

<body>
    <div class="root flex-container ">
        <div class="main-content flex-container">
            <div><?php include 'templates/navside.php'; ?></div>
            <div class="main-container bo-row ">
                <div class="browse-root ">
                    <?php include 'templates/table_sal.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script src="../assets/js/search.js"></script>

<!--  Chartist Plugin  -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        demo.showNotification();

    });
</script>
<script type="text/javascript">
    function remove(id) {
        document.getElementById('Commodity_id').value = id;
    }

    function edit(name, id, price) {
        document.getElementById('update_name').value = name;
        document.getElementById('Commodity_update_id').value = id;
        document.getElementById('price_update').value = price;

    }
</script>


</html>