<?php
$userName = "root";
$password = "root";
$dbName = "pms";
$conn = mysqli_connect("localhost", $userName, $password, $dbName) or die('echo "Connection Error";');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
echo "db connected";

print_r(json_encode($_POST));
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $companyname = $_POST['companyname'];
    $q = "INSERT INTO user(name,mobile,email,password,companyId) VALUES('" . $name . "','" . $mobile . "','" . $email . "','" . $password . "','" . $companyname . "')";
    echo $q;
    $response = mysqli_query($conn, $q);
    if (!$response) {
        echo "error in inserting";
    } else {
        echo "done";
    }
}
?>