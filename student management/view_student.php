<?php
error_reporting(0);
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
$sql = "SELECT *from user where usertype='student'";
$result = mysqli_query($data, $sql);
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
            <h1>STUDENT DATA</h1>
            <?php
            if ($_SESSION['message']) {
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
            ?>
            <table border="1px" style="margin-top:50px;">
                <tr>
                    <th class="table_th">Username</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Phone</th>
                    <th class="table_th">Password</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="table_td">

                            <?php
                            echo "{$info['username']}";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "{$info['phone']}";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "{$info['email']}";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "{$info['passwords']}";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "<a class='btn btn-danger' onclick=\"javascript:return confirm('Are Your Sure to Delete This'); \"
                             href='delete.php?student_id={$info['id']}'> Delete</a>";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>";
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