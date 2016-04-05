<?php
require 'db_connection_info.php';

// Create connection
$conn = new mysqli($localhost, $username, $password);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// Create database
 $sql = "CREATE DATABASE ".$db."";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
 ?> 