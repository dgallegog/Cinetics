<?php
use PHPMailer\PHPMailer\PHPMailer;
function sendMail ($destinatario,$subject,$mensaje)
{  
    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'the smtp ej(smtp.gmail.com)';
    $mail->Port = 587;
    
    //Credencials del compte GMAIL
    $mail->Username = 'your mail';
    $mail->Password = 'your pass';

    //Dades del correu electrònic
    $mail->SetFrom('your mail','Cinetics');
    $mail->Subject = $subject;
    $mail->MsgHTML($mensaje);
    //$mail->addAttachment("fitxer.pdf");
    
    //Destinatari
    
    $mail->AddAddress($destinatario, 'Destinatario');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }
}
   
