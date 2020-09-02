<?php
include('database/db.php');
$errors = array('email' => '', 'password' => '');
$login_error = '';
$email = $password = '';
if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required ! <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email must  be a vaild email";
        }
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required ! <br />';
    }
    if (!array_filter($errors)) {
        $allUser = 'SELECT * FROM users';
        $stmt = $pdo->prepare($allUser);
        $stmt->execute();
        $array = $stmt->fetchAll();
        $users = json_decode(json_encode($array), true);
        $correct = false;
        $corr_user = '';
        $user_id = '';
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                $correct = true;
                $user_id = $user['_id'];
                $corr_user = $user['password'];
                break;
            }
        }
        if (!$correct) {
            $login_error = 'User does not exist ! <br />';
        } elseif (!password_verify($_POST['password'], $corr_user)) {
            $login_error = 'Password does not correct ! <br />';
        } else {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header('Location: index.php');
        }
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

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
                                <h3>Login to our site</h3>
                                <p>Enter your email and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="/login.php" method="POST" class="login-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Email" name="email" value="<?php echo $email ?>" class="form-email form-control" id="form-email">
                                    <div class="error"><?php echo $errors['email'] ?></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="password" class="form-password form-control" id="form-password">
                                    <div class="error"><?php echo $errors['password'] ?></div>
                                </div>
                                <input type="submit" name="submit" class="btn" value="Sign in!">
                                <div class="error"><?php echo $login_error; ?></div>
                                <div style="text-align: center; "> <a href="register.php" style="color: blue;  text-decoration: underline;  text-align: center; 	cursor: pointer;"> Click to create a new account</a>
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