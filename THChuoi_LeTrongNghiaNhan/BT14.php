<?php
    $nhap = '';
    $pass = '';
    $kq = '';

    $data = [
        'user1' => '123456',
        'user2' => '13579',
        'user3' => '246810'
    ];

    if(isset($_POST['thuchien'])) {
        $nhap = $_POST['nhap'] ?? '';
        $pass = $_POST['pass'] ?? '';

        if(isset($data[$nhap]) && $data[$nhap] == $pass) {
            $kq = "Đăng nhập thành công";
        } else {
            $kq = "Đăng nhập thất bại";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Username và Password</title>
    <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>KIỂM TRA USERNAME VÀ PASSWORD</h2>
        </div>
        <table>
            <tr>
                <td>Nhập username:</td>
                <td>
                    <input type="text" name="nhap" required value="<?php echo htmlspecialchars($nhap); ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập password:</td>
                <td>
                    <input type="password" name="pass" required value="<?php echo htmlspecialchars($pass); ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <input type="text" name="kq" readonly value="<?php echo htmlspecialchars($kq); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-row">
                    <button name="thuchien" class="btn">Thực hiện</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>