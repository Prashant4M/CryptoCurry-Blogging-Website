<?php

    session_start();
    if(!isset($_SESSION["user_name"]))
    {
        require_once "config.php";
        $name=$_POST["name"];
        $pwd=$_POST["pwd"];
        $sql = "SELECT user_id,email FROM users WHERE user_id='$name' AND pwd='$pwd'";
        $result = $connection->query($sql);
        if ($result->num_rows >=1) {
            while($res = $result->fetch_assoc()) {
                $_SESSION["user_name"]=$res["user_id"];
                $_SESSION["mail"]=$res["email"];
                header('Location:Blog.php');
            }
        }
        else{
            echo '<script>alert("Wrong Credentials!!");window.location.href="Signup.php";</script>';
        }
    }
    else
    {
        header('Location:Blog.php');
    }
?>