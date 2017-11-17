
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload Videos </title>
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
                </button>
                <a class="navbar-brand" href="#"><strong>Upload Videos Here</strong> </a>
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
            <p> Upload Videos by Entering the Video Name and Description of the Videos <p>
            <div class="btn-group">
               <a target="_blank" href="UploadVideo.php" class="btn btn-lg btn-info">Upload</a>
            </div>
         </div>
           
       </div> <!-- End of Jumbotron-->
        <div class="row">
            <div class="col-md-4">
                <strong>Quickly Upload the video Dude!!! </strong>
                <hr>
                <form action="video.php" method='post' enctype="multipart/form-data">
                	<div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name ="description_entered" class="form-control" required="required" placeholder="Enter the Video Description Here Dude !!! ....">
                            </div>
                            <div class="form-group">
                                <input type="text" name ="mpd" class="form-control" required="required" placeholder="Enter the MPD file name!!">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button><input type="file" name="file" >
                                </button>
                            </div>
                            <div class="form-group">
                                <button><input type="submit" class="btn btn-primary" name="submit" value="Upload Now"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "form"; 
$table = "Video"; 
 
// Connection to DBase 
mysql_connect($host,$user,$password); 
@mysql_select_db($dbase) or die("Unable to select database");

//collect

if(isset($_POST['Search']))
{
	$searchq = $_POST['Search'];
	$searchq = preg_replace("#[^0-9a-z]i#", "", $searchq );

	$query = mysql_query("SELECT * FROM $table WHERE Descriptions LIKE '%$searchq%' OR Video_name LIKE '%$searchq%' ") or die ("Could not search!");	
	$count = mysql_num_rows($query);
	if($count == 0){
		$output = 'There are no search result' ;
}else {
	while($row = mysql_fetch_array($query)){ 
$videos_field= $row['Video_name'];
$video_show= "upload/$videos_field";
$descriptionvalue= $row['Descriptions'];
$fileextensionvalue= $row['Video_extension'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>"."<br />"."<br />";
echo "<font face=arial size=4/>$videos_field</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><video width='800' controls><source src='$video_show' type='video/$fileextensionvalue'>Your browser does
not support the video tag.</video></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n";  

	}
	
}
?>
</body>
</html>

