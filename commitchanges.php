<?php
 session_start();
 require "config.php";
$newname=$_POST['name'];
$newmail=$_POST['mail'];
$newpwd=$_POST['pwd'];
$name=$_SESSION['user_name'];



$target_dir = "upload/";
$target_file = $target_dir.basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])){

$check = getimagesize($_FILES["pic"]["tmp_name"]);
if($check != false){
	echo "file is an Image".$check["mime"]."." ;
	$uploadOk = 1;
}
else {
	echo "not an Image";
	$uploadOk =  0;	
}
}

if(file_exists($target_file)){
	
	echo "File already Exist";
	$uploadOk = 0;
}

if($_FILES["pic"]["size"] > 5000000){
	echo "file is too large";
	$uploadOk = 0;
}
if($uploadOk == 0)
{
	echo "file not uploaded";
}
move_uploaded_file($_FILES["pic"]["tmp_name"],$target_file);
$ins="UPDATE users SET user_id='$newname',email='$newmail',pwd='$newpwd',ImagePath='$target_file' WHERE user_id='$name'";
if($connection->query($ins)){
    echo '<script>alert("Changes saved successfully.Log in Again with new ID and Password.");window.location.href="logout.php";</script>';
}
?>