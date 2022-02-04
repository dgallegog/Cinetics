<?php
require_once('conexionDB.php'); 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $resetPassCode = $_SESSION['passcode'];
        $db = connectaDB();

        if(strlen($_POST['password'])>7)
        {

        
        $newPass =password_hash(filter_input(INPUT_POST,'password'),PASSWORD_DEFAULT) ;
        $sql = 'UPDATE `users` SET `resetPassCode`="",`passHash`= :pass WHERE `resetPassCode`=:resetCode';
        $update = $db->prepare($sql);
        $update->execute(array(':pass'=>$newPass,':resetCode'=>$resetPassCode));
        session_start();
        $_SESSION["error"] = 90;
        
        }else
        {
            $_SESSION["error"] = 4;
        }
        header('Location: ../login-form-20/index.php');
    }
    else if($_SERVER["REQUEST_METHOD"] == "GET"){
    
        $mail = filter_input(INPUT_GET,'mail');
        $resetCode = filter_input(INPUT_GET,'resetCode');

        $db = connectaDB();
        $sql = 'SELECT * FROM `users` WHERE `mail`=:mail AND `resetPassCode`=:resetCode';
        $codigoOK = $db->prepare($sql);
        $codigoOK->execute(array(':mail'=>$mail,':resetCode'=>$resetCode));
        $datos = $codigoOK->fetchAll();

        if (isset($datos[0]['resetPassExpiry']))
        {
            $expira = $datos[0]['resetPassExpiry'];
        } 
            $linies=$codigoOK->rowCount();
          
            if($linies>0&&date("Y-m-d H:i:s")<$expira)
            {                
                $_SESSION['passcode'] = $resetCode;       
            }
        
    }else
    {
        header('Location: ../login-form-20/index.php');
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
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3 ">Reset Password</button>
                </div> 
            </form>
		</div>  
	</div>
</div>
<script src="../login-form-20/js/resetpass.js"></script>
</html>