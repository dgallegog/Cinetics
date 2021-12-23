<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']))
    {
        registerOk(filter_input(INPUT_POST,'username'),filter_input(INPUT_POST,'password'),filter_input(INPUT_POST,'firstname'),filter_input(INPUT_POST,'lastname'),filter_input(INPUT_POST,'email'));
    }

}
header('Location: ../login-form-20/index.html');


function registerOk ($user,$pwd,$firstname,$lastname,$email)
{
    require_once('conexionDB.php'); 
   
    $pwd = password_hash($pwd,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`(mail, username, passHash, userFirstName, userLastName) VALUES ('$email','$user','$pwd','$firstname','$lastname')";
    $insert = $db->query($sql);
  
}
