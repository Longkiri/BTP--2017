<!DOCTYPE html>
<html lang="en">
   
   <head>
      <title>My Home Page </title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
           <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">  
      <!-- Custom CSS-->
      <link href="css/style.css" rel="stylesheet" />
       <!-- Fontawesome core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!--Slide Show Css -->
    <link href="css/main-style.css" rel="stylesheet" />
      
   </head>
   
   <body>
          <nav class="navbar navbar-default" role="navigation" color = "gray">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>Welcome Users</strong> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a target="_blank" href="watchvideo.php">Search Video</a></li>
                    <li><a target="_blank" href="UploadVideo.php">Upload Video</a></li>
                    <li><a target="_blank" href="phpmyadmin/sql.php?db=form&table=Video&token=dd7cb2c428c2aff387603a43395060ee&pos=0">See Database</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
     </nav>

        <!-- Jumbotron-->
        <div class="jumbotron">
         <div class="container-fluid">
            <h1>4th year BTP </h1>
            <p> Study on Online Streaming using Dynamic Adaptive Streaming Over HTTP <p>
            <div class="btn-group">
               <a target="_blank" href="watchvideo.php" class="btn btn-lg btn-info">Search</a>
               <a target="_blank" href="watchvideo.php" class="btn btn-lg btn-default">Watch</a>
               <a target="_blank" href="UploadVideo.php" class="btn btn-lg btn-info">Upload</a>
            </div>
         </div>
           
        </div><!-- jumbotron-->

      <!-- FeedBack -->
        <div class="container-fluid">
            <section>
               <div class="page-header" id="feedback">
                  <h2>Feedback.<small> Check out the Awesome Feedback</small></h2>
                  
               </div>
               <div class="row">
                  <div class="col-lg-4">
                     <blockquote>
                        <p> Need Some more Coding</p>
                        <footer>Neo</footer>
                     </blockquote>
                     <blockquote>
                        <p> No Style at all</p>
                        <footer>Chinese Coders</footer>
                     </blockquote>
                     
                  </div>
               </div>
            </section>
        </div>


     
      <script src = "javascript/bootstrap.min.js"></script>
          <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="javascript/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="javascript/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="javascript/modernizr.custom.63321.js"></script>
    <script src="javascript/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
      </script>

      
   </body>
</html>
