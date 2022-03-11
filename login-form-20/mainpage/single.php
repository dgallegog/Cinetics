<?php

    require("../php/bddFunciones.php");
    session_start();

    if(!isset($_SESSION["user"]))header('Location: ../index.php'); 
    else if(!isset($_GET['path']))header('Location: ./index.php'); 
    else
    {
        $video = $_GET['path'];
        $video= str_replace("png", "mp4", $video);
    }
    $datos=videoExiste($video);
    
    if(count($datos)<1)header('Location: ../index.php'); 
    else{
        $idVideo = $datos[0]['idVideo'];
        $reacciones=recuperarReacciones($idVideo);
        $descripcion = $datos[0]['description'];

        $likes=$reacciones[0]['likes'];
        $dislikes =$reacciones[0]['dislikes'] ;

        if($likes == null)$likes = 0;
        if($dislikes ==null)$dislikes=0;

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
                    <h2>Bootstrap HTML Form Design</h2>
                    <ul>
                        <li> <a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><i class="fas fa-angle-double-right"></i> HTML Form Design</li>
                    </ul>
                </div>
            </div>
        </div>


      <!--####################### Video Blog Starts Here ###################-->
      <div class="container-fluid video-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row no-margin video-cover">
                        <video width="615"  controls>
                            <source src="<?php echo $video ?>" type="video/mp4">
                            
                            </video>
                            <p></p><div class="container"> 
                                <a class="like"><i class="fa fa-thumbs-up"></i>  
                                    Like <input class="qty1" name="qty1" readonly="readonly" type="text" value="<?php echo $likes ?>" />
                                </a>
                                <a class="dislike"><i class="fa fa-thumbs-down"></i> 
                                    Dislikes <input class="qty2"  name="qty2" readonly="readonly" type="text" value="<?php echo $dislikes ?>" />
                                </a>
                            </div>
                            <p><?php echo $descripcion ?>
                            </p>

                            <div class="row no-margin video-title" bis_skin_checked="1">
                                <h6><i class="fas fa-book"></i> 3 Comments</h6>
                            </div>

                            <div class="comment-container">
                                <div class="comment-box row">
                                    <div class="col-2 mghji">
                                        <img src="assets/images/testimonial/member-01.jpg" alt="">
                                    </div>
                                    <div class="col-10 detaila">
                                        <h6>Mr. Mical James</h6>
                                        <small>Published on 19-06-2019</small>
                                        <p>In this video, you will learn how to create a stylish appointment
                                             form from scratch using HTML, CSS, and Bootstrap Download the Project</p>
                                    </div>
                                </div>
                                <div class="comment-box row">
                                        <div class="col-2 mghji">
                                            <img src="assets/images/testimonial/member-01.jpg" alt="">
                                        </div>
                                        <div class="col-10 detaila">
                                            <h6>Mr. Mical James</h6>
                                            <small>Published on 19-06-2019</small>
                                            <p>In this video, you will learn how to create a stylish appointment
                                                 form from scratch using HTML, CSS, and Bootstrap Download the Project</p>
                                        </div>
                                    </div>
                                    <div class="comment-box row">
                                            <div class="col-2 mghji">
                                                <img src="assets/images/testimonial/member-01.jpg" alt="">
                                            </div>
                                            <div class="col-10 detaila">
                                                <h6>Mr. Mical James</h6>
                                                <small>Published on 19-06-2019</small>
                                                <p>In this video, you will learn how to create a stylish appointment
                                                     form from scratch using HTML, CSS, and Bootstrap Download the Project</p>
                                            </div>
                                        </div>
                            </div>

                            
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                    <h6><i class="fas fa-book"></i> Post Your Comment</h6>
                                </div>

                            <div class="comment-text ">
                                <div class="form-row  row">
                                    <input type="text" placeholder=" Enter Name" class="form-control form-control-sm">
                                </div>
                                <div class="form-row row">
                                        <input type="text" placeholder="Enter Mobile number" class="form-control form-control-sm">
                                </div>
                                <div class="form-row row">
                                        <input type="text" placeholder="Enter Email Address" class="form-control form-control-sm">
                                </div>
                                <div class="form-row row">
                                        <textarea placeholder="Enter Comment"   rows="5" class="form-control form-control-sm"></textarea>
                                 </div>
                                 <div class="form-row row">
                                       <button class="btn btn-danger">Post Comment</button>
                                 </div>
                            </div>
                        </div>
                        
                        
                        
                            
                                  
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
                                       
                                                <div class="row no-margin video-title" bis_skin_checked="1">
                                                    <h6><i class="fas fa-book"></i> Top Contributers</h6>
                                                </div>
                                                <div class="contri-row" bis_skin_checked="1">
                                                    <div class="image" bis_skin_checked="1">
                                                        <img src="assets/images/testimonial/member-01.jpg" alt="">
                                                    </div>
                                                    <div class="detail" bis_skin_checked="1">
                                                        <h6>David Smith</h6>
                                                        <p>78 Videos</p>
                                                        <span>Joned 2018</span>
                                                    </div>
                                                </div>
                                                <div class="contri-row" bis_skin_checked="1">
                                                    <div class="image" bis_skin_checked="1">
                                                        <img src="assets/images/testimonial/member-02.jpg" alt="">
                                                    </div>
                                                    <div class="detail" bis_skin_checked="1">
                                                        <h6>David Smith</h6>
                                                        <p>78 Videos</p>
                                                        <span>Joned 2018</span>
                                                    </div>
                                                </div>
                                                <div class="contri-row" bis_skin_checked="1">
                                                    <div class="image" bis_skin_checked="1">
                                                        <img src="assets/images/testimonial/member-03.jpg" alt="">
                                                    </div>
                                                    <div class="detail" bis_skin_checked="1">
                                                        <h6>David Smith</h6>
                                                        <p>78 Videos</p>
                                                        <span>Joned 2018</span>
                                                    </div>
                                                </div>
                                                <div class="contri-row" bis_skin_checked="1">
                                                    <div class="image" bis_skin_checked="1">
                                                        <img src="assets/images/testimonial/member-04.jpg" alt="">
                                                    </div>
                                                    <div class="detail" bis_skin_checked="1">
                                                        <h6>David Smith</h6>
                                                        <p>78 Videos</p>
                                                        <span>Joned 2018</span>
                                                    </div>
                                                </div>
                                                <div class="contri-row" bis_skin_checked="1">
                                                    <div class="image" bis_skin_checked="1">
                                                        <img src="assets/images/testimonial/member-01.jpg" alt="">
                                                    </div>
                                                    <div class="detail" bis_skin_checked="1">
                                                        <h6>David Smith</h6>
                                                        <p>78 Videos</p>
                                                        <span>Joned 2018</span>
                                                    </div>
                                                </div>
                                                    
                       
                    </div>
                </div>
            </div>
        </div>   



   <!--####################### Footer Starts Here ###################-->

    <div class="copy">
            <div class="container center">
              
                
                
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


</html>