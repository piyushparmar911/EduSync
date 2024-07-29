    <?php
    require('../includes/init.php');
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $reset_token = bin2hex(random_bytes(16));
    // $email = $_POST["email"];
    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    function sendMail($email, $reset_token)
    {

        require("../PHPMailer/PHPMailer.php");
        require("../PHPMailer/Exception.php");
        require("../PHPMailer/SMTP.php");

        $email = $_POST["email"];
        $mail = new PHPMailer(true);
        //Create an instance; passing `true` enables exceptions

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'prparmar911@gmail.com';                     //SMTP username
            $mail->Password   = 'secrate';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('prparmar911@gmail.com', 'EduSync');
            $mail->addAddress($email);               //Name is optional



            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset link below here';
            $mail->Body    = "This is the HTML message body <b>Click The Link</b><br>
        <button type='button' class='btn btn-primary'>
        <a href='http://localhost/EduSync/pages/newpass.php?email=$email&token=$reset_token'>Reset Passwor</a>
        </button>";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    if (isset($_POST["submit"])) {

        $email = $_POST["email"];
        $sql = "SELECT * FROM  `users`  WHERE `email` = '$email'";
        $conn = mysqli_connect("localhost", "root", "", "eduSync");
        $result = mysqli_query($conn, $sql);

        if ($result) {

            if (mysqli_num_rows($result) == 1) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $sql_i = "UPDATE `users` SET `token` = '$reset_token' ,`resetToken`='$date' WHERE  `email`= '$_POST[email]'";

                if (mysqli_query($conn, $sql_i) && sendMail($email, $reset_token)) {
                    echo "<script> 
                        alert('Reset Password Link sent to your email');
                        window.location.href = './login.php';
                        </script>";
                } else {
                    echo "<script> 
                        alert('Error in sending Reset Password Link');
                         window.location.href = './login.php';
                    </script>";
                }
            } else {
                echo "<script> 
                        alert('email Not Found');
                         window.location.href = './login.php';
                    </script>";
            }
        } else {
            echo "<script> 
            alert('Error');
             window.location.href = './login.php';
            </script>";
        }
    }
    ?>

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
                        <div class="card-body">
                            <div class="log-header-area card p-4 mb-4 text-center">
                                <h5>Welcome Back !</h5>
                                <p class="mb-0">Sign in to continue.</p>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <form action="resetpassword.php" method="POST">

                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="email">email</label>
                                            <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" autofocus>
                                        </div>

                                        <div class="form-group mb-3">
                                            <button class="btn btn-primary btn-lg w-100" type="submit" name="submit" onclick="sendData()">Submit
                                        </button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
