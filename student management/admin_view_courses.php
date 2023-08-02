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
$sql = "SELECT * from course";
$result = mysqli_query($data, $sql);
if ($_GET['course_id']) {
    $t_id = $_GET['course_id'];
    $sql2 = "DELETE from course where id='$t_id' ";
    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        $_SESSION['message'] = 'Delete course is successful';
        header("location:admin_view_courses.php");
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
        .table_th {
            padding: 20px;
            font-size: 15px;
        }

        .table_td {
            padding: 20px;
            background-color: skyblue;
        }
    </style>

</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>View All couses Data</h1><br><br>

            <table border="1px">
                <tr>
                    <th class="table_th">Course Name</th>

                    <th class="table_th">Image</th>
                    <th class="table_th">Delete</th>
                </tr>
                <?php
                while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="table_td">
                            <?php echo "{$info['names']}" ?>
                        </td>

                        <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['images']}" ?>"> </td>
                        <td class="table_td">
                            <?php
                            echo "<a class='btn btn-danger' onclick=\"javascript:return confirm('Are Your Sure to Delete This'); \"
                             href='admin_view_courses.php?course_id={$info['id']}'> Delete</a>";
                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </div>
</body>

</html>