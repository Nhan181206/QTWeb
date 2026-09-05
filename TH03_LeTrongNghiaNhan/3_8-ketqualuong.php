<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Lương</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 420px;
            margin: 0 auto;
        }
        .title {
            color: #1b5e20;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .form-group {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group label { width: 40%; font-size: 15px; }
        .form-group input {
            width: 58%;
            padding: 4px 6px;
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
    <div class="title">BẢNG LƯƠNG</div>

    <?php
    if (isset($_POST['submit'])) {
        $hoten = trim($_POST['hoten']);
        $ngaycong = (int)$_POST['ngaycong'];
        $chucvu = $_POST['chucvu'];

        // 1. Xác định mức công nhật theo chức vụ
        switch ($chucvu) {
            case 'Giám đốc':
                $cong_nhat = 800000;
                break;
            case 'Phó giám đốc':
                $cong_nhat = 700000;
                break;
            case 'Trưởng phòng':
            case 'Phó phòng':
                $cong_nhat = 500000;
                break;
            default:
                $cong_nhat = 400000; // Nhân viên
                break;
        }

        // 2. Tính toán tiền lương
        $luong = $ngaycong * $cong_nhat;
        $bhxh = $luong * 0.1;
        $thuc_lanh = $luong - $bhxh;
        ?>

        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" readonly value="<?php echo htmlspecialchars($hoten); ?>">
        </div>

        <div class="form-group">
            <label>Chức vụ</label>
            <input type="text" readonly value="<?php echo $chucvu; ?>">
        </div>

        <div class="form-group">
            <label>Lương</label>
            <input type="text" readonly value="<?php echo number_format($luong); ?> Đồng">
        </div>

        <div class="form-group">
            <label>Bảo hiểm xã hội</label>
            <input type="text" readonly value="<?php echo number_format($bhxh); ?> Đồng">
        </div>

        <div class="form-group">
            <label>Thực lãnh</label>
            <input type="text" readonly value="<?php echo number_format($thuc_lanh); ?> Đồng">
        </div>

        <?php
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tính lương!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_8-bangluong.php">Quay lại trang tính lương</a>
    </div>
</div>
</body>
</html>