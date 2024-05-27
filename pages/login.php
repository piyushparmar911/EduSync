<?php
require ('../includes/init.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduSync</title>
      <link rel="shortcut icon" href="<?=urlOf("assets/img/logo1.png")?>">
      <!-- <link rel="stylesheet" href="<?=urlOf("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap")?>"> -->
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/bootstrap/css/bootstrap.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css/fontawesome.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css/all.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/css/style.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/simple-calendar/simple-calendar.css")?>">
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

                                <div class="form-group mb-3">
                                    <label class="text-muted" for="Name">Name</label>
                                    <input class="form-control" type="text" id="Name" placeholder="Enter your Name"
                                        autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="text-muted" for="password">Password</label>
                                    <input class="form-control" type="password" id="Password"
                                        placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-3">
                                    <button class="btn btn-primary btn-lg w-100" type="button" onclick="sendData()">Sign
                                        In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include pathOf('includes/script.php');
?>
<script>
    function sendData() {
        var data = {
            Name: $('#Name').val(),
            Password: $('#Password').val()
        }

        $.post('../api/login.php', data, function (response) {
            console.log(response);
            if (response.success !== true)
                return;

            window.location.href = '../index';
        });
    }
</script>
<?php
include pathOf('includes/pageEnd.php');
?>