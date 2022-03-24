<?php
require_once('bddFunciones.php'); 
require_once('logsManager.php');
require_once('errorControl.php');
require_once('sendMail.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mail = filter_input(INPUT_POST,'mail');
        $resetCode = filter_input(INPUT_POST,'passcode');
        $password = filter_input(INPUT_POST,'password');
        $verifypswd = filter_input(INPUT_POST,'verifypswd');
        if ($password==$verifypswd)
        {   
            $error=resetPassPost($resetCode,$password);
            if ($error==90)
            {
                generateLog($mail,7);
                sendMail($mail,'Password reseteado correctamente','<h1>Saludos. Le informamos de que su contraseña ha sido reseteada con éxito.</h1> '); 
                header('Location: ../index.php?error='.$error);
            }
            else {
                echo controlError(4);
            }   
        }
        else {
            echo controlError(7);
        }      

    }else if($_SERVER["REQUEST_METHOD"] == "GET"){

        $mail = filter_input(INPUT_GET,'mail');
        $resetCode = filter_input(INPUT_GET,'resetCode');
    
        $resetCode = resetPassGet($mail,$resetCode);
    }else
    {
        header('Location: ../index.php');
    }
?>

<html>


<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/resetpass.css" rel="stylesheet" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    
</head>
<!------ Include the above in your HEAD tag ---------->

<style> 
.center {
  margin: auto;
  width: 50%;
  
  padding: 10px;
}

</style>
<body class="align-content-center">
<div class="container center">
	<div class="">
		<div class="col-sm-8 center">
             <form method="POST"  onsubmit="return veripass()" action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="signin-form">
                <label >New Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control " name = "password"  id="pswd"placeholder="New Password"> 
                </div> 
                <label>Confirm Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control " name = "verifypswd" id="verifypswd" placeholder="Confirm Password"> 
                </div>

                
                    <input id="passcode" name="passcode" type="hidden" value=<?php echo($resetCode) ?>>
                    <input id="mail" name="mail" type="hidden" value=<?php echo($mail) ?>>
                

                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3 ">Reset Password</button>
                </div> 
            </form>
		</div>  
	</div>
</div>
</body>
<script src="../js/resetpass.js"></script>
</html>