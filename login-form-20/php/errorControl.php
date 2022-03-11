<?php
function controlError($err){
    $string='<p style="font-weight: bold;" class="text-center text-light ';
    if ($err>0&&$err<5) $string=$string.'bg-warning">';
    else if ($err>4&&$err<10) $string=$string.'bg-danger">';
    else $string=$string.'bg-success">';
    switch($err){
        case 0: $string=$string.'Usuario registrado correctamente, activa tu cuenta en tu mail.';break;
        case 1: $string=$string.'El usuario y mail introducidos ya existen.';break;
        case 2: $string=$string.'El usuario introducido ya existe.';break;
        case 3: $string=$string.'El mail introducido ya existe.';break;
        case 4: $string=$string.'El password no mide 8 caracteres.';break;
        case 5: $string=$string.'Login incorrecto.';break;
        case 6: $string=$string.'Ese usuario y/o mail no existe/n.';break;
        case 7: $string=$string. 'Las contraseñas deben coincidir';break;
        case 8: $string=$string. 'La cuenta no está activa, revisa tu mail';break;
        case 50: $string=$string.'Usuario verificado correctamente. Cuenta activada.';break;
        case 90: $string=$string.'Contraseña reseteada. Ya puedes loguear con tu nueva contraseña.';break;
        case 91: $string=$string.'Te hemos mandado un mail para resetear tu contraseña.';break;
    }
    $string=$string."</p>";
    return $string;
}
?>