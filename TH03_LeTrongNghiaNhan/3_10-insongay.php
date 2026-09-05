<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng Kết Quả Số Ngày</title>
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
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td { border: 1px solid #333; }
        th, td {
            padding: 8px 12px;
            text-align: center;
            font-size: 15px;
        }
        th { background-color: #f2f2f2; }
        .error { color: red; text-align: center; }
        .back-btn { text-align: center; margin-top: 15px; }
        .back-btn a { color: #337ab7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="title">BẢNG KẾT QUẢ SỐ NGÀY</div>

    <?php
    if (isset($_POST['submit'])) {
        $thang = (int)$_POST['thang'];
        $nam = (int)$_POST['nam'];

        if ($thang < 1 || $thang > 12 || $nam < 1) {
            echo "<p class='error'>Tháng hoặc năm nhập vào không hợp lệ!</p>";
        } else {
            // Xác định số ngày và loại năm
            $loai_nam = "Năm không nhuận";

            switch ($thang) {
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    $so_ngay = 31;
                    break;
                case 4: case 6: case 9: case 11:
                    $so_ngay = 30;
                    break;
                case 2:
                    if (($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0)) {
                        $so_ngay = 29;
                        $loai_nam = "Năm nhuận";
                    } else {
                        $so_ngay = 28;
                    }
                    break;
            }
            ?>

            <!-- Bảng hiển thị kết quả -->
            <table>
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Năm</th>
                        <th>Số ngày</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $thang; ?></td>
                        <td><?php echo $nam; ?></td>
                        <td><b><?php echo $so_ngay; ?> ngày</b></td>
                        <td><?php echo ($thang == 2) ? $loai_nam : "Bình thường"; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php
        }
    } else {
        echo "<p class='error'>Vui lòng nhập dữ liệu từ trang tính số ngày!</p>";
    }
    ?>

    <div class="back-btn">
        <a href="3_10-nhapthang.php">Quay lại trang nhập</a>
    </div>
</div>

</body>
</html>