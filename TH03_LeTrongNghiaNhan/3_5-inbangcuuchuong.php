<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Bảng Cửu Chương</title>
    <style>
        .result-box {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 300px;
            margin: 30px auto;
            font-family: Arial, sans-serif;
            text-align: center;
            line-height: 1.8;
            font-size: 16px;
        }
        .title {
            color: #1b5e20;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: #337ab7;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="result-box">
    <?php
    if (isset($_POST['n'])) {
        $n = (int)$_POST['n'];

        if ($n >= 1 && $n <= 10) {
            echo "<div class='title'>BẢNG CỬU CHƯƠNG $n</div>";

            // Vòng lặp in ra 10 dòng của bảng cửu chương
            for ($i = 1; $i <= 10; $i++) {
                $ket_qua = $n * $i;
                echo "$n x $i = $ket_qua<br>";
            }
        } else {
            echo "<p style='color:red;'>Giá trị n phải từ 1 đến 10!</p>";
        }
    } else {
        echo "<p>Không tìm thấy dữ liệu gửi lên.</p>";
    }
    ?>
    <br>
    <a href="3_5-cuuchuong.php">Quay lại</a>
</div>

</body>
</html>