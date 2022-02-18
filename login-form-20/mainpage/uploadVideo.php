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
                            <a href="./uploadVideo.php">Upload Video
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
                         <img src="assets/images/logo.jpg" alt="">
                      </div>
                      <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <h2>Upload Video</h2>
                    <ul>
                        <li> <a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><i class="fas fa-angle-double-right"></i> Upload Video</li>
                    </ul>
                </div>
            </div>
        </div>


      <!--####################### Video Blog Starts Here ###################-->
      <div class="container-fluid video-blog center ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row no-margin video-cover">
                           
                            
                            <div class="row no-margin video-title" bis_skin_checked="1">
                                    <h6><i class="fas fa-book"></i> Post Your Video</h6>
                                </div>
                                <form class="col-md-12" method="POST"  enctype="multipart/form-data" action="../php/uploadBDD.php" >
                                    <div class="comment-text ">
                                        <div class="form-row  row">
                                            <input type="text" placeholder="Title" class="form-control form-control-sm" name="Title">
                                        </div>

                                        <div class="form-row row">
                                                <input type="text" placeholder="Hashtags" class="form-control form-control-sm" name="Hashtags">
                                        </div>
                                        <div class="form-row row">
                                        <div class="input-group mb-3">
                     
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                            </div>
                                    </div>
                                        <div class="form-row row">
                                                <textarea placeholder="Description" name="description"  rows="5" class="form-control form-control-sm"></textarea>
                                        </div>
                                        <div class="form-row row ">
                                            <button type = "submit" class="btn btn-danger uploadVideo">Upload</button>
                                        </div>
                                    </div>
                                    </form>     
                            </div>
                        
                        
                        
                            
                                  
                    </div>




   <!--####################### Footer Starts Here ###################-->


</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>


</html>