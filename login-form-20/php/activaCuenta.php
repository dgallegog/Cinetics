<?php

require_once('bddFunciones.php'); 
require_once('logsManager.php');
if($_SERVER["REQUEST_METHOD"] == "GET"){


    if(checkMailAccount(filter_input(INPUT_GET,'mail'),filter_input(INPUT_GET,'activationCode')))
    {
        logActivationOK(filter_input(INPUT_GET,'mail'));
        header('Location: ../index.php?error=50');
        exit;
    }
}


header('Location: ../index.php');


?>