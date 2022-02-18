<?php
require_once('bddFunciones.php');

function videoUpload($path,$description,$username){
    //TODO 1. sacar idUser a partir de username
    $idUser=getIduser($username);
    //TODO 2. insertar video y recoger idVideo
    $idVideo=insertarVideo($username,$path,$description);
    //TODO 3. insertar hashtags SI SON nuevos
    //TODO 4. vincular hashtags con videos a partir de las ids
}
/*`idVideo` INT AUTO_INCREMENT NOT NULL,
`likes` INT UNSIGNED DEFAULT 0,
`dislikes` INT UNSIGNED DEFAULT 0,
`path` VARCHAR(300) NOT NULL,
`description` VARCHAR(300) NOT NULL,
`uploadDate` DATETIME DEFAULT NOW(),
`usersIduser` INT, */
?>