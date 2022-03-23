<?php

    require("../php/bddFunciones.php");
    session_start();

    if(!isset($_SESSION["user"])){
        header('Location: ../index.php'); 
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        // Code 0 = El usuario ha reaccionado con la misma reaccion que ya tenía. Sólo le pasamos un nuevo video
        // Code 1 = insert de reaccion por primera vez con LIKE (vote=1)
        // Code 2 = insert de reaccion por primera vez con DISLIKE(vote=0)
        // Code 3 = update de reaccion cambiando DISLIKE por LIKE (set vote=1)
        // Code 4 = update de reaccion cambiando LIKE por DISLIKE (set vote=0)
        if ($_GET["code"]>0){
            reaccionaAvideo($_SESSION["user"],$_GET["idVideo"],$_GET["code"]);
        }
        header('Location: ./single.php?path='.obtenirVideoAleatori());
        exit;
    }
    
    
    header('Location: ./index.php');
    

?>