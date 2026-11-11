<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['hoten'] = trim($_POST['hoten'] ?? '');
    $_SESSION['email'] = trim($_POST['email'] ?? '');
    $_SESSION['username'] = trim($_POST['username'] ?? '');
    $_SESSION['password'] = trim($_POST['password'] ?? '');

    header("Location: ketqua.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Đăng Nhập</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>

    <div class="box">
        <h2>THÔNG TIN ĐĂNG NHẬP</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td class="label">Họ tên</td>
                    <td class="input-box"><input type="text" name="hoten" required></td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="input-box"><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td class="label">Tên đăng nhập</td>
                    <td class="input-box"><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td class="label">Mật khẩu</td>
                    <td class="input-box"><input type="password" name="password" required></td>
                </tr>
            </table>
            <div class="btn-submit">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>

</body>
</html>