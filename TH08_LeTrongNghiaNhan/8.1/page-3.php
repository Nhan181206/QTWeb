<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: dangnhap.php");
    exit();
}

$user = htmlspecialchars($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>TRANG 3</title>
    <link rel="stylesheet" href="./style1.css">
</head>
<body>

    <div class="box">
        <h2>TRANG 3</h2>
        <p>Chào mừng user đã đăng nhập: <b><?php echo $user; ?></b></p>
        
        <div class="links">
            <a href="page-2.php">Trang 2</a> | 
            <a href="logout.php">Thoát</a>
        </div>
    </div>

</body>
</html>