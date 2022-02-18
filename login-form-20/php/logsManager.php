<?php
function logLogin($user,$ok) {
    $log_filename = "../logs/login/KO";
    if ($ok) $log_filename = "../logs/login/OK";
    $log_msg="[".date('H:i:s')."] Usuario: ".$user;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logLogout($user) {
    $log_filename = "../logs/logout";
    $log_msg="[".date('H:i:s')."] Usuario: ".$user;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logSignUp($user) {
    $log_filename = "../logs/signUp";
    $log_msg="[".date('H:i:s')."] Usuario: ".$user;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logActivationSend($email,$string) {
    $log_filename = "../logs/activation/send";
    $log_msg="[".date('H:i:s')."] Email: ".$email;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logActivationOK($email) {
    $log_filename = "../logs/activation/OK";
    $log_msg="[".date('H:i:s')."] Email: ".$email;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logResetSend($email) {
    $log_filename = "../logs/pwdReset/send";
    $log_msg="[".date('H:i:s')."] Email: ".$email;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
function logResetOK($email) {
    $log_filename = "../logs/pwdReset/OK";
    $log_msg="[".date('H:i:s')."] Email: ".$email;
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}


?>