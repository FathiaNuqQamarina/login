<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "login_data";

    $conn = mysqli_connect($server, $user, $password, $db_name);

    if(!$conn){
        die("gagal konek ke database :".mysqli_connect_error());
    }