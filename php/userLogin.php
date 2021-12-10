<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['user']) && isset($_POST['password']))
    {
        loginOK(filter_input(INPUT_POST,'user'),filter_input(INPUT_POST,'password'));
    }
}

function loginOK ($user,$pwd)
{
    require_once('conexionDB.php'); 
    $okloguejat=FALSE;
    
    $sql = 'SELECT username, passHash FROM `users` WHERE username= ?';
    $usuaris = $db->prepare($sql);
    $usuaris->execute(array($user));
    if($usuaris){
        $linies=$usuaris->rowCount();

        if ($linies>0){
            foreach ($usuaris as $fila) {
            
           
                if(password_verify($pwd,$fila['passHash']))$okloguejat=TRUE;
    
            }
            
        }    
    }
    return $okloguejat;
}