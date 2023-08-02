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
if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];
    $sql = "SELECT * from teacher where id='$t_id'";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}

if (isset($_POST['update_teacher'])) {
    $id = $_POST['id'];
    $t_name = $_POST['name'];
    $t_des = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    if ($file) {
        $query = "UPDATE teacher SET names='$t_name',descriptions='$t_des',images='$dst_db' WHERE id='$id'";
    } else {
        $query = "UPDATE teacher SET names='$t_name',descriptions='$t_des' WHERE id='$id'";
    }
    $result2 = mysqli_query($data, $query);
    if ($result2) {
        header('location:admin_view_teacher.php');
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
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form_deg {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 600px;

        }
    </style>


</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Update Teacher data</h1><br>


            <form action="#" method="POST" class="form_deg" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php
                                                    echo "{$info['id']}"
                                                    ?>" hidden>
                <div>
                    <label>Teacher Name</label>
                    <input type="text" name="name" value="<?php
                                                            echo "{$info['names']}"
                                                            ?>">
                </div>
                <div>
                    <label>About Teacher</label>
                    <textarea name="description">
                    <?php
                    echo "{$info['descriptions']}"
                    ?>
                    </textarea>
                </div>
                <div>
                    <label> Teacher old Image</label>
                    <img width="100px" height="100px" src="<?php
                                                            echo "{$info['images']}"
                                                            ?>">
                </div>
                <div>
                    <label> Choose Teacher New Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input class="btn btn-success" type="submit" name="update_teacher" value="update">
                </div>
            </form>


        </center>
    </div>
</body>

</html>