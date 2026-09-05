<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hóa Đơn Tiền Điện</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box {
            border: 1.5px solid #337ab7;
            padding: 20px 30px;
            width: 480px;
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
            margin-bottom: 8px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 12px;
        }
        table, th, td { border: 1px solid #333; }
        th, td {
            padding: 6px;
            text-align: center;
            font-size: 14px;
        }
        .error { color: red; text-align: center; }
        .back-btn { text-align: center; margin-top: 15px; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="title">HÓA ĐƠN TIỀN ĐIỆN</div>

    <?php
    if (isset($_POST['submit'])) {
        $hoten = trim($_POST['hoten']);
        $chisodau = (int)$_POST['chisodau'];
        $chisocuoi = (int)$_POST['chisocuoi'];

        if ($chisocuoi < $chisodau) {
            echo "<p class='error'>Chỉ số cuối tháng phải lớn hơn hoặc bằng chỉ số đầu tháng!</p>";
        } else {
            $so_kw = $chisocuoi - $chisodau;
            $remaining = $so_kw;

            // 1. Định mức (50 KW đầu - giá 3000)
            $kw_dinhmuc = min($remaining, 50);
            $tien_dinhmuc = $kw_dinhmuc * 3000;
            $remaining = max(0, $remaining - 50);

            // 2. Vượt mức 1 (50 KW kế - giá 3500)
            $kw_vuot1 = min($remaining, 50);
            $tien_vuot1 = $kw_vuot1 * 3500;
            $remaining = max(0, $remaining - 50);

            // 3. Vượt mức 2 (50 KW kế nữa - giá 4000)
            $kw_vuot2 = min($remaining, 50);
            $tien_vuot2 = $kw_vuot2 * 4000;
            $remaining = max(0, $remaining - 50);

            // 4. Vượt mức 3 (Trên 150 KW - giá 6000)
            $kw_vuot3 = $remaining;
            $tien_vuot3 = $kw_vuot3 * 6000;

            // Tổng tiền
            $tong_tien = $tien_dinhmuc + $tien_vuot1 + $tien_vuot2 + $tien_vuot3;
            ?>

            <div class="form-group">
                <label>Họ tên khách hàng</label>
                <input type="text" readonly value="<?php echo htmlspecialchars($hoten); ?>">
            </div>

            <div class="form-group">
                <label>Chỉ số đầu tháng</label>
                <input type="text" readonly value="<?php echo $chisodau; ?>">
            </div>

            <div class="form-group">
                <label>Chỉ số cuối tháng</label>
                <input type="text" readonly value="<?php echo $chisocuoi; ?>">
            </div>

            <div class="form-group">
                <label>Số KW sử dụng</label>
                <input type="text" readonly value="<?php echo $so_kw; ?>">
            </div>

            <!-- Bảng tính bậc thang -->
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Số KW</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left;">Định mức</td>
                        <td><?php echo $kw_dinhmuc; ?></td>
                        <td><?php echo number_format($tien_dinhmuc); ?> Đồng</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Vượt mức 1</td>
                        <td><?php echo $kw_vuot1; ?></td>
                        <td><?php echo number_format($tien_vuot1); ?> Đồng</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Vượt mức 2</td>
                        <td><?php echo $kw_vuot2; ?></td>
                        <td><?php echo number_format($tien_vuot2); ?> Đồng</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Vượt mức 3</td>
                        <td><?php echo $kw_vuot3; ?></td>
                        <td><?php echo number_format($tien_vuot3); ?> Đồng</td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <label>Thành tiền</label>
                <input type="text" readonly value="<?php echo number_format($tong_tien); ?> Đồng">
            </div>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tính tiền điện!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_9-tinhtiendien.php">Quay lại trang tính tiền điện</a>
    </div>
</div>

</body>
</html>