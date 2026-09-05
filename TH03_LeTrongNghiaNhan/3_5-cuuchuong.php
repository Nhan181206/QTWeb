<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng Cửu Chương</title>
    <style>
        /* Khung viền ngoài màu xanh dương */
        .main-box {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 350px;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }
        /* Tiêu đề màu xanh lá nhạt đậm */
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        /* Căn chỉnh các dòng trong form */
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .form-group label {
            font-weight: 500;
        }
        .form-group input[type="number"] {
            width: 140px;
            padding: 4px;
            box-sizing: border-box;
        }
        /* Ghi chú dưới ô nhập */
        .note {
            font-size: 13px;
            margin-bottom: 15px;
            text-align: left;
        }
        /* Nút Submit */
        .btn-submit {
            text-align: center;
        }
        .btn-submit input {
            background-color: #e0e0e0;
            border: 1px solid #adadad;
            padding: 5px 12px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-submit input:hover {
            background-color: #d4d4d4;
        }
        /* Khu vực hiển thị bảng cửu chương */
        .result-box {
            margin-top: 20px;
            border-top: 1px dashed #ccc;
            padding-top: 15px;
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="main-box">
    <div class="title">BẢNG CỬU CHƯƠNG</div>

    <!-- Form gửi dữ liệu về lại chính trang cuuchuong.php -->
    <form action="3_5-inbancuuchuong.php" method="POST">
        <div class="form-group">
            <label for="n">Nhập số n</label>
            <input type="number" id="n" name="n" min="1" max="10" required value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>">
        </div>

        <div class="note">
            n là số nguyên dương, có giá trị từ 1 đến 10
        </div>

        <div class="btn-submit">
            <input type="submit" name="submit" value="In Bảng Cửu Chương">
        </div>
    </form>

    <!-- Đoạn xử lý PHP xuất kết quả -->
    <?php
    if (isset($_POST['submit'])) {
        $n = (int)$_POST['n'];

        if ($n >= 1 && $n <= 10) {
            echo "<div class='result-box'>";
            echo "<b>BẢNG CỬU CHƯƠNG $n</b><br><br>";
            
            // Vòng lặp tính và in ra bảng cửu chương
            for ($i = 1; $i <= 10; $i++) {
                $ket_qua = $n * $i;
                echo "$n x $i = $ket_qua<br>";
            }

            echo "</div>";
        } else {
            echo "<p style='color:red; text-align:center; margin-top:10px;'>Vui lòng nhập n từ 1 đến 10!</p>";
        }
    }
    ?>
</div>

</body>
</html>