<?php
    session_start();
    require_once("config.php");
    $comment=$_POST['contentText'];
    $name=$_SESSION['user_name'];
    $head=$_GET['blogHeading'];
    $ins="INSERT INTO comments(commented_by,comment,heading,time) VALUES('$name','$comment',$head,now())";
    if($connection->query($ins)){
        echo '<script>alert("Commented Successfully");window.location.href="Blog.php";</script>';
        }
    else{
        echo 'Error: '.$connection->error;
    }
?>