<?php

    require("../php/bddFunciones.php");
    session_start();

    if(!isset($_SESSION["user"]))header('Location: ../index.php'); 
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        // Code 1 = insert de reaccion por primera vez con LIKE (vote=1)
        // Code 2 = insert de reaccion por primera vez con DISLIKE(vote=0)
        // Code 3 = update de reaccion cambiando DISLIKE por LIKE (set vote=1)
        // Code 4 = update de reaccion cambiando LIKE por DISLIKE (set vote=0)


    }
    
    
    header('Location: ../index.php');
    

?>