<?php

require 'db_connection_info.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$sql = "CREATE TABLE comment_adminview (
	placeid VARCHAR(40),
        email VARCHAR(80),
	name VARCHAR(255),
	comment TEXT,
	rating decimal(2,1),	
	restaurant_name VARCHAR(255),
        timestamp TIMESTAMP
	
	)";

if ($conn->query($sql) === TRUE) {
    echo "Table comment_adminview created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 