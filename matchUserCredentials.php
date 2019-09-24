<?php
    session_start();
    require_once "config.php";
    $curpwd=$_POST['pwd'];
    $name=$_SESSION['user_name'];
    $get="SELECT pwd FROM users WHERE user_id='$name'";
    $result=$connection->query($get);
    if($result->num_rows==1){
        while($r=$result->fetch_assoc()){
            if($curpwd==$r['pwd']){
                header('Location:makechanges.php');
            }
            else{
                echo '<script>alert("Wrong Password Try Again!!");window.location.href="profile.php";</script>';
            }
        }
    }
    
?>