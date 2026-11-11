<?php
session_start();

if (!isset($_SESSION["tenkh"])) {
    header("Location: thongtinkh.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Thanh Toán</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>
    <div class="container">
        <div class="header">KẾT QUẢ THANH TOÁN</div>
        <div class="content">
            <table class="table-info">
                <tr>
                    <th>Tên khách hàng</th>
                    <td><?php echo htmlspecialchars($_SESSION["tenkh"]); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($_SESSION["email"]); ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><?php echo htmlspecialchars($_SESSION["diachi"]); ?></td>
                </tr>
                <tr>
                    <th>Điện thoại</th>
                    <td><?php echo htmlspecialchars($_SESSION["sodt"]); ?></td>
                </tr>
                <tr>
                    <th>Sản phẩm mua</th>
                    <td><b><?php echo htmlspecialchars($_SESSION["tensp"]); ?></b></td>
                </tr>
                <tr>
                    <th>Số tiền</th>
                    <td><span style="color: #d9534f; font-weight: bold;"><?php echo htmlspecialchars($_SESSION["gia"]); ?></span></td>
                </tr>
            </table>
            
            <div class="text-center">
                <a href="index.php" class="btn-submit" style="background-color: #007bff;">Tiếp tục mua hàng</a>
            </div>
        </div>
    </div>
</body>
</html>