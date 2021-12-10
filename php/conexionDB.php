<?php
    //$cadena_connexio = 'mysql:dbname=cinetics;host=localhost:3307'; // Conexion Gerard
    $cadena_connexio = 'mysql:dbname=cinetics;host=localhost'; //Conexion Gallego
    $usuari = 'root';
    $passwd = '';
    try{
        $db = new PDO($cadena_connexio, $usuari, $passwd, 
                        array(PDO::ATTR_PERSISTENT => true));
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
    }