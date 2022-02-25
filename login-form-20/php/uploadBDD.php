<?php
require_once('logsManager.php');
require_once('videoManager.php');


function montarHastags($hashtag)
{

  $hashtagArray = explode("#",trim($hashtag));
  array_shift($hashtagArray);  
  return $hashtagArray;

}
session_start();
$allowedExts = array("mp4");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$infoCode = "";
$errorCode=0;
if (($_FILES["file"]["type"] == "video/mp4")
&& ($_FILES["file"]["size"] < 10000000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
        $infoCode= "Return Code: " . $_FILES["file"]["error"] . "<br />";
        $errorCode=1;
    }
  else
    {

    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
        
        $infoCode= $_FILES["file"]["name"] . " already exists. ";
        $errorCode=1;
      }
    else
      {
        $hashtags = montarHastags($_POST["Hashtags"]);
        $nombreArchivo = generarNombre($_SESSION["user"]);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $nombreArchivo);
      $path="../upload/".$nombreArchivo;
      $infoCode= "Stored in: " . $path;
      
      $description=$_POST["description"];
      insertarVideo($_SESSION["user"],$path,$description,$hashtags);
      header('Location','../mainpage/index.php?path='.$path);
      }
    } 
  }
else
  {
    $infoCode =  "Invalid file";
  $errorCode=1;
  }
  generateVideoLog($_SESSION["user"],$errorCode,$infoCode);


?>