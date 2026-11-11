<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === '123') {
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;

        header("Location: page-2.php");
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
    <link rel="stylesheet" href="./style1.css">
</head>
<body>

    <?php if ($error !== ''): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <table class="login-table">
            <tr>
                <th colspan="2" class="login-title">Đăng Nhập</th>
            </tr>
            <tr>
                <td class="login-label" align="right">Tài khoản:</td>
                <td class="login-input"><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td class="login-label" align="right">Mật khẩu:</td>
                <td class="login-input"><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" class="login-submit">
                    <input type="submit" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>