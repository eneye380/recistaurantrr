<?php session_start(); ?>


<?php
require '../database/db_connection_info.php';

$conn = new mysqli($localhost, $username, $password, $db);

$users = array("Inyene" => "1412183",
    "Stuart" => "1104106",
    "Abdul" => "1409777");

//$users['admin'] = ('adminadmin');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    //header("Location: admin1.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = $_POST["password"];

    foreach ($users as $key => $value) {
        if ($value == $password) {
            $_SESSION["logon"] = $key;
            gotoD();
             
        }
    }
    die('not ok');


    //$_POST["password"] = "eneyestaurt";
}

function gotoD() {
    die ('ok');
}
?>
