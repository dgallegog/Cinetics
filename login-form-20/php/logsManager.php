<?php
function generateLog($userOrmail,$code){
    switch($code){
        case 0: {$log_filename = "../logs/login/OK"; break;}
        case 1: {$log_filename = "../logs/login/KO"; break;}
        case 2: {$log_filename = "../logs/logout"; break;}
        case 3: {$log_filename = "../logs/signUp"; break;}
        case 4: {$log_filename = "../logs/activation/send"; break;}
        case 5: {$log_filename = "../logs/activation/OK"; break;}
        case 6: {$log_filename = "../logs/pwdReset/send"; break;}
        case 7: {$log_filename = "../logs/pwdReset/OK"; break;}
        case 8: {$log_filename = "../logs/login/nonActive"; break;}
    }
    $log_msg="[".date('H:i:s')."] Usuario/Mail: ".$userOrmail;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}


function generateVideoLog($userOrmail,$code, $mensaje)
{
    switch($code){
        case 0: {$log_filename = "../logs/video/success"; break;}
        case 1: {$log_filename = "../logs/video/error"; break;}
    }

    $log_msg="[".date('H:i:s')."] Usuario/Mail: ".$userOrmail." (".$mensaje.")";
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
?>