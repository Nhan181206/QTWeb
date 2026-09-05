<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Kiểm Tra Số Nguyên Tố</title>
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
    <div class="title">KẾT QUẢ KIỂM TRA</div>

    <?php
    if (isset($_POST['submit'])) {
        $n = $_POST['n'];

        if (!is_numeric($n) || (int)$n != $n) {
            echo "<p class='error'>Lỗi: Vui lòng nhập vào một số nguyên!</p>";
        } else {
            $n = (int)$n;
            $is_sont = true;

            // Số nguyên tố phải lớn hơn 1
            if ($n < 2) {
                $is_sont = false;
            } else {
                // Kiểm tra ước số từ 2 đến sqrt(n)
                for ($i = 2; $i <= sqrt($n); $i++) {
                    if ($n % $i == 0) {
                        $is_sont = false;
                        break;
                    }
                }
            }

            $ketqua = $is_sont ? "$n là số nguyên tố" : "$n KHÔNG PHẢI là số nguyên tố";
            ?>

            <div class="form-group">
                <label>Số n đã nhập:</label>
                <input type="text" readonly value="<?php echo $n; ?>">
            </div>

            <div class="form-group">
                <label>Kết luận:</label>
                <input type="text" readonly value="<?php echo $ketqua; ?>">
            </div>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang sont.php!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_15-sont.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>