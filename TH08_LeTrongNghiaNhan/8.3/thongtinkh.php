<?php
session_start();

if (!isset($_SESSION["tensp"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["thanhtoan"])) {
    $_SESSION["tenkh"] = $_POST["tenkh"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["diachi"] = $_POST["diachi"];
    $_SESSION["sodt"] = $_POST["sodt"];
    
    header("Location: thanhtoan.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Khách Hàng</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>
    <div class="container">
        <div class="header">THÔNG TIN KHÁCH HÀNG</div>
        <form method="post" action="" class="content">
            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" name="tenkh" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="diachi" required>
            </div>
            <div class="form-group">
                <label>Điện thoại</label>
                <input type="text" name="sodt" required>
            </div>
            <div class="text-center">
                <button type="submit" name="thanhtoan" class="btn-submit">Thanh toán</button>
            </div>
        </form>
    </div>
</body>
</html>