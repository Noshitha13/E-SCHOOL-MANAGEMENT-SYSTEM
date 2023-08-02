<?php
session_start();
error_reporting(0);
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
$id = $_GET['student_id'];
$sql = "SELECT * FROM user where id='$id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "UPDATE user SET username='$name',email='$email',phone='$phone',passwords='$password' WHERE id='$id'";
    $result2 = mysqli_query($data, $query);
    if ($result2) {
        header("location:view_student.php");
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
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 400px;

        }
    </style>


</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Update Student</h1><br>
            <div class="div_deg">

                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" value="<?php
                                                                echo "{$info['username']}"; ?>">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php
                                                                echo "{$info['email']}"; ?>">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" value="<?php
                                                                    echo "{$info['phone']}"; ?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password" value="<?php
                                                                    echo "{$info['passwords']}"; ?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="update">
                    </div>
                </form>

            </div>
        </center>
    </div>
</body>

</html>