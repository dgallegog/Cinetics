<?php

function connectaDB(){
    //$cadenaConnexio = 'mysql:dbname=cinetics;host=localhost:3307'; // Conexion Gerard
    $cadenaConnexio = 'mysql:dbname=cinetics;host=localhost'; //Conexion Gallego
    $usuari = 'root';
    $passwd = '';
    try{
        $db = new PDO($cadenaConnexio, $usuari, $passwd, 
                        array(PDO::ATTR_PERSISTENT => true));
        return $db;
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
        return $e;
    }
}