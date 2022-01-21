<?php
require_once('conexionDB.php'); 
require_once('sendMail.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']))
    {
        $errCode=comprobarExistentes(filter_input(INPUT_POST,'username'),filter_input(INPUT_POST,'email'));
        if(!$errCode) 
        {
            registerOk(filter_input(INPUT_POST,'username'),filter_input(INPUT_POST,'password'),filter_input(INPUT_POST,'firstname'),filter_input(INPUT_POST,'lastname'),filter_input(INPUT_POST,'email'));
            
        }
       
    }

}
header('Location: ../login-form-20/index.php');


function registerOk ($user,$pwd,$firstname,$lastname,$email)
{
    $db=connectaDB();
    $pwd = password_hash($pwd,PASSWORD_DEFAULT);
    $activationCode = hash('sha256','El codi per activar es'.random_int(1,999));
    $sql = "INSERT INTO `users` (`mail`, `username`, `passHash`, `userFirstName`, `userLastName`,`activationCode`) VALUES (:mail,:user,:pwd,:firstname,:lastname,:activationcode)";  
        $insert=$db->prepare($sql);
        $insert->execute(array(':mail'=>$email,':user'=>$user,':pwd'=>$pwd,':firstname'=>$firstname,':lastname'=>$lastname, ':activationcode'=>$activationCode));
        
    if($insert)
    {
        sendMail($activationCode,$email);
        header('Location: ../index.php');
    }
  
}
function comprobarExistentes($user,$email){

    $db=connectaDB();
    $sqlUsuari='SELECT `username` FROM `users` WHERE `username`= ?';
    $sqlMail='SELECT `mail` FROM `users` WHERE `mail`= ?';
    $preparadaUsuari=$db->prepare($sqlUsuari);
    $preparadaUsuari->execute(array($user));
    $usuariRepetits=$preparadaUsuari->rowCount();
    $preparadaMail=$db->prepare($sqlMail);
    $preparadaMail->execute(array($email));
    $emailRepetits=$preparadaMail->rowCount();
    $error=0; // Cap repetit

    if($usuariRepetits&&$emailRepetits)$error=1; //Ambos Repetidos
    elseif($usuariRepetits)$error=2; //user Repetidos
    elseif($emailRepetits) $error=3; // Mail repetido

    session_start();
    $_SESSION["error"] = $error;
    

    return $error;
}