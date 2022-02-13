<?php
require_once('bddFunciones.php');
require_once('logsManager.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['user']) && isset($_POST['password']))
    {
        if(loginOK(filter_input(INPUT_POST,'user'),filter_input(INPUT_POST,'password')))
        {
            logLoginOK(filter_input(INPUT_POST,'user'));
            updateLastSignIn(filter_input(INPUT_POST,'user'));
            session_start();
            $_SESSION["user"] = $_POST['user'];
            header('Location: ../mainpage/index.php');
            exit;
        }
        else {
            logLoginKO(filter_input(INPUT_POST,'user'));
        }
    }    
}
header('Location: ../index.php?error=5');






