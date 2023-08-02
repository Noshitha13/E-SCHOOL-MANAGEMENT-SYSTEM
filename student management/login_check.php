<?php
error_reporting(0);
session_start();
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);
if ($data === false) {
    die("connection error");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "select *from user where username='" . $name . "' and passwords='" . $pass . "' ";
    echo $sql;
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);
    if ($row["usertype"] == "student") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";

        header("location:studenthome.php");
    } elseif ($row["usertype"] == "admin") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";

        header("location:adminhome.php");
    } else {

        $message = "username or password do not match";
        $_SESSION['loginMessage'] = $message;
        header("location:login.php");
    }
}
