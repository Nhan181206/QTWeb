<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlxemay";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Lệnh thiết lập tiếng việt khi thao tác với cơ sở dữ liệu MySQL
mysqli_set_charset($conn, "utf8");
?>
