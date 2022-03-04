<?php
    require_once('bddFunciones.php'); 
    require_once('sendMail.php');
    require_once('logsManager.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = "";
        $username = "";
        if(isset($_POST['username']) )$username = filter_input(INPUT_POST,'username');
        if(isset($_POST['email']))$email = filter_input(INPUT_POST,'email');


        $db = connectaDB();
        $sqlUsuari='SELECT `mail` FROM `users` WHERE `username`= :username';
        $preparadaUsuari=$db->prepare($sqlUsuari);
        $preparadaUsuari->execute(array(':username'=>$username));


        if($preparadaUsuari->rowCount()>0){
            $posibleMail = $preparadaUsuari->fetchAll();
            $email = $posibleMail[0]['mail'];
        }

        $resetCode = hash('sha256','El codi per resetear es'.random_int(1,999));
        $sql = 'UPDATE  `users` set `resetPassExpiry` = NOW()+ INTERVAL 30 MINUTE,`resetPassCode`=:resetCode WHERE `mail`=:email';
        $update = $db->prepare($sql);
        $update->execute(array(':resetCode'=>$resetCode,':email'=>$email));


        if($update->rowCount()>0)
        {
            sendMail($email,"Resetea tu password en Cinetics",'<h1>Resetea tu password pulsando <a href="http://localhost/php/resetPassword.php?resetCode='.$resetCode.'&mail='.$email.'">aqui.</a></h1> ');
            generateLog($email,6);
            header('Location: ../index.php?error=91');
        }
        else {
            header('Location: ../index.php?error=6');
        }

    }