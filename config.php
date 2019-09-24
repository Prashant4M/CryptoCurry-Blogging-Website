<?php
    $servername = "localhost";
$username = "root";
$password = "1234";
$db="blogdb";
$connection = new mysqli($servername, $username, $password,$db);
    if($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }
?>