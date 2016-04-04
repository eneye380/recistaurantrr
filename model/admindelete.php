<?php

require '../database/db_connection_info.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = "";
    $placeid = "";
    if (isset($_POST['admine']) && isset($_POST['adminid'])) {
        $email = $_POST['email'];
        $placeid = $_POST['placeid'];
    } else {
        die("empty fields: POST");
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $email = "";
    $placeid = "";
    if (isset($_GET['admine']) && isset($_GET['adminid'])) {
        $email = $_GET["admine"];
        $placeid = $_GET["adminid"];
    } else {
        die("empty fields: GET ");
    }
}


$conn = new mysqli($localhost, $username, $password, $db);

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sqll = "SELECT * FROM comment_userview WHERE placeid = '$placeid' AND email = '$email'";
$result = $conn->query($sqll);
if ($result->num_rows > 1) {
    $sql = "DELETE FROM comment_adminview WHERE placeid = '$placeid' AND email = '$email'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:yellow'>deleted</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    die("Has been deleted" . $conn->connect_error);
}
$conn->close();
?>