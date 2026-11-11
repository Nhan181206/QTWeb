<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === '123') {
        $_SESSION['user'] = $username;
        header("Location: quanly.php");
        exit();
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="header-banner">
        <a href="index.php">
            ỦY BAN NHÂN DÂN TỈNH ĐỒNG NAI<br>
            <span>TRƯỜNG CAO ĐẲNG KỸ THUẬT CÔNG NGHỆ ĐỒNG NAI</span><br>
            DONG NAI VOCATIONAL COLLEGE<br>
            <b>NHẤT NGHỆ TINH - NHẤT THÂN VINH</b>
        </a>
    </div>

    <h2 class="title">ĐĂNG NHẬP</h2>

    <?php if ($error !== ''): ?>
        <div style="text-align: center; color: red; font-weight: bold; margin-bottom: 10px;"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <table class="login-table">
            <tr>
                <td align="right" style="width: 40%; font-weight: bold;">Tên đăng nhập</td>
                <td><input type="text" name="username" required style="width: 90%;"></td>
            </tr>
            <tr>
                <td align="right" style="font-weight: bold;">Mật khẩu</td>
                <td><input type="password" name="password" required style="width: 90%;"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-top: 15px;">
                    <input type="submit" value="Đăng nhập" class="btn">
                    <a href="index.php" class="btn" style="text-decoration: none; padding: 4px 10px; margin-left: 5px;">Trang chủ</a>
                </td>
            </tr>
        </table>
    </form>

    <div class="footer-banner">
        SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br>
        Trường Cao Đẳng kỹ Thuật Công Nghệ Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </div>

</body>
</html>