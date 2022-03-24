<?php 

require_once("../php/bddFunciones.php");

session_start();
   
if(!isset($_SESSION["user"]))header('Location: ../index.php'); 
$arrayVideos = [];
$arrayComentarios = [];
$miniaturaVid=array("");

if(isset($_GET["path"]) && isset($_GET["desc"]))
{

    $arrayVideos = explode(",",$_GET["path"]);
    array_pop($arrayVideos);
    $arrayComentarios = explode(",",$_GET["desc"]);
    array_pop($arrayComentarios);
    echo "<script type=\"text/javascript\">window.history.pushState('index', 'Title', './index.php');</script>";  
   
}

  
else{

    $videosCarrusel=obtenirVideosAleatoris();
    foreach($videosCarrusel as $datos) array_push($arrayVideos,$datos['path']);
    foreach($videosCarrusel as $datos) array_push($arrayComentarios,$datos['description']);
    
}

$videosCarrusel = $arrayVideos;






   

if (count($videosCarrusel)>0){
    // Aqui estoy filtrando para cuando no hay videos en la bdd. actualmente el html se fastidia ya que depende de miniaturaVid.
    
    $miniaturaVid = str_replace("mp4", "png", $videosCarrusel);
  
}

$miniaturasR =count($miniaturaVid);

if($miniaturaVid[0]=="")
{
    $miniaturaVid[0]="./assets/images/Gigachad.jpg";

    $arrayComentarios[0] = "Sube el primer video 😎";
}



