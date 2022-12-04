<?php
session_start();
    $host = "localhost";
    $username = "ketabarz_main";
    $password = "ketabarz_main";
    $dbname = "ketabarz_main";
    $connection = new mysqli($host, $username, $password, $dbname);
    if($connection->connect_error){
        die("no con");
    }
    if(isset($_SESSION['userid'])){
        $logout = mysqli_real_escape_string($connection,$_GET['logout']);
        if(isset($logout)){
            session_unset();
            session_destroy();
            header("location: https://ketabarzooni.ir/others/portal/login/");
        } else {
            header("location: https://ketabarzooni.ir/others/dashboard");
        }
    } else {
        header("location: https://ketabarzooni.ir/others/portal/login/");    
    }

?>