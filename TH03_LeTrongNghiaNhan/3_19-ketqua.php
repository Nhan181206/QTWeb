<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Tính Số Pi</title>
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
    <div class="title">KẾT QUẢ TÍNH SỐ PI</div>

    <?php
    if (isset($_POST['submit'])) {
        $n = $_POST['n'];

        if (!is_numeric($n) || (int)$n != $n || (int)$n < 0) {
            echo "<p class='error'>Lỗi: n phải là số nguyên không âm (n >= 0)!</p>";
        } else {
            $n = (int)$n;
            $sum = 0;

            // Vòng lặp tính chuỗi 1 - 1/3 + 1/5 - 1/7 + ... + (-1)^n / (2n + 1)
            for ($i = 0; $i <= $n; $i++) {
                $sum += pow(-1, $i) / (2 * $i + 1);
            }

            // Tính giá trị Pi = 4 * sum
            $pi = 4 * $sum;
            ?>

            <div class="form-group">
                <label>Số n đã nhập:</label>
                <input type="text" readonly value="<?php echo $n; ?>">
            </div>

            <div class="form-group">
                <label>Giá trị Số Pi (π):</label>
                <input type="text" readonly value="<?php echo $pi; ?>">
            </div>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập n từ trang tinhpi.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_19-tinhsopi.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>