<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả In Hình Chữ Nhật</title>
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
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }
        .hcn-display {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            font-weight: bold;
            line-height: 1.2;
            letter-spacing: 3px;
            text-align: center;
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
    <div class="title">IN HÌNH CHỮ NHẬT</div>

    <?php
    if (isset($_POST['submit'])) {
        $dai = $_POST['dai'];
        $rong = $_POST['rong'];
        $loai = $_POST['loai'];

        // Kiểm tra hợp lệ dữ liệu
        if (!is_numeric($dai) || !is_numeric($rong) || (int)$dai <= 0 || (int)$rong <= 0) {
            echo "<p class='error'>Lỗi: Chiều dài và chiều rộng phải là số nguyên dương lớn hơn 0!</p>";
        } elseif ((int)$dai < (int)$rong) {
            echo "<p class='error'>Lỗi: Chiều dài phải lớn hơn hoặc bằng chiều rộng!</p>";
        } else {
            $dai = (int)$dai;
            $rong = (int)$rong;

            echo "<div class='hcn-display'>";
            
            // Vẽ hình chữ nhật
            for ($i = 1; $i <= $rong; $i++) {
                for ($j = 1; $j <= $dai; $j++) {
                    if ($loai == 'dac') {
                        echo "*";
                    } else { // Trường hợp in rỗng
                        if ($i == 1 || $i == $rong || $j == 1 || $j == $dai) {
                            echo "*";
                        } else {
                            echo " "; // Khoảng trắng bên trong
                        }
                    }
                }
                echo "<br>";
            }
            
            echo "</div>";
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang hcn.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_16-hcn.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>