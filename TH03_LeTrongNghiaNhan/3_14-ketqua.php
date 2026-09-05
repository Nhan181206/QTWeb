<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Tính Tổng S(n)</title>
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
            font-size: 17px;
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
        .form-group label { width: 35%; font-size: 15px; }
        .form-group input {
            width: 60%;
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
    <div class="title">KẾT QUẢ TÍNH TỔNG S(n)</div>

    <?php
    if (isset($_POST['submit'])) {
        $x = $_POST['x'];
        $n = $_POST['n'];

        if (!is_numeric($x) || !is_numeric($n) || (int)$n != $n || (int)$n <= 0) {
            echo "<p class='error'>Lỗi: x phải là số và n phải là số nguyên dương (n > 0)!</p>";
        } else {
            $x = (float)$x;
            $n = (int)$n;
            $S = 0;

            // Vòng lặp for tính tổng S(n) = x*2 + x*4 + ... + x*2n
            for ($i = 1; $i <= $n; $i++) {
                $S += $x * (2 * $i);
            }
            ?>

            <div class="form-group">
                <label>Giá trị x:</label>
                <input type="text" readonly value="<?php echo $x; ?>">
            </div>

            <div class="form-group">
                <label>Giá trị n:</label>
                <input type="text" readonly value="<?php echo $n; ?>">
            </div>

            <div class="form-group">
                <label>Tổng S(n):</label>
                <input type="text" readonly value="<?php echo number_format($S); ?>">
            </div>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang nhập liệu!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_14-tinhtongS(n).php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>