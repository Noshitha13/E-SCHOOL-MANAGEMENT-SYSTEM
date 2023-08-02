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

if (isset($_POST['add_course'])) {
    $c_name = $_POST['name'];

    $file = $_FILES['image']['name'];
    $dstt = "./image1/" . $file;
    $dst_dbb = "image1/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dstt);
    $sql = "INSERT into course(names,images) VALUES('$c_name','$dst_dbb')";
    $result = mysqli_query($data, $sql);
    if ($result) {
        header('location:admin_add_course.php');
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
</head>
<style type="text/css">
    .div_deg {
        background-color: skyblue;
        padding-top: 70px;
        padding-bottom: 70px;
        width: 500px;
    }
</style>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Add Course</h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Course Name</label>
                        <input type="text" name="name">
                    </div>

                    <br>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                    <br>
                    <div>

                        <input class="btn btn-primary" type="submit" name="add_course" value="Add Course">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>