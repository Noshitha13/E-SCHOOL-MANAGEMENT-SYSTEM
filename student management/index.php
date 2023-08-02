<?php
error_reporting(0);
session_start();
session_destroy();
if ($_SESSION['message']) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
   alert('$message');
   </script>";
}
$servername = "localhost";
$user = "root";
$password = "root";
$db = "schoolproject";
$data = mysqli_connect($servername, $user, $password, $db);
$sql = "SELECT * from teacher";
$result = mysqli_query($data, $sql);
$sql1 = "SELECT * from course";
$result1 = mysqli_query($data, $sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student management system</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <label class="logo">W-school</label>
        <ul>
            <li><a href=" ">Home</a></li>
            <li><a href=" ">Contact</a></li>
            <li><a href=" ">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>

        </ul>
    </nav>
    <div class="section1">
        <label class="img_txt">We teach students with care</label>
        <img class="mai" src="./project_Image/project_Image/school_management.jpg">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="wel" src="./project_Image/project_Image/school2.jpg">
            </div>
            <div class="col-md-8">
                <h1>Welcome To W-school</h1>
                <p>Online education is a growing trend in the world. It has been around for decades but it is now becoming more and more popular. Online education is a great way to learn new things and to improve your skills. It can be used as an alternative to traditional classroom learning, or as a supplement to it.We proudly stand as the 1st English medium school in India to adopt online learning ,drawing together students in a vibrant,accademically challenging and encouraging environment where manifold viewpoints are prized and celebrated.
                </p>
            </div>
        </div>
    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['images']}" ?>">
                    <h3><?php echo "{$info['names']}" ?></h3>
                    <h5><?php echo "{$info['descriptions']}" ?></h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <center>
        <h1>Our Courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <?php
            while ($info = $result1->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['images']}" ?>">
                    <h3><?php echo "{$info['names']}" ?></h3>
a
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <center>
        <h1 class="adi">Admission Form</h1>
    </center>
    <div align="center" class="admi">
        <form action="data_check.php" method="POST">
            <div class="admin">
                <label class="labelt">Name</label>
                <input class="inp" type="text" name="name">
            </div>
            <div class="admin">
                <label class="labelt">Email</label>
                <input class="inp" type="email" name="email">
            </div>
            <div class="admin">
                <label class="labelt">Phone</label>
                <input class="inp" type="text" name="phone">
            </div>
            <div class="admin">
                <label class="labelt">Message</label>
                <textarea class="inptx" name="message"></textarea>
            </div>
            <div class="admin">

                <input class="btn btn-primary" type="submit" value="Apply" id="submit" name="apply">
            </div>
        </form>
    </div>
    <footer>
        <h3 class="footxt">All @copyright reserved by w-school</h3>
    </footer>
</body>

</html>