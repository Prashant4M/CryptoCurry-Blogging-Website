<?php
    session_start();
    require_once("config.php");
    $heading=$_POST['headingText'];
    $content=$_POST['contentText'];
    $name=$_SESSION["user_name"];
    $ins="INSERT INTO blogs(user_id,content,heading,Date) VALUES ('$name','$content','$heading',now())";
    if($connection->query($ins)===true){
        echo '<script>alert("Posted Successfully");window.location.href="Blog.php";</script>';
    }
    else{
        echo 'Something went wrong!!'.$connection->error;
    }
?>