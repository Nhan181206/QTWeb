<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$hoten = htmlspecialchars($_SESSION['hoten']);
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tiếp Tục Session</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>

    <h2>TIẾP TỤC SESSION</h2>

    <div class="content">
        <div class="info-row">
            <span class="label">Xin chào</span> <?php echo $hoten; ?>
        </div>
        <div class="info-row">
            <span class="label">Tên đăng nhập</span> <?php echo $username; ?>
        </div>

        <a href="logout.php" class="logout-link">Thoát</a>

        <div>
            <img src="https://zshop.vn/blogs/wp-content/uploads/2016/08/1045-1.jpg" alt="Hình ảnh minh họa" class="banner-img">
        </div>
    </div>

</body>
</html>