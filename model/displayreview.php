<?php
require '../database/db_connection_info.php';
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

$sql = "SELECT name, comment, timestamp  FROM comment_userview WHERE placeid='$placeid';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='thumbnail' style='background:mistyrose; margin-top:5px'><p style='color:milk'>Name:</p><p style='color:milk;margin-top:-5px'> " . $row["name"]. "</p><p style='color:grey;margin-top:-5px'> Comment</p><p style='color:black;margin-top:-5px'> " . $row["comment"]."<p style='color:yellow;margin-top:-5px'>".$row["timestamp"]. "</p></p></div> ";
    }
} else {
    echo "Be the first to add a review";
}
 $conn->close();
 ?> 