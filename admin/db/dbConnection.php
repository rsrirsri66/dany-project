<?php

$host = "103.174.10.215"; 
$user = "rajkumar_user1"; 
$pass = "Zenvic@1011"; 
$db   = "rajkumar_dynamicstaccato";
    

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "Connection failed: " . mysqli_connect_error();
        die();
    }
?>