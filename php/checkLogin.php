<?php
require_once('conexionDB.php');
function loginOK ($user,$pwd)
{
     
    $okloguejat=FALSE;
    $db = connectaDB();
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
}?>