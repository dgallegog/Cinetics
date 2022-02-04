<?php
require_once('conexionDB.php'); 


    if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $mail = filter_input(INPUT_GET,'mail');
    $resetCode = filter_input(INPUT_GET,'resetCode');

    $db = connectaDB();
    $sql = 'SELECT * FROM `users` WHERE `mail`=:mail AND `resetPassCode`=:resetCode';
    $codigoOK = $db->prepare($sql);
    $codigoOK->execute(array(':mail'=>$mail,':resetCode'=>$resetCode));
    $datos = $codigoOK->fetchAll();
    // TODO comprobar datos
    $expira = $datos[0]['resetPassExpiry'];

    
        $linies=$codigoOK->rowCount();
        // TODO aqui tenemos que verificar si el NOW() actual es igual o inferior al resetPassExpiry de la BD, y añadirlo al if
        if($linies>0&&date('YYYY-MM-DD hh:mm:ss')<$expira)
        {
            // TODO si entramos aqui tenemos que mostrar el formulario con contraseña y repetir contraseña para que el usuario ponga la nueva
            // TODO y actualizar la BD con el pass nuevo, el query de abajo hay que modificarlo
            // TODO para recoger la contraseña del form ( en caso que sean las mismas despues de que haya pulsado el boton)
            // TODO y meterla en la BBDD
            $sql = 'UPDATE `users` SET `resetPassCode`="" WHERE `mail`=:mail';
            $update = $db->prepare($sql);
            $update->execute(array(':mail'=>$mail));
            header('Location: ../login-form-20/index.php');
        }
    
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
		<div class="col-sm-4">
		    
		    <form method="POST"  onsubmit="return veripass()" action="x"  class="signin-form">
                <label>New Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control" name = "password"  id="pswd"placeholder="New Password"> 
                </div> 
                <label>Confirm Password</label>
                <div class="form-group pass_show"> 
                    <input type="password"  class="form-control" id="verifypswd" placeholder="Confirm Password"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3">Reset Password</button>
                </div> 
            </form>
		</div>  
	</div>
</div>
<script src="../login-form-20/js/resetpass.js"></script>
</html>