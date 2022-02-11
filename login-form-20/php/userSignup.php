<?php
require_once('bddFunciones.php');
require_once('sendMail.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']))
    {
        $email=filter_input(INPUT_POST,'email');
        $username = filter_input(INPUT_POST,'username');
        $errCode=comprobarExistentes($username ,$email);
        if(!$errCode) 
        {
            
            $activationCode = hash('sha256','El codi per activar es'.random_int(1,999));
            $insert = registerOk($username,filter_input(INPUT_POST,'password'),filter_input(INPUT_POST,'firstname'),filter_input(INPUT_POST,'lastname'),$email,$activationCode);   
            if($insert)
            {
                
                sendMail($email,'Activa tu cuenta ahora!!!!!','<h1>Activa tu cuenta clicando <a href="http://localhost/Cinetics-master/login-form-20/php/activaCuenta.php?activationCode='.$activationCode.'&mail='.$email.'">aqui!</a></h1> ');
                
            }       
        }        
        header('Location: ../index.php?error='.$errCode);
    }
}
header('Location: ../index.php');



