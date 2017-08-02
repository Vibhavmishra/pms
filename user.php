<?php

include 'DBconnect.php';



function deleteUser($id) {
        global $conn;
        $q="DELETE from user where id='$id'";
        $response = mysqli_query($conn, $q);
        if (!$response) {
            echo "Error data is not deleted";
        } else {
            echo "done";
        }
    }
    function updateUser($id) {
        global $conn;
        $q="UPDATE user SET name='Ankur' where id='$id'";
        $response = mysqli_query($conn, $q);
        if (!$response) {
            echo "Error data is not updated";
        } else {
            echo "done";
        }
    }
    $method = $_SERVER['REQUEST_METHOD'];
if ("GET" == $method) {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    getUser($id);
} else{
    getAllUsers();
}
    
} elseif ("POST" == $method) {
    createUser();
} elseif ("PUT" == $method) {
     $id = $_GET['id'];
    updateUser($id);
} elseif ("DELETE" == $method) {
    $id = $_GET['id'];
    deleteUser($id);
}

function getAllUsers() {
    global $conn;
    $q = "SELECT * FROM user";
    $response = mysqli_query($conn, $q);
    if (!$response) {
        echo "error in getting all";
    } else {
        $rows = [];
        while ($row = mysqli_fetch_array($response)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
}

function getUser($id) {
    global $conn;
    $q = "SELECT name FROM user where id ='$id'";
    $response = mysqli_query($conn, $q);
    if (!$response) {
        echo "error in getting all";
    } else {
        $rows = [];
        while ($row = mysqli_fetch_array($response)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }
}

function createUser() {
    global $conn;
    print_r(json_encode($_POST));
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $companyname = $_POST['companyname'];
        $q1 = "INSERT INTO address(city, state) VALUES('" . $city . "','" . $state . "')";
        if(mysqli_query($conn, $q1==true)){
            $last_id = mysqli_insert_id($conn);
        }
        $q2 = "INSERT INTO user(name,mobile,email,password,companyId, aid) VALUES('" . $name . "','" . $mobile . "','" . $email . "','" . $password . "','" . $companyname . "', '" . $last_id . "')";
        $response = mysqli_query($conn, $q2);
        if (!$response) {
            echo "error in inserting";
        } else {
            echo "done";
        }
    }

    

    

}

?>