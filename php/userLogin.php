<?php

require_once('checkLogin.php'); 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['user']) && isset($_POST['password']))
    {
        if(loginOK(filter_input(INPUT_POST,'user'),filter_input(INPUT_POST,'password')))
        {
            session_start();
            setcookie('user',$_POST['user']);
            setcookie('password',$_POST['password']);
            
            header('Location: ./mainpage.php');
        }
        else header('Location: ../login-form-20/index.html');
    }

    
}

