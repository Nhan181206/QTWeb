<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Xếp Loại Học Sinh</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .form-group {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label { width: 30%; }
        .form-group input { width: 65%; padding: 5px; box-sizing: border-box; }
        .btn-center { text-align: center; margin-top: 15px; }
        .btn-center input { padding: 6px 15px; cursor: pointer; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
        .result-box {
            margin-top: 20px;
            border-top: 1px dashed #ccc;
            padding-top: 15px;
            line-height: 1.8;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="title">XẾP LOẠI HỌC SINH</div>

    <form action="3_6-bangxeploai.php" method="POST">
        <div class="form-group">
            <label for="hoten">Họ tên:</label>
            <input type="text" id="hoten" name="hoten" value="<?php echo isset($_POST['hoten']) ? htmlspecialchars($_POST['hoten']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="diem">Điểm:</label>
            <input type="text" id="diem" name="diem" value="<?php echo isset($_POST['diem']) ? htmlspecialchars($_POST['diem']) : ''; ?>">
        </div>

        <div class="btn-center">
            <input type="submit" name="submit" value="Xếp Loại">
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $hoten = trim($_POST['hoten']);
        $diem = trim($_POST['diem']);
        $errors = array();

        // 1. Kiểm tra lỗi bỏ trống
        if (empty($hoten)) {
            $errors[] = "Vui lòng nhập Họ tên.";
        }
        if ($diem === '') {
            $errors[] = "Vui lòng nhập Điểm.";
        } 
        // 2. Kiểm tra lỗi nhập không phải dạng số hoặc số âm/quá 10
        else if (!is_numeric($diem)) {
            $errors[] = "Điểm phải là dữ liệu dạng số.";
        } else {
            $diem = (float)$diem;
            if ($diem < 0 || $diem > 10) {
                $errors[] = "Điểm phải nằm trong khoảng từ 0 đến 10.";
            }
        }

        // Hiển thị thông báo lỗi nếu có
        if (!empty($errors)) {
            echo "<div class='result-box'>";
            foreach ($errors as $err) {
                echo "<p class='error'>• $err</p>";
            }
            echo "</div>";
        } else {
            // 3. Tính Kết quả (Đạt / Không đạt)
            if ($diem >= 5) {
                $ket_qua = "Đạt";
            } else {
                $ket_qua = "Không đạt";
            }

            // 4. Tính Xếp loại
            if ($diem >= 9 && $diem <= 10) {
                $xep_loai = "Giỏi";
            } else if ($diem >= 7 && $diem < 9) {
                $xep_loai = "Khá";
            } else if ($diem >= 5 && $diem < 7) {
                $xep_loai = "Trung bình";
            } else {
                $xep_loai = "Yếu";
            }

            // 5. In ra thông tin kết quả
            echo "<div class='result-box'>";
            echo "<b>KẾT QUẢ XẾP LOẠI</b><br>";
            echo "Họ tên: <b>" . htmlspecialchars($hoten) . "</b><br>";
            echo "Điểm: <b>$diem</b><br>";
            echo "Kết quả: <b>$ket_qua</b><br>";
            echo "Xếp loại: <b>$xep_loai</b><br>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>