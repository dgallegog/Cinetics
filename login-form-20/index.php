<?php 
session_start();
if (isset($_SESSION["error"]))echo controlError($_SESSION["error"]);
$_SESSION = array();
session_destroy();
function controlError($err){
    switch($err){
        case 0: $string="<script type=\"text/javascript\">var e =alert('Usuario registrado correctamente, activa tu cuenta en tu mail');</script>";break;
        case 1: $string="<script type=\"text/javascript\">var e =alert('El usuario y mail introducidos ya existen');</script>";break;
        case 2: $string="<script type=\"text/javascript\">var e =alert('El usuario introducido ya existe');</script>";break;
        case 3: $string="<script type=\"text/javascript\">var e =alert('El mail introducido ya existe');</script>";break;
        case 4: $string="<script type=\"text/javascript\">var e =alert('El password no mide 8 caracteres');</script>";break;
        case 50: $string="<script type=\"text/javascript\">var e =alert('Usuario verificado correctamente. Cuenta activada');</script>";break;
        case 90: $string="<script type=\"text/javascript\">var e =alert('Contraseña reseteada. Ya puedes loguear con tu nueva contraseña');</script>";break;
    }
    return $string;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cinetics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="css/register.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/x-png" href="./images/favicon.png">
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Cinetics</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Have an account?</h3>
                        <form action="../php/userLogin.php" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff"><p class="w-100 text-center" data-toggle="modal" data-target="#forgotModal">Forgot Password</p></a>
                                    
                                </div>
                            </div>
                        </form>
                        <a href="#" style="color: #fff"><p class="w-100 text-center" data-toggle="modal" data-target="#registerModal">Register</p></a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper  p-5 font-poppins modal fade center" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="wrapper wrapper--w780 modal-dialog" role="document">
            <div class="card card-3 modal-content">
                <div class="card-heading modal-header border-0"></div>
                <div class="card-body">
                    <h2 class="title modal-title" id="registerModal">Registration Info</h2>
                    <form method="POST" onsubmit="return isValidForm()" action="../php/userSignup.php" class="modal-body">


                        <div class="input-group">
                            <input class="input--style-3" type="username" placeholder="Username" name="username">
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="email" id="email" placeholder="Email" name="email">
                        </div>


                        <div class="input-group">
                            <input class="input--style-3" type="name" placeholder="First name" name="firstname">
                        </div>


                        <div class="input-group">
                            <input class="input--style-3" type="name" placeholder="Last name" name="lastname">
                        </div>


                        <div class="input-group">
                            <input class="input--style-3" type="password" id="pswd" placeholder="Password" name="password">

                        </div>


                        <div class="input-group">
                            <input class="input--style-3" type="password" id="verifypsw" placeholder="Verify password" name="verypassword">

                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper  p-5 font-poppins modal fade center" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="wrapper wrapper--w780 modal-dialog" role="document">
            <div class="card card-3 modal-content">
                <div class="card-heading modal-header border-0"></div>
                <div class="card-body">
                    <h2 class="title modal-title" id="forgotModal">Forgort your Password Info</h2>
                    <form method="POST"  action="../php/resetPasswordSend.php" class="modal-body">


                        <div class="input-group">
                            <input class="input--style-3" type="username" placeholder="Username" name="username">
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="email" id="email2" placeholder="Email" name="email">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        <script src="js/verifyRegister.js	"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>


</body>

</html>