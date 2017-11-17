

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title>Video Upload</title>

<body background="gray">
	
<?php 

$name= $_FILES['file']['name']; //Gives file name

$tmp_name= $_FILES['file']['tmp_name']; //gives The temporary filename of the file in which the uploaded file was stored on the server. 

$submitbutton= $_POST['submit']; // collect value of the input field 'submit'

$position= strpos($name, "."); //sees the position of $name and '.' for extension

$fileextension= substr($name, $position + 1); //use for deteting the extension of the file

$fileextension= strtolower($fileextension); //convert all extension to lowercase

$description= $_POST['description_entered']; //collect value of the description input

$mpd_name= $_POST['mpd'];

$success= -1; // count for no. of video

$descript= 0; // count for no. of description

if (empty($description))
{
$descript= 1;
}
//defining the path
if (isset($name)) {

$path= 'upload/';

if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
$success=0;
echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
}


else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
$success=1;
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}
}
}


//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "form"; 
$table = "Video"; 



//Block 3
$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($dbase, $connection);



//Block 4
if((!empty($description)) && ($success == 1)){
mysql_query("INSERT INTO $table (Descriptions, Video_name, Video_extension, mpd_file_name)
VALUES ('$description', '$name', '$fileextension', '$mpd_name')");
}


//Block 5
mysql_close($connection);

?>
<div class="jumbotron">
<a href= "http://localhost/dash.js/samples/dash-if-reference-player/index.html">Watch ALL videos </a>  
</div>

</body>
</html>
