<?php

    require("../php/bddFunciones.php");
    session_start();

    if(!isset($_SESSION["user"]))header('Location: ../index.php'); 
    else if(!isset($_GET['path']))header('Location: ./index.php'); 
    else
    {
        $video = $_GET['path'];
        if (strpos($video, "png")>0)$video= str_replace("png", "mp4", $video);
    }
    $datos=videoExiste($video);
    
    if(count($datos)<1)header('Location: ../index.php'); 
    else{
        $idVideo = $datos[0]['idVideo'];
        $reacciones=recuperarReacciones($idVideo);

        $comentarios = recuperarComentarios($idVideo);


        $descripcion = $datos[0]['description'];
        $titulo = $datos[0]['title'];
        $likes=$reacciones[0]['likes'];
        $dislikes =$reacciones[0]['dislikes'];


        if($likes == null)$likes = 0;
        if($dislikes ==null)$dislikes=0;

        $haFetLike=obtenerReaccion($_SESSION["user"],$idVideo,"1");
        $haFetDislike=obtenerReaccion($_SESSION["user"],$idVideo,"0");

        // Aqui calculamos la proporcion de likes sobre el total para saber cuantas estrellas poner
        $estrellasLike=0;
        $estrellaMezcla=false;
        $estrellasDislike=0;
        if (($likes+$dislikes)>0){
            $likesSobretotal=($likes/($likes+$dislikes))*100; // Esto dará, por ejemplo, 6 likes sobre 10 votos, 60.
            if ($likesSobretotal>0){ // Verificamos que no ha dado NAN 
                $estrellasLike=intdiv($likesSobretotal,10); // Nos da un int entre 0 y 10
                $estrellaMezcla=($likesSobretotal%10)>0; // Nos permite saber si hay residuo y por ello colocar media estrella
                $estrellasDislike=10-$estrellasLike-$estrellaMezcla; // Obtenemos las estrellas vacias restando las completas y el bool activo o no (1,0)
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
            Cinetics</title>
            <link rel="icon" href="../images/favicon.png">

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/videoplayerstyle.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    
</head>

<body>
  
  <!--####################### Header Starts Here ###################-->
  <header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i ></i>
                            Cinetics
                            <span>|</span></li>
                        <li>
                            <i class="far fa-clock"></i>
                            <?php   print_r(date("H:i")) ?></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">
                        <li>
                            <i class="fas fa-cloud-upload-alt"></i>
                            <a href="./uploadVideo.php" id="uploadvid">Upload Video
                            <span>|</span></li>
                            <a class="" href="#" >
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./profile.php">Profile</a>
                            <a class="dropdown-item" href="../php/logOut.php">Log Out</a>

                        </div>
                        <li class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <?php  print_r($_SESSION['user']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
          <div id="menu-jk" class="header-bottom">
              <div class="container">
                  <div class="row nav-row">
                      <div class="col-md-3 logo">
                         <img src="assets/images/logo2.jpg" alt="">
                      </div>
                      <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav">
                              <li class="nav-item ">
                                    <a class="nav-link" href="index.php">Home
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="hashtag.php">Hashtag</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="videos.php">Videos</a>
                                </li>
                              </ul>
                            </div>
                          </nav>   
                    </div>
                  </div>
              </div>
          </div>
      </header>
  
       <!--  ************************* Page Title Starts Here ************************** -->
     <div class="page-nav no-margin row">
            <div class="container">
                <div class="row">
                    <h2><?php echo $titulo ?></h2>
                    <ul>
                        <li> <a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><i class="fas fa-angle-double-right"></i><?php echo $titulo ?></li>
                    </ul>
                </div>
            </div>
        </div>


      <!--####################### Video Blog Starts Here ###################-->
      <div class="  container-fluid video-blog">
      <div class="player d-flex justify-content-center ">

                 <div class="player">
                        <video width="400"  class=" player__video viewer" src="<?php echo $video ?>" > </video>
                        <div class="player__controls">
        <div class="progress">
            <div class="progress__filled"></div>
        </div>
        <div class="buttons_and_scrubbers">
            <button class="player__button toggle material-icons" title="Toggle Play">play_arrow
            </button>

            <div class="player__icon material-icons">volume_up</div>
            <input type="range" name="volume" class="player__slider" min="0" max="1" step="0.05"
                   value="1">

            <div class="player__icon material-icons">av_timer</div>
            <input type="range" name="playbackRate" class="player__slider" min="0.5" max="2"
                   step="0.1"
                   value="1">

            <button data-skip="-10" class="player__button material-icons">replay_10</button>
            <button data-skip="30" class="player__button material-icons">forward_30</button>
            <button class="player__button fullscreen material-icons">fullscreen</button>
        </div>
    </div>
</div>
      </div>
     


                        
      
      <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row no-margin video-cover">

                           
                            <p></p><div class="container"> 
                                <a class="<?php if($haFetLike)echo 'liked';else echo 'like'; ?>" href="<?php echo analitzaReaccio($haFetLike,$haFetDislike,$idVideo,1)?>"><i class="fa fa-thumbs-up"></i>  
                                    Like <input class="qty1" name="qty1" readonly="readonly" type="text" value="<?php echo $likes ?>" />
                                </a>
                                <a class="<?php if($haFetDislike)echo 'disliked';else echo 'dislike'; ?>" href="<?php echo analitzaReaccio($haFetLike,$haFetDislike,$idVideo,0)?>"><i class="fa fa-thumbs-down"></i> 
                                    Dislikes <input class="qty2"  name="qty2" readonly="readonly" type="text" value="<?php echo $dislikes ?>" />
                                </a>
                                <?php for($i=0; $i<$estrellasLike;$i++)echo '<i class="fa fa-star" style="font-size:24px;color:rgb(29, 179, 49)"></i>'; if ($estrellaMezcla) echo '<i class="fa fa-star" style="font-size:24px;color:rgb(110, 99, 34)"></i>'; for($i=0; $i<$estrellasDislike;$i++) echo '<i class="fa fa-star" style="font-size:24px;color:rgb(192, 19, 19)"></i>'; ?>
                            </div>
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                <h6>Description: </h6>
                                <p><?php echo $descripcion ?></p>
                            </div>
                            <p></p>
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                <h6>Hashtags: </h6>
                                <p><?php echo "Aqui van los hashtags" ?></p>
                            </div>
                            <p></p>
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                <h6><i class="fas fa-book"></i> <?php  echo count($comentarios)  ?> Comments</h6>
                            </div>

                            <div class="comment-container">
                               
                            <?php 
                            
                            foreach($comentarios as $comment)
                            {
                                echo '<div class="comment-box row">
                                <div class="col-2 mghji">
                                    <img src="'.$comment["profilepic"].'" alt="">
                                </div>
                                <div class="col-10 detaila">
                                    <h6>'.$comment["usersIduser"].'</h6>
                                    <small>Published on '.$comment["date"].'</small>
                                    <p>'.$comment["comment"].'</p>
                                </div>
                            </div>';
                            }
                            
                            
                            
                            ?>
                
                            </div>

                            <form  method="POST"  class="col-md-12" action="../php/comment.php" >
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                    <h6><i class="fas fa-book"></i> Post Your Comment</h6>
                                </div>
                        
                            <div class="comment-text ">
                                
                                <input id="hiddenPath" name = "hiddenPath" type="hidden" value="<?php echo $_GET['path']?>" /> 
                                <input id="vidId" name="vidId" type="hidden" value="<?php echo $idVideo ?>" />
                                <div class="form-row row">
                                        <textarea placeholder="Enter Comment"  name="comment" rows="5" class="form-control form-control-sm"  maxlength="200"></textarea>
                                 </div>
                                 <div class="form-row row">
                                       <button class="btn btn-danger" type = "submit">Post Comment</button>
                                 </div>
                            </div>
                            
                        </div>  
                        </form>
                        
                        
                            
                                  
                    </div>
                    <div class="col-md-4">
                        <div class="row no-margin video-title">
                            <h6><i class="fas fa-book"></i> Related Videos</h6>
                        </div>
                        <div class="contri-bghy">
                            <div class="image">
                                <img src="assets/images/video/b1.jpg" alt="">
                            </div>
                            <div class="detail">
                                <h6>Pictures, abstract symbols the ingredients with</h6>
                               
                                <span>Posted on: 2018</span>
                            </div>
                        </div>

                        <div class="contri-bghy">
                                <div class="image">
                                    <img src="assets/images/video/b2.jpg" alt="">
                                </div>
                                <div class="detail">
                                    <h6>Pictures, abstract symbols the ingredients with</h6>
                                   
                                    <span>Posted on: 2018</span>
                                </div>
                            </div>

                            <div class="contri-bghy">
                                    <div class="image">
                                        <img src="assets/images/video/b3.jpg" alt="">
                                    </div>
                                    <div class="detail">
                                        <h6>Pictures, abstract symbols the ingredients with</h6>
                                       
                                        <span>Posted on: 2018</span>
                                    </div>
                                </div>

                                <div class="contri-bghy">
                                        <div class="image">
                                            <img src="assets/images/video/b4.jpg" alt="">
                                        </div>
                                        <div class="detail">
                                            <h6>Pictures, abstract symbols the ingredients with</h6>
                                           
                                            <span>Posted on: 2018</span>
                                        </div>
                                    </div>

                                    <div class="contri-bghy">
                                            <div class="image">
                                                <img src="assets/images/video/b5.jpg" alt="">
                                            </div>
                                            <div class="detail">
                                                <h6>Pictures, abstract symbols the ingredients with</h6>
                                               
                                                <span>Posted on: 2018</span>
                                            </div>
                                        </div>
                                       
                                               
                                                    
                                        
                    </div>
                </div>
            </div>
        </div>   



   <!--####################### Footer Starts Here ###################-->

   <div class="copy align-items-end justify-content-around" >
            <div class=" center">
              
                
                
                <a href="https://github.com/yudokusora/Cinetics"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
       
            </div>
        </div>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/videoplayer.js"></script>


</html>