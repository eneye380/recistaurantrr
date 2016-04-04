<?php
require 'db_connection_info.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
 $sql = "ALTER TABLE comment_userview DROP PRIMARY KEY
	
";

if ($conn->query($sql) === TRUE) {
    echo "Table comment_userview created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?> 