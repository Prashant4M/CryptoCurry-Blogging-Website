<?php
    require_once("config.php");
    $heading=$_GET['heading'];
    $user=$_GET['user'];
    $name=$_SESSION["user_name"];
    $del="DELETE FROM blogs WHERE heading='$heading' AND user_id='$user'";
    if($connection->query($del)===true){
        echo '<script>alert("Post Deleted Successfully");window.location.href="Blog.php";</script>';
    }
    else{
        echo 'Something went wrong!!'.$connection->error;
    }
?>