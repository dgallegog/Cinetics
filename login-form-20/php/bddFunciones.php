<?php


function connectaDB(){
    //$cadenaConnexio = 'mysql:dbname=cinetics;host=localhost:3307'; // Conexion Gerard
    $usuari = 'root'; // user Gerard
    $passwd = ''; // pass Gerard
    $cadenaConnexio = 'mysql:dbname=cinetics;host=localhost'; //Conexion Gallego
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


function loginOK ($user,$pwd)
{
    
    $okloguejat=FALSE;
    $db = connectaDB();
    $sql = 'SELECT username, passHash FROM `users` WHERE username= ?';
    $usuaris = $db->prepare($sql);
    $usuaris->execute(array($user));
    if($usuaris){
        $linies=$usuaris->rowCount();

        if ($linies>0){
            foreach ($usuaris as $fila) {      
                if(password_verify($pwd,$fila['passHash']))$okloguejat=TRUE;
            }       
        }    
    }
    return $okloguejat;
}


function checkMailAccount($mail, $activationCode)
{

   

    $db = connectaDB();
    $sql = 'SELECT * FROM `users` WHERE `mail`=:mail AND `activationCode`=:activationCode';
    $codigoOK = $db->prepare($sql);
    $codigoOK->execute(array(':mail'=>$mail,':activationCode'=>$activationCode));
    
        $linies=$codigoOK->rowCount();
        if($linies>0)
        {
            $sql = 'UPDATE `users` SET `activationCode`="", `active`=1, `activationDate`= now() WHERE `mail`=:mail';
            $update = $db->prepare($sql);
            $update->execute(array(':mail'=>$mail));
            return 1; // return true
            
        }
    
        return 0; // return false
}

function registerOk ($user,$pwd,$firstname,$lastname,$email,$activationCode)
{
    $db=connectaDB();
    $pwd = password_hash($pwd,PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO `users` (`mail`, `username`, `passHash`, `userFirstName`, `userLastName`,`activationCode`) VALUES (:mail,:user,:pwd,:firstname,:lastname,:activationcode)";  
        $insert=$db->prepare($sql);
        $insert->execute(array(':mail'=>$email,':user'=>$user,':pwd'=>$pwd,':firstname'=>$firstname,':lastname'=>$lastname, ':activationcode'=>$activationCode));


        return $insert;
  
}
function updateLastSignIn ($user)
{
    $db=connectaDB();   
    $sql = 'UPDATE `users` SET `lastSignIn`=NOW() WHERE `username`=:user';
    $update = $db->prepare($sql);
    $update->execute(array(':user'=>$user));

  
}

function comprobarExistentes($user,$email){

    $db=connectaDB();
    $sqlUsuari='SELECT `username` FROM `users` WHERE `username`= ?';
    $sqlMail='SELECT `mail` FROM `users` WHERE `mail`= ?';
    $preparadaUsuari=$db->prepare($sqlUsuari);
    $preparadaUsuari->execute(array($user));
    $usuariRepetits=$preparadaUsuari->rowCount();
    $preparadaMail=$db->prepare($sqlMail);
    $preparadaMail->execute(array($email));
    $emailRepetits=$preparadaMail->rowCount();
    $error=0; // Cap repetit

    if($usuariRepetits&&$emailRepetits)$error=1; //Ambos Repetidos
    elseif($usuariRepetits)$error=2; //user Repetidos
    elseif($emailRepetits) $error=3; // Mail repetido
    
    

    return $error;
}

function resetPassPost($resetPassCode,$password)
{


    $db = connectaDB();

    if(strlen($password)>7)
    {

    
    $newPass =password_hash($password,PASSWORD_DEFAULT) ;
    $sql = 'UPDATE `users` SET `resetPassCode`="",`passHash`= :pass WHERE `resetPassCode`=:resetCode';
    $update = $db->prepare($sql);
    $update->execute(array(':pass'=>$newPass,':resetCode'=>$resetPassCode));
    return 90;
    
    }else
    {
        return 4;
    }
    
    
}

function resetPassGet($mail,$resetCode)
{
    
    $db = connectaDB();
    $sql = 'SELECT * FROM `users` WHERE `mail`=:mail AND `resetPassCode`=:resetCode';
    $codigoOK = $db->prepare($sql);
    $codigoOK->execute(array(':mail'=>$mail,':resetCode'=>$resetCode));
    $datos = $codigoOK->fetchAll();

    if (isset($datos[0]['resetPassExpiry']))
    {
        $expira = $datos[0]['resetPassExpiry'];
    } 
        $linies=$codigoOK->rowCount();
      
        if(!($linies>0&&date("Y-m-d H:i:s")<$expira))
        {                
            $resetCode = 0;       
        }


        return $resetCode;
}




?>