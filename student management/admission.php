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
$sql = "select * from admission";
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
</head>

<body>

    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Applied For Admission</h1><br><br>
            <table border="1px">
                <tr>
                    <th style="padding:20px;font-size:15px;">Name</th>
                    <th style="padding:20px;font-size:15px;">Email</th>
                    <th style="padding:20px;font-size:15px;">Phone</th>
                    <th style="padding:20px;font-size:15px;">Message</th>
                </tr>
                <?php
                while ($info = $result->fetch_assoc()) {


                ?>
                    <tr>
                        <td style="padding:20px;">
                            <?php echo "{$info['names']}"; ?>
                        </td>
                        <td style="padding:20px;">
                            <?php echo "{$info['email']}"; ?>
                        </td>
                        <td style="padding:20px;">
                            <?php echo "{$info['phone']}"; ?>
                        </td>
                        <td style="padding:20px;">
                            <?php echo "{$info['messages']}"; ?>
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