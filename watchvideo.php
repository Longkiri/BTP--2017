<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Watch Video Here</title>
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
           <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">  
      <!-- Custom CSS-->
      <link href="css/style.css" rel="stylesheet" />
       <!-- Fontawesome core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!--Slide Show Css -->
    <link href="css/main-style.css" rel="stylesheet" />
     <script src="dash.js/dist/dash.all.debug.js"></script>

     
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
                <a class="navbar-brand" href="#"><strong>Search</strong> Videos Here </a>
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
<div class="jumbotron">
         <div class="container-fluid">
            <h1>4th year BTP </h1>
      	      <p> Search Videos by Entering the Video Name Or Description of the Videos </p>
            <div class="btn-group">
               <a target="_blank" href="watchvideo.php" class="btn btn-lg btn-info">Search</a>
            </div>
         </div>
<div>
<h2>Watch Uploaded Video By Descriptions or Name</h2>
<form action = "watchvideo.php" method ="POST" align = "centered" >
	<input type = "text" name = "Search" placeholder = "Search Video" />
	<input type = "submit" value = "GO!"/>
</form>
</div>
<br>
<br>
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
	$Video_name=$row['Video_name'] ;
$videos_field= $row['mpd_file_name'];
$video_show= "upload/$videos_field";
$descriptionvalue= $row['Descriptions'];
$fileextensionvalue= $row['Video_extension'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>"."<br />"."<br />";
echo "<font face=arial size=4/>$Video_name</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><video autoplay preload='none' controls='true'>
                <source src='upload/$videos_field' type='application/dash+xml'/>
            </video>
            </div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n";  

	}
	
}
?>

</body>
</html>


