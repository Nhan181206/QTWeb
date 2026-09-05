<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả In Tam Giác Vuông Cân</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        .title {
            color: #1b5e20;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }
        .tamgiac-display {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.2;
            letter-spacing: 4px;
            margin: 20px 0;
            white-space: pre;
        }
        .error { color: red; text-align: center; }
        .back-btn { text-align: center; margin-top: 15px; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="title">KẾT QUẢ IN TAM GIÁC</div>

    <?php
    if (isset($_POST['submit'])) {
        $canh = $_POST['canh'];

        // Kiểm tra hợp lệ dữ liệu
        if (!is_numeric($canh) || (int)$canh <= 0) {
            echo "<p class='error'>Lỗi: Cạnh góc vuông phải là số nguyên dương lớn hơn 0!</p>";
        } else {
            $n = (int)$canh;

            echo "<div class='tamgiac-display'>";
            
            // Vòng lặp vẽ tam giác vuông cân rỗng theo mẫu hình minh họa
            for ($i = 1; $i <= $n; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    // In '*' tại các cạnh đường viền: cột đầu (j=1), cạnh đáy (i=n), đường chéo (j=i)
                    if ($j == 1 || $i == $n || $j == $i) {
                        echo "*";
                    } else {
                        echo " "; // Khoảng trống rỗng bên trong
                    }
                }
                echo "<br>";
            }
            
            echo "</div>";
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tamgiacvuongcan.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_17-tamgiacvuongcan.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>