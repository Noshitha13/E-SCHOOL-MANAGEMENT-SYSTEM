<?php

session_start();
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);
if ($data === false) {
    die("connection error");
}
if (isset($_POST['apply'])) {
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];
    $sql = "INSERT INTO admission(names,email,phone,messages) 
    VALUES('$data_name','$data_email','$data_phone','$data_message')";
    $result = mysqli_query($data, $sql);
    if ($result) {
        $_SESSION['message']="your application sent successful";
        header("location:index.php");
    } else {
        echo "apply failed";
    }
}
