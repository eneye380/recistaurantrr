<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "recistaurant_DB";
// Create connection
if($_SERVER['REQUEST_METHOD']=='GET'){
	$placeid = $_GET['placeid'];
}else{
	die("error");
}

$conn = new mysqli($localhost, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 

$sql = "SELECT AVG(rating) AS rating1 FROM comment_userview WHERE placeid='$placeid';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//$rating = rating;
		
		echo(round($row["rating1"],1));
        
    }
} else {
    echo "";
}
 $conn->close();
 ?> 