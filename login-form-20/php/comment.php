<?php

require_once("./bddFunciones.php");
session_start();
if (isset($_POST["comment"]) && isset($_POST["vidId"]))
{
   
    bbdComentario($_SESSION["user"],$_POST["comment"],$_POST["vidId"]);
}

header('Location: ../mainpage/single.php?path='.$_POST["hiddenPath"]);
?>