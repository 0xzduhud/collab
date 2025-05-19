<?php
$host = "localhost";
$user = "root";
$pass = "220905";
$db = "project_pwd";

$conn = mysqli_connect($host,$user,$pass,$db);

if($conn->connect_error) {
    die('maaf mas' . $conn->connect_error);
}

?>