<?php 
 require 'konek.php';

 if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cPassword = $_POST['confirm_password'];
    $nama = $_POST['nama'];

    if($password === $cPassword){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
        if(mysqli_fetch_assoc($hasil)){
        echo"<script>
        alert('username telah digunakan!');
        doucument.location.herf = 'register.php';
        </script>";
        }else{
            $push_data = mysqli_query($conn,"INSERT INTO user (username,nama,password) 
                            VALUES('$username','$nama','$password')");
            if(mysqli_affected_rows($conn) > 0){
                echo"<script>
                alert('Registrasi Berhasil');
                doucument.location.herf = 'register.php';
                </script>";
            }else{
                echo"<script>
                alert('Registrasi GAGAL');
                doucument.location.herf = 'register.php';
                </script>";
            }
        }

    }else{
        echo"<script>
        alert('password yang anda masukkan berbeda');
        doucument.location.herf = 'register.php';
        </script>";
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        .inputan{
            margin-left: 25px;
        }
    </style>
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" class="inputan" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="text" name="password" class="inputan" placeholder="Password" required></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Konfirmasi Password</label></td>
                <td><input type="text" name="confirm_password" class="inputan" placeholder="Confirmasi Password" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" class="inputan" placeholder="Nama" required></td>
            </tr>
            <tr>
                <td><button name="register">Kirim</button></td>
            </tr>
        </table>
    </form>
</body>
</html>