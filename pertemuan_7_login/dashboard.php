<?php 
session_start();
require('konek.php');
if(!isset($_SESSION['Login'])){
    echo"<script>window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE</title>
</head>
<body>
    <h1>selamat datang <?php echo $_SESSION['Login']['username'];?></h1>
    <button><a href="logout.php">logout</a></button>
</body>
</html>