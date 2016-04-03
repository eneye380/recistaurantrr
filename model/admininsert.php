<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "recistaurant_DB";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = "";	
	$placeid = "";
	if(isset($_POST['admine'])&&isset($_POST['adminid'])){
		$email = $_POST['email'];		
		$placeid = $_POST['placeid'];
	}else{
		die ("empty fields: POST");
	}
}


if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$email = "";
	$placeid = "";	
	if(isset($_GET['admine'])&&isset($_GET['adminid'])){
		$email = $_GET["admine"];		
		$placeid = $_GET["adminid"];		
		
	}else{
		die ("empty fields: GET ");
	}
}


$conn = new mysqli($localhost,$username,$password,$db);

if($conn->connect_error){
	die ("connection failed". $conn->connect_error);
	
}
$sqll = "SELECT * FROM comment_userview WHERE placeid = '$placeid' AND email = '$email'";
$result = $conn->query($sqll);
if($result->num_rows > 1){
	die ("Already Exist in database".$result.connect_error);
}else{
$sql = "INSERT INTO comment_userview (placeid,name,comment,rating,timestamp) 
		SELECT placeid, name, comment, rating, timestamp FROM comment_adminview 
		WHERE placeid = '$placeid' AND email = '$email'";
		
		
if($conn->query($sql)===TRUE){
	echo "uploaded";
}else{
	echo "Error: " . $sql ."<br>".$conn->error;
}
}
$conn->close();

?>