<?php
// Funcion vieja
function alertError($err){
    switch($err){
        case 0: $string="<script type=\"text/javascript\">var e =alert('Usuario registrado correctamente, activa tu cuenta en tu mail');</script>";break;
        case 1: $string="<script type=\"text/javascript\">var e =alert('El usuario y mail introducidos ya existen');</script>";break;
        case 2: $string="<script type=\"text/javascript\">var e =alert('El usuario introducido ya existe');</script>";break;
        case 3: $string="<script type=\"text/javascript\">var e =alert('El mail introducido ya existe');</script>";break;
        case 4: $string="<script type=\"text/javascript\">var e =alert('El password no mide 8 caracteres');</script>";break;
        case 5: $string="<script type=\"text/javascript\">var e =alert('Login incorrecto');</script>";break;
        case 50: $string="<script type=\"text/javascript\">var e =alert('Usuario verificado correctamente. Cuenta activada');</script>";break;
        case 90: $string="<script type=\"text/javascript\">var e =alert('Contraseña reseteada. Ya puedes loguear con tu nueva contraseña');</script>";break;
    }
    return $string;
}
// Funcion nueva
function controlError($err){
    $string='<p style="font-weight: bold;" class="text-center text-light ';
    if ($err>0&&$err<5) $string=$string.'bg-warning">';
    else if ($err>4&&$err<10) $string=$string.'bg-danger">';
    else $string=$string.'bg-success">';
    switch($err){
        // TODO valorar si de verdad queremos detallar tanto la informacion. No sería más seguro generalizar? Para no dar información de usuarios ya registrados.
        case 0: $string=$string.'Usuario registrado correctamente, activa tu cuenta en tu mail.';break;
        case 1: $string=$string.'El usuario y mail introducidos ya existen.';break;
        case 2: $string=$string.'El usuario introducido ya existe.';break;
        case 3: $string=$string.'El mail introducido ya existe.';break;
        case 4: $string=$string.'El password no mide 8 caracteres.';break;
        case 5: $string=$string.'Login incorrecto.';break;
        case 6: $string=$string.'Ese usuario y/o mail no existe/n.';break;
        case 7: $string=$string. 'Las contraseñas deben coincidir';break;
        case 50: $string=$string.'Usuario verificado correctamente. Cuenta activada.';break;
        case 90: $string=$string.'Contraseña reseteada. Ya puedes loguear con tu nueva contraseña.';break;
        case 91: $string=$string.'Te hemos mandado un mail para resetear tu contraseña.';break;
    }
    $string=$string."</p>";
    return $string;
}
?>