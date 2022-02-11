<?php
require_once('conexionDB.php'); 

    function checkMailAccount()
    {

        
        if($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $mail = filter_input(INPUT_GET,'mail');
        $activationCode = filter_input(INPUT_GET,'activationCode');

        $db = connectaDB();
        $sql = 'SELECT * FROM `users` WHERE `mail`=:mail AND `activationCode`=:activationCode';
        $codigoOK = $db->prepare($sql);
        $codigoOK->execute(array(':mail'=>$mail,':activationCode'=>$activationCode));
        
            $linies=$codigoOK->rowCount();
            if($linies>0)
            {
                $sql = 'UPDATE `users` SET `activationCode`="", `active`=1, `activationDate`= now() WHERE `mail`=:mail';
                $update = $db->prepare($sql);
                $update->execute(array(':mail'=>$mail));
                header('Location: ../index.php?error=50');
            }
        
    }
}
?>