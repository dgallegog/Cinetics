<?php
require_once('bddFunciones.php'); 
require_once('errorControl.php');
   
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
        $resetCode = filter_input(INPUT_POST,'passcode');
        $password = filter_input(INPUT_POST,'password');
        $error=resetPassPost($resetCode,$password);
        if ($error==90)
        {
            header('Location: ../index.php?error='.$error);
        }
        else {
            echo controlError(4);
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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../login-form-20/css/resetpass.css">
    
</head>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
		<div class="col-sm-4 center">
		    
		    <form method="POST"  onsubmit="return veripass()" action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="signin-form">
                <label >New Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control " name = "password"  id="pswd"placeholder="New Password"> 
                </div> 
                <label>Confirm Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control " id="verifypswd" placeholder="Confirm Password"> 
                </div>

                
                    <input id="passcode" name="passcode" type="hidden" value=<?php echo($resetCode) ?>>
                

                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3 ">Reset Password</button>
                </div> 
            </form>
		</div>  
	</div>
</div>
<script src="../login-form-20/js/resetpass.js"></script>
</html>