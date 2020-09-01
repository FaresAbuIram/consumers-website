<?php
include('database/db.php');
$errors = array('email' => '', 'name' => '', 'password' => '', 'rePassword' => '');
$login_error = '';
$email = $name  = '';
if (isset($_POST['register'])) {
    $name = $_POST['user_name'];

    if (empty($_POST['email'])) {
        $errors['email'] = 'This field is required ! <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email must  be a vaild email ! <br />";
        } else {
            $allUser = 'SELECT * FROM users';
            $result = mysqli_query($connect, $allUser);
            $users = mysqli_fetch_all($result);

            foreach ($users as $user) {
                if ($user[1] == $email) {
                    $errors['email'] = "This email is exist ! <br />";
                    break;
                }
            }
        }
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'This field is required ! <br />';
    }
    if (empty($_POST['re_password'])) {
        $errors['rePassword'] = 'This field is required ! <br />';
    }
    if (!empty($_POST['password']) && !empty($_POST['re_password']) && $_POST['password'] != $_POST['re_password']) {
        $errors['rePassword'] = 'This Password does not match ! <br />';
    }
    if (empty($_POST['user_name'])) {
        $errors['name'] = 'This field is required ! <br />';
    }

    if (!array_filter($errors)) {
        $email = $_POST['email'];
        $name = $_POST['user_name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $users = "INSERT INTO users(`email`, `password`, `name`) VALUES ( '$email','$password', '$name')";
        $result = mysqli_query($connect, $users);

        header('Location: login.php');
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/global.css">

    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>


    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Create a new account</h3>
                                <p>Fill your Information below to sign up :</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="register.php" method="POST" class="login-form">
                                <div class="form-group ">
                                    <input type="text" placeholder="User Name" name="user_name" value="<?php echo $name ?>" class="form-email form-control" id="form-email">
                                    <div class="error"><?php echo $errors['name'] ?></div>
                                </div>

                                <div class="form-group">
                                    <input type="text" placeholder="Email" name="email" value="<?php echo $email ?>" class="form-email form-control" id="form-email">
                                    <div class="error"><?php echo $errors['email'] ?></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="password" class="form-password form-control" id="form-password">
                                    <div class="error"><?php echo $errors['password'] ?></div>

                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Re-Type Password" name="re_password" class="form-password form-control" id="form-password">
                                    <div class="error"><?php echo $errors['rePassword'] ?></div>
                                </div>
                                <input type="submit" name="register" class="btn" value="Sign in!">
                                <div class="error"><?php echo $login_error; ?></div>
                                <div style="text-align: center; "> <a href="login.php" style="color: blue;  text-decoration: underline;  text-align: center; 	cursor: pointer;"> Click to log in</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>


</body>

</html>