<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location:login.php");
}
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);

$name = $_SESSION['username'];
$sql = "SELECT * from user where username='$name' ";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {

    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $query = "UPDATE user SET email='$s_email',phone='$s_phone',passwords='$s_password' WHERE username='$name' ";
    $result2 = mysqli_query($data, $query);
    if ($result2) {
        header('location:student_profile.php');
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

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>


</head>

<body>
    <?php
    include 'student_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Update Profile</h1><br><br>
            <form action="#" method="POST">
                <div class="div_deg">
                    <div>

                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="<?php
                                                                    echo "{$info['email']}"
                                                                    ?>">
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="number" name="phone" value="<?php
                                                                        echo "{$info['phone']}"
                                                                        ?>">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="text" name="password" value="<?php
                                                                        echo "{$info['passwords']}"
                                                                        ?>">
                        </div>
                        <div>
                            <input class="btn btn-primary" type="submit" name="update_profile" value="update">
                        </div>
                    </div>
            </form>
        </center>
    </div>
</body>

</html>