<?php 
    require_once('checkLogin.php'); 
    session_start();
   
    
    



?>




<!doctype html>
<html lang="en">

<head>
    <title>Cinetics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../login-form-20/css/style.css">
    <link href="../login-form-20/css/register.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/x-png" href="../login-form-20/images/favicon.png">
</head>

<body class="img js-fullheight" style="background-image: url(../login-form-20/images/bg.jpg);">


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Welcome <?php  print_r($_SESSION['user']) ?> to Cinetics</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        
    
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3"onClick="document.location.href='./logOut.php'">Log out</button>
                            </div>
  

                    </div>
                </div>
            </div>
        </div>
    </section>

  


       

        <script src="../login-form-20/js/jquery.min.js"></script>
        <script src="../login-form-20/js/popper.js"></script>
        <script src="../login-form-20/js/bootstrap.min.js"></script>
        <script src="../login-form-20/js/main.js"></script>

        <!-- Jquery JS-->
        <script src="../login-form-20/vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="../login-form-20/vendor/select2/select2.min.js"></script>
        <script src="../login-form-20/vendor/datepicker/moment.min.js"></script>
        <script src="../login-form-20/vendor/datepicker/daterangepicker.js"></script>
        <script src="../login-form-20/js/verifyRegister.js	"></script>

        <!-- Main JS-->
        <script src="../login-form-20/js/global.js"></script>


</body>

</html>