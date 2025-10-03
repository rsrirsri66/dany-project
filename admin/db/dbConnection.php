<?php

    // Local Server (Uncomment and use as needed)
         $host = "localhost"; 
         $user = "root"; 
         $pass = ""; 
         $db = "music_db";

    

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "Connection failed: " . mysqli_connect_error();
        die();
    }
?>  