?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Cinetics</title>
            <link rel="icon" href="../images/favicon.png">
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css"/>
        
    </head>

    <body>

    <div id="container">
        <main>
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
                            <a id="uploadvid" href="./uploadVideo.php">Upload Video</a><span>|</span>
                            </li>
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
    <div class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                <a href="./index.php"> <img src="assets/images/logo2.jpg" alt=""> </a>
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="hashtag.php">Hashtag</a>
                                </li>

                                

                               <li>
                               <div class="input-group">
                                   <form action="../php/buscarVid.php" method="POST">
                                    <div class="form-outline">
                                    <input type="search" id="form1" class="form-control" name="keys" placeholder="search for video"/>
                                   
                                    </div>
                               </li>
                               <li>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                </form>
                                </div>
                               </li>
                              
                            </ul>

                        </div>
                       
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
        <!--####################### Slider Starts Here ###################-->
        <div class="banner-card container-fluid">
            <div class="container">
                <div class="row no-margin">
                    <div class="col-md-9 banner-slid">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <?php if($miniaturasR>1) echo "<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>" ?>
                                <?php if($miniaturasR>2) echo "<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>" ?>
                            </ol>
                            <div class="carousel-inner">
                                <div class="<?php if($miniaturasR<1)echo "d-none";
                                            else echo "carousel-item active" ?>">
                                    <a href="single.php?path=<?php  echo $miniaturaVid[0] ?>">
                                        <img src="<?php echo $miniaturaVid[0] ?>" width="788" height="443" class="d-block w-100" alt="...">
                                        <div class="detail-card">
                                            <p><?php  echo $arrayComentarios[0] ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="<?php if($miniaturasR<2)echo "d-none";
                                            else echo "carousel-item"; ?>">
                                    <a href="single.php?path=<?php  echo $miniaturaVid[1] ?>">
                                        <img src="<?php echo $miniaturaVid[1] ?>" width="788" height="443"  class="d-block w-100" alt="...">
                                        <div class="detail-card">
                                            <p><?php  echo $arrayComentarios[1] ?>
                                            
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="<?php if($miniaturasR<3)echo "d-none";
                                else echo "carousel-item"; ?>">
                                    <a href="single.php?path=<?php  echo $miniaturaVid[2] ?>">
                                        <img src="<?php echo $miniaturaVid[2] ?>" width="788" height="443"  class="d-block w-100" alt="...">
                                        <div class="detail-card">
                                            <p><?php  echo $arrayComentarios[2] ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <a
                                class="carousel-control-prev"
                                href="#carouselExampleIndicators"
                                role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a
                                class="carousel-control-next"
                                href="#carouselExampleIndicators"
                                role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-3 vgbh">
                        <div class="row">
                            <div class="video-card col-md-12 col-sm-6 <?php if($miniaturasR<4)echo "d-none" ?>">
                                    <a href="single.php?path=<?php  echo $miniaturaVid[3] ?>">
                                <img src="<?php echo $miniaturaVid[3] ?>"  width="238" height="163"  wialt="">
                                <div class="detail-card">
                                    <p><?php  echo $arrayComentarios[3] ?></p>
                                </div>
                                </a>
                            </div>
                            <div class="video-card col-md-12 col-sm-6 <?php if($miniaturasR<5)echo "d-none" ?>">
                                    <a href="single.php?path=<?php  echo $miniaturaVid[4] ?>">
                                <img src="<?php echo $miniaturaVid[4] ?>"  width="238" height="163" alt="">
                                <div class="detail-card">
                                    <p><?php  echo $arrayComentarios[4] ?></p>
                                </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--####################### Trending Starts Here ###################-->
        <div class="treanding-video container-fluid">
            <div class="container">
                <div class="row video-title no-margin">
                    <h6>
                        <i class="fas fa-book"></i>
                        Treanding Videos</h6>
                </div>
                <div class="video-row row">
                    <div class="col-lg-3 col-md-4 col-sm-6 <?php if($miniaturasR<6)echo "d-none" ?>">
                        <div class="video-card">
                                <a href="single.php?path=<?php  echo $miniaturaVid[5] ?>">
                            <img src="<?php echo $miniaturaVid[5] ?>"  width="238" height="163" alt="">

                            <div class="row details no-margin">
                                <h6><?php  echo $arrayComentarios[5] ?></h6>
                                <div class="col-md-6 col-6 no-padding left">
                                    <i class="far fa-eye"></i>
                                    <span></span>
                                </div>
                                <div class="col-md-6 col-6 no-padding right">

                                    <i class="far fa-comments"></i>
                                    <span></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 <?php if($miniaturasR<7)echo "d-none" ?>">
                        <div class="video-card">
                                <a href="single.php?path=<?php  echo $miniaturaVid[6] ?>">
                            <img src="<?php echo $miniaturaVid[6] ?>"  width="238" height="163" alt="">

                            <div class="row details no-margin">
                                <h6><?php  echo $arrayComentarios[6] ?></h6>
                                <div class="col-md-6 col-6 no-padding left">
                                    <i class="far fa-eye"></i>
                                    <span></span>
                                </div>
                                <div class="col-md-6 col-6 no-padding right">

                                    <i class="far fa-comments"></i>
                                    <span></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 <?php  if($miniaturasR<8)echo "d-none" ?> ">
                        <div class="video-card ">
                        
                        <a href="single.php?path=<?php  echo $miniaturaVid[7] ?>">
                            <img src="<?php echo $miniaturaVid[7] ?>"  width="238" height="163" alt="">

                            <div class="row details no-margin">
                                <h6><?php  echo $arrayComentarios[7] ?></h6>
                                <div class="col-md-6 col-6 no-padding left">
                                    
                                </div>
                                <div class="col-md-6 col-6 no-padding right">

                                  
                                    <span></span>
                                </div>
                            </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 <?php if($miniaturasR<9)echo "d-none" ?>">
                            <a href="single.php?path=<?php  echo $miniaturaVid[8] ?>">
                        <div class="video-card">
                            <img src="<?php echo $miniaturaVid[8] ?>"  width="238" height="163" alt="">

                            <div class="row details no-margin">
                                <h6><?php  echo $arrayComentarios[8] ?></h6>
                                <div class="col-md-6 col-6 no-padding left">
                                    <i class="far fa-eye"></i>
                                    <span></span>
                                </div>
                                <div class="col-md-6 col-6 no-padding right">

                                    <i class="far fa-comments"></i>
                                    <span></span>
                                </div>
                            </div>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        </main>
        <!--####################### Footer Starts Here ###################-->
        </div>
        <footer>
        <div class="copy navbar fixed-bottom justify-content-around">
            <div class=" center">
              
                
                
                <a href="https://github.com/yudokusora/Cinetics"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
       
            </div>

        </div>
        </footer>
    </body>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/js/script.js"></script>

</html>
