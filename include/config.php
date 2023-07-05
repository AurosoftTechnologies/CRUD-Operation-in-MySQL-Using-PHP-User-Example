<?php
    $servename="localhost";
    $username="root";
    $password="";
    $database="user_db";

    $conn = mysqli_connect($servename, $username,$password,$database);
    
    if(!$conn){
        die("Sorry we failed to connect: ".mysqli_connect_error());
    }else{
        // echo "Connected...";
    }
?>