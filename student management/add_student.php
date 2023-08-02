<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);
if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    $check = "SELECT* from user where username='$username' ";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);
    if ($row_count == 1) {
        echo "<script type='text/javascript'> 
        alert('username already exists');
       </script>";
    } else {
        $sql = "INSERT INTO user(username,email,phone,usertype,passwords) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";
        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'> 
        alert('data uploaded successful');
       </script>";
        } else {
            echo "upload failed";
        }
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .divd {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>



</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Add Student</h1>
            <div class="divd">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label>password</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="add_student" value="Add student">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>