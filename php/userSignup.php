<?php
require_once('conexionDB.php'); 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']))
    {
        $errCode=comprobarExistentes(filter_input(INPUT_POST,'username'),filter_input(INPUT_POST,'email'));
        if(!$errCodde) registerOk(filter_input(INPUT_POST,'username'),filter_input(INPUT_POST,'password'),filter_input(INPUT_POST,'firstname'),filter_input(INPUT_POST,'lastname'),filter_input(INPUT_POST,'email'));
       
    }

}
header('Location: ../login-form-20/index.php');


function registerOk ($user,$pwd,$firstname,$lastname,$email)
{
    $db=connectaDB();
    $pwd = password_hash($pwd,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`mail`, `username`, `passHash`, `userFirstName`, `userLastName`) VALUES (:mail,:user,:pwd,:firstname,:lastname)";
  
        $insert=$db->prepare($sql);
        $insert->execute(array(':mail'=>$email,':user'=>$user,':pwd'=>$pwd,':firstname'=>$firstname,':lastname'=>$lastname));

    if($insert)header('Location: ../index.php');
  
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