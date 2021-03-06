<?php
require 'db_connection_info.php';

// Create connection
$conn = new mysqli($localhost, $username, $password, $db);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
 $sql = "CREATE TABLE Reviews (
	username VARCHAR(80),
	placeID VARCHAR(40),
	comment VARCHAR(255),	
	time TIMESTAMP,
	PRIMARY KEY(username,placeID),
	FOREIGN KEY(username) REFERENCES Users(username),
	FOREIGN KEY(placeID) REFERENCES Restaurants(placeID)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Reviews created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
 ?> 