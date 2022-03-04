<?php
require_once('bddFunciones.php');
require '../vendor/autoload.php';

function insertarVideo($username,$path,$description,$hashtags)
{
    $user = getIduser($username);
    $db=connectaDB();
    //insert del video a la bdd (path). 
    $sql = "INSERT INTO `videos`(`path`,`description`,`usersIduser`)VALUES(:pathU,:descriptionU,:usersIduser)";  
    $insert=$db->prepare($sql);
    $insert->execute(array(':pathU'=>$path,':descriptionU'=>$description,':usersIduser'=>$user));
    //con hacer el insert anterior, recuperar la idVideo asignada
    $idVideo = $db->lastInsertId();
    if (count($hashtags)>0){    
    //insert de los hashtags a la bdd. con los inserts anteriores nos darán los ids de Hashtag.
    $idHashtags=tratarHashtags($hashtags,$db);   
    //Con la idVideo y los idHashtags, hacer los inserts a la tabla videosHashtag.
    vincularVideoHashtags($idVideo,$idHashtags,$db);
    }
}

function tratarHashtags($hastagsList,$db)
{
    $arrayHashtag = [];
    foreach ($hastagsList as $valor)
    {
        $valor=strtolower($valor);
        $sql = "SELECT `idHashtag` FROM `hashtags` WHERE `tag`=:valor";  
        $select=$db->prepare($sql);
        $select->execute(array(':valor'=>$valor));
        $linies=$select->rowCount();

        if($linies>0)
        {
            $datos = $select->fetchAll();
            array_push($arrayHashtag,$datos[0]['idHashtag']); 
        }
        else
        {
            $sql = "INSERT INTO `hashtags`(`tag`)VALUES(:tag)"; 
            $insert=$db->prepare($sql);
            $insert->execute(array(':tag'=>$valor));
            $idHashtag = $db->lastInsertId();
            array_push($arrayHashtag,$idHashtag);
        }

    }
    return $arrayHashtag;
}
function vincularVideoHashtags($idVideo,$idHashtags,$db)
{
    foreach ($idHashtags as $id)
    {
        $sql = "INSERT INTO `videoHashtags` VALUES (:idVideo,:idHashtag)";
        $insert=$db->prepare($sql);
        $insert->execute(array(':idVideo'=>$idVideo,':idHashtag'=>$id));
    }
}
function generarNombre($usuario)
{
    return $usuario.date("YmdHis");
}

function obtenirVideoAleatori() 
{
    $db = connectaDB();
    $sql = 'SELECT `path` FROM `videos` ORDER BY RAND() LIMIT 1';
    $video = $db->prepare($sql);
    $video->execute(array());
    $datos = $video->fetchAll();
    if (count($datos)==0)
    {
        return 0;
    }
    return $datos[0]['path'];

}
function miniatura($video)
{
    $sec = 2;
    $movie = $video.".mp4";
    $thumbnail = $video.".png";
    
    $ffmpeg = FFMpeg\FFMpeg::create(array(
        'ffmpeg.binaries' => 'C:\Users\david\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffmpeg.exe', //Gallego
        'ffprobe.binaries' => 'C:\Users\david\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffprobe.exe', //Gallego
        //'ffmpeg.binaries' => 'C:\Users\Gerard\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffmpeg.exe',//Gerard
        //'ffprobe.binaries' => 'C:\Users\Gerard\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffprobe.exe',//Gerard
        'timeout' => 3600, // The timeout for the underlying process
        'ffmpeg.threads' => 12, // The number of threads that FFMpeg should use
        ));
    
    $video = $ffmpeg->open($movie);
    $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
    $frame->save($thumbnail);

    return $thumbnail;  
}

function miniaturas($video,$i)
{
    $sec = 10;
    $movie = $video;
    $thumbnail = array();
    foreach($movie as $mov)
    {
        $frase = 'thumbnail'.$i.".png";
        array_push($thumbnail,$frase);
        
        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries' => 'C:\Users\david\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffmpeg.exe', //Gallego
            'ffprobe.binaries' => 'C:\Users\david\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffprobe.exe', //Gallego
            //'ffmpeg.binaries' => 'C:\Users\Gerard\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffmpeg.exe',//Gerard
            //'ffprobe.binaries' => 'C:\Users\Gerard\Downloads\ffmpeg-master-latest-win64-gpl\bin\ffprobe.exe',//Gerard
            'timeout' => 3600, // The timeout for the underlying process
            'ffmpeg.threads' => 12, // The number of threads that FFMpeg should use
            ));
        
        $video = $ffmpeg->open($mov);
        $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
        $frame->save($frase);
        $i++;
    }


    return $thumbnail;  
}
function montarHastags($hashtag)
{

  $hashtagArray = explode("#",trim($hashtag));
  array_shift($hashtagArray);  
  return $hashtagArray;

}
function obtenirVideosAleatoris()
{
    $arrayVideos = [];
    $db = connectaDB();
    $sql = 'SELECT `path` FROM `videos` ORDER BY RAND() LIMIT 9';
    $videos = $db->prepare($sql);
    $videos->execute(array());
    $datos = $videos->fetchAll();
    foreach($datos as $video) array_push($arrayVideos,$video['path']);
    return $arrayVideos;
}
?>