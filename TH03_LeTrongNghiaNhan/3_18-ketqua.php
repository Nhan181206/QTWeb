<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả In Tam Giác Cân</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 450px;
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
            letter-spacing: 2px;
            text-align: center;
            margin: 20px 0;
            white-space: pre;
        }
        .info {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        .error { color: red; text-align: center; }
        .back-btn { text-align: center; margin-top: 15px; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="title">KẾT QUẢ IN TAM GIÁC CÂN</div>

    <?php
    if (isset($_POST['submit'])) {
        $h = $_POST['h'];
        $loai = $_POST['loai'];

        // Kiểm tra hợp lệ dữ liệu
        if (!is_numeric($h) || (int)$h <= 0) {
            echo "<p class='error'>Lỗi: Chiều cao phải là số nguyên dương lớn hơn 0!</p>";
        } else {
            $h = (int)$h;
            $day = 2 * $h - 1;

            echo "<div class='info'>Chiều cao: $h | Cạnh đáy tương ứng: $day</div>";
            echo "<div class='tamgiac-display'>";

            // Vòng lặp vẽ tam giác cân
            for ($i = 1; $i <= $h; $i++) {
                // In khoảng trắng phía trước
                for ($j = 1; $j <= $h - $i; $j++) {
                    echo " ";
                }

                // In kí tự sao (*)
                for ($j = 1; $j <= 2 * $i - 1; $j++) {
                    if ($loai == 'dac') {
                        echo "*";
                    } else { // Trường hợp in rỗng
                        if ($i == $h || $j == 1 || $j == 2 * $i - 1) {
                            echo "*";
                        } else {
                            echo " ";
                        }
                    }
                }
                echo "<br>";
            }

            echo "</div>";
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tamgiaccan.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_18-tamgiaccan.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>