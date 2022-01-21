<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    
    //Credencials del compte GMAIL
    $mail->Username = 'gerard.fernandezm@educem.net';
    $mail->Password = 'pass';

    //Dades del correu electrònic
    $mail->SetFrom('fulanito@gmail.com','Yo mismo');
    $mail->Subject = 'Prueba de spam';
    $mail->MsgHTML('Prova');
    //$mail->addAttachment("fitxer.pdf");
    
    //Destinatari
    $address = 'destinatario@gmail.com';
    $mail->AddAddress($address, 'Test');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }else{
        echo "Correu enviat";
    }
