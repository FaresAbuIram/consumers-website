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
$remove_one = '';
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $consumer_name = $_POST['name'];
    $con1 = "INSERT INTO consumers(`user_id`, `consumer_name`) VALUES ('$user_id','$consumer_name')";
    $result1 = mysqli_query($connect, $con1);
}
if (isset($_POST['remove'])) {
    $user_id = $_SESSION['user_id'];
    $consumer_id = $_POST['consumer_id'];
    $con2 = "DELETE FROM consumers WHERE _id= $consumer_id";
    $result2 = mysqli_query($connect, $con2);
    $con3 = "DELETE FROM goods WHERE user_id= $user_id AND consumer_id =$consumer_id";
    $result3 = mysqli_query($connect, $con3);

}

$con = 'SELECT * FROM consumers ORDER BY consumer_name';
$result = mysqli_query($connect, $con);
$consumers = mysqli_fetch_all($result);
$user_consumers = [];
$arr = array('_id' => '', 'name' => '', 'total' => '');


foreach ($consumers as $consumer) {

    if ($consumer[1] == $_SESSION['user_id']) {
        $sum = 0;
        $arr['name'] = $consumer[2];
        $arr['_id'] = $consumer[0];
        $sal = 'SELECT * FROM goods ';
        $result = mysqli_query($connect, $sal);
        $sales = mysqli_fetch_all($result);
        foreach ($sales as $sale) {
            if ($sale[1] == $_SESSION['user_id'] && $sale[2] == $consumer[0] && $sale[5] == 0) {
                $sum += $sale[4];
            }
        }
        $arr['total'] = $sum;
        array_push($user_consumers, $arr);
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
                    <?php include 'templates/table.php'; ?>
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
        document.getElementById('consumer_id').value = id;
    }
</script>

</html>