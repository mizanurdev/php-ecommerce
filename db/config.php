<?php
    $server_name = "localhost";
    $server_username = "root";
    $server_password = "";
    $database = "php_ecommerce";
    
    // Establishing a connection to the database
    $conn = new mysqli($server_name, $server_username, $server_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "Connected successfully";
    }
?>
