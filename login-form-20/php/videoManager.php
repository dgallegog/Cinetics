<?php
require_once('bddFunciones.php');
require '../vendor/autoload.php';


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
  $hashtagArray = explode("#",$hashtag);
  array_shift($hashtagArray);  
  $hashtagArray = array_map('trim', $hashtagArray);
  return $hashtagArray;
}
?>