<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$hoten = htmlspecialchars($_SESSION['hoten']);
$email = htmlspecialchars($_SESSION['email']);
$username = htmlspecialchars($_SESSION['username']);
$password = htmlspecialchars($_SESSION['password']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Đăng Nhập</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>

    <div class="box">
        <h2>KẾT QUẢ ĐĂNG NHẬP</h2>
        <table>
            <tr>
                <td class="label">Họ tên</td>
                <td><?php echo $hoten; ?></td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td class="label">Tên đăng nhập</td>
                <td><?php echo $username; ?></td>
            </tr>
            <tr>
                <td class="label">Mật khẩu</td>
                <td><?php echo $password; ?></td>
            </tr>
        </table>
        
        <div class="links">
            <a href="tieptuc.php">Tiếp tục</a>
            <a href="logout.php">Thoát</a>
        </div>
    </div>

</body>
</html>