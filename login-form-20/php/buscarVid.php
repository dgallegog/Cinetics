
<?php

require_once("./bddFunciones.php");
if(isset($_POST['keys']))
{
    $videos = ejecutarQuery($_POST['keys']);
    //setcookie("busqueda", $videos,time()+3600);
    //$_COOKIE["busqueda"] = $videos;
    
    $getVideo="";
    $getDesc ="";
    foreach($videos as $dato)
    {
        $getVideo = $getVideo.$dato["path"].',';
        $getDesc = $getDesc.$dato["description"].',';
    }
    
    header('Location: ../mainpage/index.php?path='.$getVideo.'&&desc='.$getDesc);
}

?>