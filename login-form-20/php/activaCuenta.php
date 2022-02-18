<?php

require_once('bddFunciones.php'); 
require_once('logsManager.php');
if($_SERVER["REQUEST_METHOD"] == "GET"){


    if(checkMailAccount(filter_input(INPUT_GET,'mail'),filter_input(INPUT_GET,'activationCode')))
    {
        generateLog(filter_input(INPUT_GET,'mail'),5);
        header('Location: ../index.php?error=50');
        exit;
    }
}


header('Location: ../index.php');


?>