<?php

function connectaDB(){
    $cadenaConnexio = 'mysql:dbname=cinetics;host=localhost:3307'; // Conexion Gerard
    $usuari = 'root'; // user Gerard
    $passwd = ''; // pass Gerard
    //$cadenaConnexio = 'mysql:dbname=cinetics;host=localhost'; //Conexion Gallego
    //$usuari = 'yudokusora'; // user Gallego
    //$passwd = 'iloveyou'; // pass Gallego
    try{
        $db = new PDO($cadenaConnexio, $usuari, $passwd, 
                        array(PDO::ATTR_PERSISTENT => true));
        return $db;
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
        return $e;
    }
}