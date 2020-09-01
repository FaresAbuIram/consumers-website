<?php
include('auth/auth.php');
include('database/db.php');
$user_id = $_SESSION['user_id'];
if (isset($_POST['update_email'])) {
    $update_email = $_POST['email'];
    $newEmail = "UPDATE users SET email = '$update_email' WHERE _id = $user_id";
    $result = mysqli_query($connect, $newEmail);
}
if (isset($_POST['update_password'])) {
    $newPassword = $_POST['new_password'];
    $newPass = "UPDATE users SET password = '$newPassword' WHERE _id = $user_id";
    $result = mysqli_query($connect, $newPass);
}
if (isset($_POST['update_name'])) {
    $newName = $_POST['user_name'];
    $newNam = "UPDATE users SET name = '$newName' WHERE _id = $user_id";
    $result = mysqli_query($connect, $newNam);
}

$all_user = 'SELECT * FROM users ';
$result = mysqli_query($connect, $all_user);
$users = mysqli_fetch_all($result);
$email = '';
$password = '';
$userName = '';
$emails = '';
foreach ($users as $user) {
    if ($user[0] == $user_id) {
        $email = $user[1];
        $password = $user[2];
        $userName = $user[3];
        break;
    }
};
foreach ($users as $user) {
    $emails = $emails . '@@' . $user[1];
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/profile.css">

    <title>Profile</title>
</head>

<body>
    <div class="root flex-container column">
        <div class="navbar-container">
        </div>
        <div class="main-content flex-container">
            <div><?php include 'templates/navside.php'; ?></div>
            <div class="profile flex-container column  align-center ">
                <div class="background-image">
                    <img class="up-image" src="https://i.pinimg.com/originals/67/10/cd/6710cdb7d1bad384291c6ac63a0c9b84.jpg">
                </div>
                <div class="up-side  flex-container  align-center center ">
                    <img src="http://www.eurogeosurveys.org/wp-content/uploads/2014/02/default_profile_pic.jpg" class="  rounded-circle" alt="Cinque Terre" width="150" height="150">
                </div>
                <div class="  down-side flex-container column   ">
                    <div class="name flex-container row  center ">
                        <div class="padding_prof"><?php echo $userName ?></div>
                        <button class="fab-button edit small mr-rm-10 " data-toggle="modal" data-target="#update_name" onclick=" ">
                            <i class="fas fa-edit "></i>
                        </button>
                    </div>
                    <div class="name flex-container row  center ">
                        <div class="padding_prof"><?php echo $email ?></div>
                        <button class="fab-button edit small mr-rm-10 " data-toggle="modal" data-target="#update_email" onclick=" ">
                            <i class="fas fa-edit "></i>
                        </button>
                    </div>
                    <div class="name flex-container row  center ">
                        <div class="padding_prof">Edit Password</div>
                        <button class="fab-button edit small mr-rm-10 " data-toggle="modal" data-target="#update_password">
                            <i class="fas fa-edit "></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include('modal/edit_profile.php') ?>
    <?php include('modal/edit_password.php') ?>
    <?php include('modal/edit_name.php') ?>



    <script>
        $(document).ready(function() {
            $('#update_email').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    email: {
                        validators: {
                            callback: {
                                message: 'This email is used <br />',
                                callback: function(value, validator, $field) {
                                    let emails = document.getElementById('emails').value;
                                    let s = emails.split("@@");
                                    for (let i = 1; i < s.length; i++) {
                                        if (value == s[i])
                                            return false;
                                    }
                                    return true;

                                }
                            },
                            notEmpty: {
                                message: 'This Field is Required <br />'

                            },
                            emailAddress: {
                                message: 'Please Enter a valid email e.g someone@A.BB \<br />'
                            }

                        }
                    }
                },
            });
            $('#update_password').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    old_password: {
                        validators: {
                            callback: {
                                message: 'The Password is wrong <br />',
                                callback: function(value, validator, $field) {
                                    if (value != '')
                                        return value == '<?php echo $password ?>'
                                    return true
                                }
                            },
                            notEmpty: {
                                message: 'This Field is Required <br />'

                            }

                        }
                    },
                    new_password: {
                        validators: {
                            notEmpty: {
                                message: 'This Field is Required <br />'

                            }

                        }
                    },
                    re_new_password: {
                        validators: {
                            callback: {
                                message: 'The Password Does not match <br />',
                                callback: function(value, validator, $field) {
                                    let _new = document.getElementById('new_password').value;
                                    return value == _new;
                                }
                            },
                            notEmpty: {
                                message: 'This Field is Required <br />'

                            }

                        }
                    }

                },
            }),
            $('#update_name').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_name: {
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
</body>

</html>