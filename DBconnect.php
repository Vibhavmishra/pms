<?php

$host = "localhost:3306";
$userName = "root";
$password = "root";
$dbName = "pms";
$conn = mysqli_connect($host, $userName, $password, $dbName) or die('echo "Connection Error";');
?>