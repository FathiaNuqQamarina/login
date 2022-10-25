<?php
    session_start();

    require 'konek.php';

    if(isset($_POST['Login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hasil = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");

        if(mysqli_num_rows($hasil)== 1){
          $row = mysqli_fetch_assoc($hasil);
          if(password_verify($password, $row['password'])){
            $_SESSION['Login'] = $row;

            header("Location: dashboard.php");
          }else{
            $error_pass = true;

          }
        }else{
            $error_username= true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .inputan{
            margin-left: 25px;
        }
    </style>
</head>
<body>
<h1>Login</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" class="inputan" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" class="inputan" placeholder="Password" required></td>
            </tr>
            <tr>
                <td><button name="Login">Login</button></td>
            </tr>
        </table>
        <?php if (isset($error_pass)) {echo "<p>Password anda Salah</p>";} ?>
        <?php if (isset($error_username)) {echo "<p>Akun Tidak ditemukan</p>";} ?>
    </form>
</body>
</html>