<?php
session_start();

if (isset($_POST["muahang"])) {
    $_SESSION["tensp"] = $_POST["tensp"];
    $_SESSION["gia"] = $_POST["gia"];
    
    header("Location: thongtinkh.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Website Bán Hàng</title>
    <link rel="stylesheet" href="./style3.css">
</head>
<body>
    <div class="container" style="width: 700px;">
        <div class="header">DANH SÁCH SẢN PHẨM</div>
        <div class="content">
            <div class="product-grid">
                
                <div class="product-item">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200" alt="Tai nghe">
                    <h3>Tai Nghe Bluetooth</h3>
                    <div class="price">500,000 đ</div>
                    <form method="post" action="">
                        <input type="hidden" name="tensp" value="Tai Nghe Bluetooth">
                        <input type="hidden" name="gia" value="500,000 đ">
                        <button type="submit" name="muahang" class="btn-buy">Mua hàng</button>
                    </form>
                </div>

                <div class="product-item">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=200" alt="Đồng hồ">
                    <h3>Đồng Hồ Thông Minh</h3>
                    <div class="price">1,200,000 đ</div>
                    <form method="post" action="">
                        <input type="hidden" name="tensp" value="Đồng Hồ Thông Minh">
                        <input type="hidden" name="gia" value="1,200,000 đ">
                        <button type="submit" name="muahang" class="btn-buy">Mua hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>