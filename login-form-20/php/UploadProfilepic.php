<?php
require_once('logsManager.php');

require_once('bddFunciones.php');



session_start();
$allowedExts = array("jpg","png");
$extension = pathinfo($_FILES['ProfilePic']['name'], PATHINFO_EXTENSION);
$infoCode = "";
$errorCode=0;
$newuser = $_POST["Username"];
$newBio = $_POST["Biography"];
if (in_array($extension, $allowedExts))
{

    $nombreArchivo = generarNombre($_SESSION["user"]);
       
    move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],
    "../imgPerfil/" . $nombreArchivo.".".$extension);
    $path="../imgPerfil/".$nombreArchivo.".".$extension;
    $infoCode= "Stored in: " . $path;

    insertarImagen($_SESSION["user"],$path);
}

if($newuser!="")
{

}

if($newBio!="")
{
    
}
header('Location: ../mainpage/index.php');


?>