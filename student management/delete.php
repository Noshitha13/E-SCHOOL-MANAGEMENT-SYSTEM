<?php
session_start();
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);
if ($_GET['student_id']) {
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM user where id='$user_id' ";

    $result = mysqli_query($data, $sql);
    if ($result) {
        $_SESSION['message'] = 'Delete student is successful';
        header("location:view_student.php");
    }
}
