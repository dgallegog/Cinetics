<?php

require_once('bddFunciones.php'); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['user']) && isset($_POST['password']))
    {
        if(loginOK(filter_input(INPUT_POST,'user'),filter_input(INPUT_POST,'password')))
        {
            updateLastSignIn(filter_input(INPUT_POST,'user'));
            session_start();
            $_SESSION["user"] = $_POST['user'];
            header('Location: ../mainpage/index.php');
            exit;
        } 
    }    
}
header('Location: ../index.php?error=5');
