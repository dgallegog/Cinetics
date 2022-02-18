<?php
require_once('logsManager.php');
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
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    //TODO asignar al video un path basado en user+fecha
    //TODO subir a la bdd titulo,hashtags,descripcion, path.
    //TODO al hacer el insert de lo de arriba nos dará una id de video. utilizemos esa id para guardar el video

    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
        $infoCode= $_FILES["file"]["name"] . " already exists. ";
        $errorCode=1;
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
      $infoCode= "Stored in: " . "../upload/" . $_FILES["file"]["name"];
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