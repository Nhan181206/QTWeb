<?php 
    $username = '';
    $password = '';
    $kq = '';

    if(isset($_POST['thuchien'])){
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $dungusername = 'abc';
        $dungpassword = '123';

        if($username !== '' && $password !== ''){
            if($username === $dungusername && $password === $dungpassword){
                $kq = "Đăng nhập thành công.";
            } else {
                $kq = "Username hoặc password không chính xác.";
            }
        } else {
            $kq = "Vui lòng nhập đầy đủ thông tin!";
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
                    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập password:</td>
                <td>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
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