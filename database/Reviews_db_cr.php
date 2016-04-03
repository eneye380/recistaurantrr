<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recistaurant_DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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