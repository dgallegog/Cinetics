<?php 

    session_start();

    if(!isset($_SESSION["user"]))header('Location: ../index.php'); 

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
                Cinetics</title>
                <link rel="icon" href="../images/favicon.png">

        <link rel="shortcut icon" href="assets/images/fav.jpg">
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
                            <a id="uploadvid" href="./uploadVideo.php">Upload Video</a><span>|</span></li>
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
    <div class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <img src="assets/images/logo2.jpg" alt="">
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
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.php">Home
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="hashtag.php">Hashtag</a>
                                </li>
                                <li class="nav-item active">
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
                    <h2>Top Videos</h2>
                    <ul>
                        <li> <a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><i class="fas fa-angle-double-right"></i> Videos</li>
                    </ul>
                </div>
            </div>
        </div>


      <!--####################### Trending Starts Here ###################-->
      <div class="treanding-video container-fluid">
            <div class="container">
                <div class="row video-title no-margin">
                    <h6><i class="fas fa-book"></i> Treanding Videos</h6>
                </div>
                <div class="video-row row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="video-card">
                            <img src="assets/images/video/b1.jpg" alt="">
                           
                            <div class="row details no-margin">
                                  <h6>Pictures, abstract symbols the ingredients with</h6>
                                <div class="col-md-6 col-6 no-padding left">
                                    <i class="far fa-eye"></i> <span>3,241,234</span>    
                                </div>
                                <div class="col-md-6 col-6 no-padding right">
                                  
                                    <i class="far fa-comments"></i> <span>3,241,234</span>    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="video-card">
                              <img src="assets/images/video/b2.jpg" alt="">
                             
                              <div class="row details no-margin">
                                    <h6>Pictures, abstract symbols the ingredients with</h6>
                                  <div class="col-md-6 col-6 no-padding left">
                                      <i class="far fa-eye"></i> <span>3,241,234</span>    
                                  </div>
                                  <div class="col-md-6 col-6 no-padding right">
                                    
                                      <i class="far fa-comments"></i> <span>3,241,234</span>    
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-6">
                              <div class="video-card">
                                  <img src="assets/images/video/b3.jpg" alt="">
                                 
                                  <div class="row details no-margin">
                                        <h6>Pictures, abstract symbols the ingredients with</h6>
                                      <div class="col-md-6 col-6 no-padding left">
                                          <i class="far fa-eye"></i> <span>3,241,234</span>    
                                      </div>
                                      <div class="col-md-6 col-6 no-padding right">
                                        
                                          <i class="far fa-comments"></i> <span>3,241,234</span>    
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-sm-6">
                                  <div class="video-card">
                                      <img src="assets/images/video/b4.jpg" alt="">
                                     
                                      <div class="row details no-margin">
                                            <h6>Pictures, abstract symbols the ingredients with</h6>
                                          <div class="col-md-6 col-6 no-padding left">
                                              <i class="far fa-eye"></i> <span>3,241,234</span>    
                                          </div>
                                          <div class="col-md-6 col-6 no-padding right">
                                            
                                              <i class="far fa-comments"></i> <span>3,241,234</span>    
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="video-card">
                                        <img src="assets/images/video/b5.jpg" alt="">
                                       
                                        <div class="row details no-margin">
                                              <h6>Pictures, abstract symbols the ingredients with</h6>
                                            <div class="col-md-6 col-6 no-padding left">
                                                <i class="far fa-eye"></i> <span>3,241,234</span>    
                                            </div>
                                            <div class="col-md-6 col-6 no-padding right">
                                              
                                                <i class="far fa-comments"></i> <span>3,241,234</span>    
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="video-card">
                                            <img src="assets/images/video/b6.jpg" alt="">
                                           
                                            <div class="row details no-margin">
                                                  <h6>Pictures, abstract symbols the ingredients with</h6>
                                                <div class="col-md-6 col-6 no-padding left">
                                                    <i class="far fa-eye"></i> <span>3,241,234</span>    
                                                </div>
                                                <div class="col-md-6 col-6 no-padding right">
                                                  
                                                    <i class="far fa-comments"></i> <span>3,241,234</span>    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="video-card">
                                                <img src="assets/images/video/b4.jpg" alt="">
                                               
                                                <div class="row details no-margin">
                                                      <h6>Pictures, abstract symbols the ingredients with</h6>
                                                    <div class="col-md-6 col-6 no-padding left">
                                                        <i class="far fa-eye"></i> <span>3,241,234</span>    
                                                    </div>
                                                    <div class="col-md-6 col-6 no-padding right">
                                                      
                                                        <i class="far fa-comments"></i> <span>3,241,234</span>    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                <div class="video-card">
                                                    <img src="assets/images/video/b3.jpg" alt="">
                                                   
                                                    <div class="row details no-margin">
                                                          <h6>Pictures, abstract symbols the ingredients with</h6>
                                                        <div class="col-md-6 col-6 no-padding left">
                                                            <i class="far fa-eye"></i> <span>3,241,234</span>    
                                                        </div>
                                                        <div class="col-md-6 col-6 no-padding right">
                                                          
                                                            <i class="far fa-comments"></i> <span>3,241,234</span>    
                                                        </div>
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