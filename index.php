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
    $consumer_name = $_POST['name'];
    $con1 = "INSERT INTO consumers(user_id, consumer_name) VALUES ('$user_id','$consumer_name')";
    $stmt = $pdo->prepare($con1);
    $stmt->execute();
    echo "<script> window.onload = function() {
        showMessage('The new consumer is added');
    }; </script>";
}
if (isset($_POST['remove'])) {
    $consumer_id = $_POST['consumer_id'];
    $con2 = "DELETE FROM consumers WHERE _id = $consumer_id";
    $stmt = $pdo->prepare($con2);
    $stmt->execute();
    $con3 = "DELETE FROM goods WHERE user_id= $user_id AND consumer_id =$consumer_id";
    $stmt = $pdo->prepare($con3);
    $stmt->execute();
    echo "<script> window.onload = function() {
        showMessage('The consumer is removed');
    }; </script>";
}
if (isset($_POST['update'])) {
    $update_name = $_POST['update_name'];
    $consumer_id = $_POST['consumer_id'];
    $con4 = "UPDATE consumers SET consumer_name = '$update_name' WHERE _id = $consumer_id AND user_id= $user_id";
    $stmt = $pdo->prepare($con4);
    $stmt->execute();
    echo "<script> window.onload = function() {
        showMessage('The consumer name is updated');
    }; </script>";
}

$con = "SELECT * FROM consumers ORDER BY consumer_name ";
$stmt = $pdo->prepare($con);
$stmt->execute();
$array = $stmt->fetchAll();
$consumers = json_decode(json_encode($array), true);
$user_consumers = [];
$arr = array('_id' => '', 'name' => '', 'total' => '');


foreach ($consumers as $consumer) {

    if ($consumer['user_id'] == $_SESSION['user_id']) {
        $sum = 0;
        $arr['name'] = $consumer['consumer_name'];
        $arr['_id'] = $consumer['_id'];
        $sal = 'SELECT * FROM goods ';
        $stmt = $pdo->prepare($sal);
        $stmt->execute();
        $array = $stmt->fetchAll();
        $sales = json_decode(json_encode($array), true);
        foreach ($sales as $sale) {
            if ($sale['user_id'] == $_SESSION['user_id'] && $sale['consumer_id'] == $consumer['_id'] && $sale['if_paid'] == 0) {
                $sum += $sale['price'];
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
    <meta http-equiv="refresh" content="900;url=logout.php" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <title>Consumers</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="assets/css/browse.css" rel="stylesheet" />
    <link href="assets/css/global.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

</head>

<body>
    <div class="root flex-container ">

        <div class="main-content flex-container ">
            <div><?php include 'templates/navside.php'; ?></div>

            <div class="main-container bo-row ">
                <div class="browse-root ">
                    <div id="alert" class="alert alert-success">
                        <strong>Success!</strong><label class="message" id="message">The consumer is added</label>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    <?php include 'templates/table.php'; ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../assets/js/search.js"></script>



<script type="text/javascript">
    function remove(id) {
        document.getElementById('consumer_id').value = id;
    }

    function edit(name, id) {
        document.getElementById('update_name').value = name;
        document.getElementById('consumer_update_id').value = id;
        console.log(id);
    }
</script>
<script>
    $(document).ready(function() {
        $('#addModal').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'This Field is Required <br />'
                        }

                    }
                },
            },
        });
        $('#updateModal').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                update_name: {
                    validators: {
                        notEmpty: {
                            message: 'This Field is Required <br />'
                        }

                    }
                },
            },
        });

    });
</script>

</html>