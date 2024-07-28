<?php
require('../includes/init.php');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduSync</title>
    <link rel="shortcut icon" href="<?= urlOf("assets/img/logo1.png") ?>">
    <!-- <link rel="stylesheet" href="<?= urlOf("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap") ?>"> -->
    <link rel="stylesheet" href="<?= urlOf("assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= urlOf("assets/plugins/fontawesome/css/fontawesome.min.css") ?>">
    <link rel="stylesheet" href="<?= urlOf("assets/plugins/fontawesome/css/all.min.css") ?>">
    <link rel="stylesheet" href="<?= urlOf("assets/plugins/fontawesome/css") ?>">
    <link rel="stylesheet" href="<?= urlOf("assets/css/style.css") ?>">
    <link rel="stylesheet" href="<?= urlOf("assets/plugins/simple-calendar/simple-calendar.css") ?>">
</head>
<div class="main-content- h-100vh">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-sm-10 col-md-7 col-lg-5">
                <!-- Middle Box -->
                <div class="middle-box">




                    <?php
                    if (isset($_GET['email']) && isset($_GET['token'])) {
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('Y-m-d');
                        $sql = "SELECT * FROM users WHERE email='$_GET[email]' AND token='$_GET[token]' AND resetToken='$date'";
                        $conn = mysqli_connect("localhost", "root", "", "eduSync");
                        $result = mysqli_query($conn, $sql);
                        if ($result) {

                            if (mysqli_num_rows($result) == 1) {
                    ?>
                                <div class="middle-box">
                                    <div class="card-body">
                                        <div class="log-header-area card p-4 mb-4 text-center">
                                            <h5>Welcome Back !</h5>
                                            <p class="mb-0">Sign in to continue.</p>
                                        </div>

                                        <div class="card">
                                            <div class="card-body p-4">

                                                <form method="POST" action="newpass.php">
                                                    <div class="from-group mb-3">

                                                        <input class="text-muted" type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                                                        <input class="form-control" type="password" name="password" placeholder="enter new password" required>
                                                    </div>


                                                    <div class="form-group mb-3">
                                                        <button class="btn btn-primary btn-lg w-100" type="submit" name="reset_update">Submit
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    <?php
                            } else {
                                echo "<script>
                            alert('Invalid Or Expired Link');
                            window.location.href = '/login.php';
                            </script>";
                            }
                        } else {
                            echo "<script>
                        alert('Error');
                        window.location.href = '/login.php';
                        </script>";
                        }
                    }

                    ?>

                </div>

                <?php

                if (isset($_POST['reset_update'])) {
                    $pass = $_POST['password'];
                    $update = "UPDATE users SET password='$pass',token=NULL,resetToken=NULL WHERE email='$_POST[email]'";
                    $conn = mysqli_connect("localhost", "root", "", "eduSync");
                    $result = mysqli_query($conn, $update);
                    if ($result) {
                        echo "<script>
                    alert('Updated Successfully');
                    window.location.href = '../index.php';
                    </script>";
                    } else {
                        echo "<script>
                        alert('Error.......');
                        </script>";
                    }
                }

                ?>
            </div>
        </div>
        </body>

</html>