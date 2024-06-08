<?php

$servername = "localhost";
$username = "root"; // Put the MySQL Username
$password = ""; // Put the MySQL Password
$database = "php_ecommerce"; // Put the Database Name

// Create connection for integration
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection for integration
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

