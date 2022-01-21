<?php
use PHPMailer\PHPMailer\PHPMailer;
function sendMail ($activationCode,$destinatario)
{  
    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    
    //Credencials del compte GMAIL
    $mail->Username = 'cinetics.noreply@gmail.com';
    $mail->Password = 'cineticsdager';

    //Dades del correu electrònic
    $mail->SetFrom('cinetics.noreply@gmail.com','Cinetics');
    $mail->Subject = 'Activa tu cuenta ahora!!!!!';
    $mail->MsgHTML('<h1>Activa tu cuenta clicando <a href="http://localhost/Cinetics-master/php/mailCheckAccount.php?activationCode='.$activationCode.'&mail='.$destinatario.'">aqui!</a></h1> ');
    //$mail->addAttachment("fitxer.pdf");
    
    //Destinatari
    
    $mail->AddAddress($destinatario, 'Destinatario');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }else{
        echo "Correu enviat";
    }
}
   
