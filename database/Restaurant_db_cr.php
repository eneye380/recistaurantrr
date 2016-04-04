<?php
require 'db_connection_info.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
 $sql = "CREATE TABLE Restaurants (
	placeID VARCHAR(40) PRIMARY KEY,
	name VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Restaurants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?> 