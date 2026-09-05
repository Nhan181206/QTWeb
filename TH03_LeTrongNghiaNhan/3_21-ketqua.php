<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Tính Cos(x)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 420px;
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
        .form-group {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label { width: 45%; font-size: 15px; }
        .form-group input {
            width: 50%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #eee;
            border: 1px solid #ccc;
        }
        .error { color: red; text-align: center; }
        .back-btn { text-align: center; margin-top: 15px; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="title">KẾT QUẢ TÍNH COS(X)</div>

    <?php
    if (isset($_POST['submit'])) {
        $x = $_POST['x'];
        $n = $_POST['n'];

        if (!is_numeric($x) || !is_numeric($n) || (int)$n != $n || (int)$n < 1) {
            echo "<p class='error'>Lỗi: x phải là số và n phải là số nguyên dương (n >= 1)!</p>";
        } else {
            $x = (float)$x;
            $n = (int)$n;

            // Khởi tạo các giá trị ban đầu cho Cos(x) tại i = 0
            $cos = 1;
            $tu_so = 1;
            $mau_so = 1;

            // Vòng lặp i chạy từ 1 đến n
            for ($i = 1; $i <= $n; $i++) {
                $tu_so = -$tu_so * pow($x, 2);
                $mau_so = $mau_so * (2 * $i - 1) * (2 * $i);
                $cos = $cos + ($tu_so / $mau_so);
            }
            ?>

            <div class="form-group">
                <label>Góc x (Radian):</label>
                <input type="text" readonly value="<?php echo $x; ?>">
            </div>

            <div class="form-group">
                <label>Số bước lặp n:</label>
                <input type="text" readonly value="<?php echo $n; ?>">
            </div>

            <div class="form-group">
                <label>Giá trị Cos(x):</label>
                <input type="text" readonly value="<?php echo number_format($cos, 6); ?>">
            </div>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tinhcosx.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_21-tinhcos.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>