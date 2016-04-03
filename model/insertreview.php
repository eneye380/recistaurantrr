<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "recistaurant_DB";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = "";
	$comment = "";
	$placeid = "";
	$name = "";
	$rating = "";
	$restaurant_name ="";
	if(isset($_POST['email'])&&isset($_POST['review_message'])&&isset($_POST['placeid'])){
		$email = $_POST['email'];
		$comment = $_POST['review_message'];
		$placeid = $_POST['placeid'];
		$name = $_POST['name'];
		$restaurant = $_POST['restaurant_name'];
		if(isset($_POST['rating'])){
			$rating = $_POST['rating'];
		}
	}else{
		echo "fill in all fields please";
	}
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$email = "";
	$comment = "";
	$placeid = "";
	$name = "";
	$rating = "";
	$restaurant = "";
	if(isset($_GET['email'])&&isset($_GET['review_message'])&&isset($_GET['placeid'])&&isset($_GET['name'])){
		$email = $_GET['email'];
		$comment = $_GET['review_message'];
		$placeid = $_GET['placeid'];
		$name = $_GET['name'];
		$restaurant = $_GET['restaurant_name'];
		if(isset($_GET['rating'])){
			$rating = $_GET['rating'];
		}
	}else{
		echo "fill in empty fields ";
	}
}


$conn = new mysqli($localhost,$username,$password,$db);

if($conn->connect_error){
	die ("connection failed". $conn->connect_error);
	
}

$sql = "INSERT INTO comment_adminview (placeid,email,name,comment,rating,restaurant_name) 
		VALUES ('$placeid','$email','$name','$comment','$rating','$restaurant');";
		
if($conn->query($sql)===TRUE){
	echo "waiting to be approved by an admin";
}else{
	echo "Error: " . $sql ."<br>".$conn->error;
}
$conn->close();

?>