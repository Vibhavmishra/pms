<?php

$host = "localhost";
$userName = "root";
$password = "root";
$dbName = "pms";
$conn = mysqli_connect($host, $userName, $password, $dbName) or die('echo "Connection Error";');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
?>