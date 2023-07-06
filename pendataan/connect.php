<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "petshop";
    
    $conn = mysqli_connect($server, $user, $pass, $database);
    
    if (!$conn) {
        die("<script>alert('Tidak dapat tersambung ke database!!!!!')</script>");
    }
    
?>