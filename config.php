<?php
    $servername = "localhost";
    $username = "user";
    $password = "123456789";
    $database = "db_cepe";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if (!$conn) {
        echo "Failed to Connect to Database." . mysqli_connect_error();
    }
?>