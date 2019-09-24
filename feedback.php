<?php
    session_start();
    require_once("config.php");
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $message=$_POST["message"];
    $ins="INSERT INTO feedback(name,email,message,Date) VALUES ('$name','$mail','$message',now())";
    if($connection->query($ins)===true){
        echo '<script>alert("Information Submitted Successfully.We will reach you soon.");window.history.back();</script>';
    }
    else{
        echo 'Something went wrong!!'.$connection->error;
    }
?>